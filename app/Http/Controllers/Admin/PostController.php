<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Admin\Post;
use App\Models\Admin\Category;
use App\Models\Admin\PostLike;
use App\Services\UpdatePostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {

        return view('admin.posts.index', [
            'posts' => Post::paginate(10)
        ]);
    }


    public function show($id)
    {

        $post = Post::with(['category', 'likes', 'views'])->find($id);
        $hasLiked = $post->likes()->exists();

        return view('admin.posts.show', compact('post','hasLiked'));
    }


    public function edit($id)
    {
        $post = Post::with(['category', 'likes', 'views'])
            ->where('id', $id)
            ->first();
        if (!$post) {
            abort(404, 'Post not found.');
        }
        return view('admin.posts.edit', [
            'categories' => Category::where('tenant_id', $post->tenant_id)->get(),
            'post' => $post,
        ]);
    }

    public function update(UpdatePostRequest $request, UpdatePostService $postService, Post $post)
    {

        $response = $postService->update($request,$post);

        return response()->json($response);
    }

    public function toggleLike(Request $request, \App\Models\Admin\Post $post)
    {
        $like = PostLike::where('post_id', $post->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            PostLike::create([
                'post_id' => $post->id,
                'user_id' => Auth::id(),
                'tenant_id' => tenantId(),
            ]);
            $liked = true;
        }

        return response()->json([
            'liked' => $liked,
            'total_likes' => $post->likes()->count(),
        ]);
    }
    public function destroy($id)
    {
        try {
            $post = Post::where('tenant_id', tenantId())->where('id', $id)->first();
            if (!$post) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Post not found or unauthorized access.'
                ], 404);
            }

            $post->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Post deleted successfully.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while deleting the post.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

}

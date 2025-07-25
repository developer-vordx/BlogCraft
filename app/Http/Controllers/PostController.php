<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\AddPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostLike;
use App\Services\PostService;
use App\Services\UpdatePostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::where('tenant_id', tenantId())
                ->where('created_by', '!=', Auth::id())
                ->paginate(10)
        ]);
    }

    public function myPosts()
    {
        return view('posts.mine', [
            'posts' => Post::with(['user','likes', 'views'])->where('tenant_id', tenantId())->where('created_by',Auth::id())->get()
        ]);
    }


    public function show($id)
    {

        $post = Post::with(['category', 'likes', 'views'])
            ->where('tenant_id', tenantId())
            ->where('id', $id)
            ->firstOrFail();
        $hasLiked = $post->likes()
            ->where('user_id', auth()->id())
            ->exists();

        return view('posts.show', compact('post','hasLiked'));
    }

    public function create()
    {
        return view('posts.create', [
            'categories' => Category::where('tenant_id',  tenantId())->get()
        ]);
    }



    public function store(AddPostRequest $request, PostService $postService)
    {
        $response = $postService->create($request);

        return response()->json($response);
    }

    public function toggleLike(Request $request, Post $post)
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

    public function edit($id)
    {
        $post = Post::with(['category', 'likes', 'views'])
            ->where('id', $id)
            ->first();
        if (!$post) {
            abort(404, 'Post not found.');
        }
        return view('posts.edit', [
            'categories' => Category::where('tenant_id', $post->tenant_id)->get(),
            'post' => $post,
        ]);
    }

    public function update(UpdatePostRequest $request, UpdatePostService $postService, Post $post)
    {

        $response = $postService->update($request,$post);

        return response()->json($response);
    }

    public function destroy($id)
    {
        try {
            $post = Post::where('id', $id)
                ->first();

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

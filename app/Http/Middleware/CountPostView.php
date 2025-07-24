<?php

namespace App\Http\Middleware;

use App\Models\Post;
use App\Models\PostView;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountPostView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $postId = $request->route('post');
        $post = Post::find($postId);

        if ($post && !$this->alreadyViewed($post->id, $request->ip())) {
            PostView::create([
                'post_id' => $post->id,
                'ip_address' => $request->ip(),
                'tenant_id' => tenantId(),
            ]);
        }

        return $next($request);
    }

    protected function alreadyViewed($postId, $ip)
    {
        return PostView::where('post_id', $postId)
            ->where('ip_address', $ip)
            ->exists();
    }
}

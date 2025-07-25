<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostLike;
use App\Models\PostView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tenantId = tenantId();

        $userPostIds = Post::where('tenant_id', $tenantId)
            ->pluck('id');

        $totalPosts = $userPostIds->count();
        $newPostsThisMonth = Post::whereIn('id', $userPostIds)
            ->whereMonth('created_at', now()->month)
            ->count();
        $totalViews = PostView::whereIn('post_id', $userPostIds)->count();
        $totalLikes = PostLike::whereIn('post_id', $userPostIds)->count();

        $recentActivity = $this->recentActivity($userPostIds);

        return view('admin.dashboard', compact(
            'user',
            'totalPosts',
            'newPostsThisMonth',
            'totalViews',
            'totalLikes',
            'recentActivity'
        ));
    }

    private function recentActivity($userPostIds)
    {
        $recentLikes = PostLike::with('user', 'post')
            ->whereIn('post_id', $userPostIds)
            ->latest()
            ->take(2)
            ->get()
            ->filter(function ($like) {
                return $like->user && $like->post; // Ensure relationships exist
            })
            ->map(function ($like) {
                return [
                    'icon' => '❤️',
                    'message' => "{$like->user->first_name} liked your post \"{$like->post->title}\"",
                    'time' => $like->created_at,
                ];
            });

        $recentViews = PostView::with('post')
            ->whereIn('post_id', $userPostIds)
            ->latest()
            ->take(2)
            ->get()
            ->filter(function ($view) {
                return $view->post !== null;
            })
            ->map(function ($view) {
                return [
                    'icon' => '👁️',
                    'message' => "Your post \"{$view->post->title}\" was viewed",
                    'time' => $view->created_at,
                ];
            });

        $recentActivity = collect($recentLikes)
            ->merge($recentViews)
            ->sortByDesc('time')
            ->take(4)
            ->map(function ($item) {
                return [
                    'icon' => $item['icon'],
                    'message' => $item['message'],
                    'time' => $item['time']->diffForHumans(),
                ];
            })
            ->values();

        if ($recentActivity->isEmpty()) {
            $recentActivity = collect([
                [
                    'icon' => 'ℹ️',
                    'message' => 'No recent activity yet.',
                    'time' => now()->diffForHumans(),
                ]
            ]);
        }

        return $recentActivity;
    }
}

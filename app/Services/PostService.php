<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;

class PostService
{
    public function create(Request $request)
    {
        try {
            $data = $request->validated(); // only safe fields
            $data['tenant_id'] = tenantId();
            $data['created_by'] = auth()->id();
            $data['updated_by'] = auth()->id();

            // Handle image upload
            if ($request->hasFile('featured_image') && $request->file('featured_image')->isValid()) {
                $file = $request->file('featured_image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images'), $filename);

                $data['featured_image'] = 'images/' . $filename;
            }

            Post::create($data);

            return [
                'status' => 'success',
                'message' => 'Post created successfully.',
                'image_url' => isset($data['featured_image']) ? asset($data['featured_image']) : null,
            ];
        } catch (Exception $e) {
            Log::error('Post creation failed: ' . $e->getMessage());

            return [
                'status' => 'error',
                'message' => 'Failed to create post. Please try again later.',
            ];
        }
    }
}

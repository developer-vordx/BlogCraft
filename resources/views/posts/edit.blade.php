@extends('layouts.inside')

@section('title', 'Dashboard')

@section('content')
    <script src="https://cdn.tiny.cloud/1/d51tkp0lzhdf6js5sdism22hlqyqfnh2yctvilkj3ow5zrec/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-8">Update Post</h1>
                <form id="create-post-form" class="space-y-6" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Post Title</label>
                        <input type="text" value="{{ $post->title }}" id="title" name="title" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-colors" placeholder="Enter your post title..." required>

                        @error('title')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select id="category_id" name="category_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-colors" required>
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Feature Image Upload Section -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Feature Image</label>
                        <div id="image-upload-area" class="relative border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-orange-400 transition-colors cursor-pointer">
                            <!-- Default Upload State -->
                            <div id="upload-placeholder" class="space-y-4">
                                <div class="mx-auto w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg font-medium text-gray-900">Upload Feature Image</p>
                                    <p class="text-sm text-gray-500 mt-1">Drag and drop your image here, or click to browse</p>
                                    <p class="text-xs text-gray-400 mt-2">Supports: JPG, PNG, GIF (Max size: 5MB)</p>
                                </div>
                            </div>

                            <!-- Image Preview State -->
                            <div id="image-preview">
                                <!-- Image Preview State -->
                                <div id="image-preview" class="{{ $post->featured_image ? '' : 'hidden' }}">
                                    <div class="relative inline-block">
                                        <img id="preview-image"
                                             src="{{ $post->featured_image ? asset($post->featured_image) : '' }}"
                                             alt="Feature image preview"
                                             class="max-w-full max-h-64 rounded-lg shadow-md">
                                        <button type="button" id="remove-image" class="absolute -top-2 -right-2 w-8 h-8 bg-red-500 text-white rounded-full hover:bg-red-600 transition-colors flex items-center justify-center shadow-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <p id="image-name" class="text-sm text-gray-600 mt-3 font-medium">
                                        {{ $post->featured_image ? basename($post->featured_image) : '' }}
                                    </p>
                                    <p id="image-size" class="text-xs text-gray-400">
                                        {{ $post->featured_image ? '' : '' }} <!-- Optional: Add actual file size if you want -->
                                    </p>
                                </div>

                                <!-- Upload Placeholder -->
                                <div id="upload-placeholder" class="{{ $post->featured_image ? 'hidden' : '' }} space-y-4">
                                    <!-- ...existing placeholder content... -->
                                </div>


                                <!-- Upload Progress State -->
                            <div id="upload-progress" class="hidden space-y-4">
                                <div class="mx-auto w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-orange-500 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" class="opacity-25"></circle>
                                        <path fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" class="opacity-75"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg font-medium text-gray-900">Uploading...</p>
                                    <div class="w-64 mx-auto mt-3 bg-gray-200 rounded-full h-2">
                                        <div id="progress-bar" class="bg-orange-500 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                                    </div>
                                    <p id="progress-text" class="text-sm text-gray-500 mt-2">0%</p>
                                </div>
                            </div>

                            <input type="file" id="feature_image" name="featured_image" value="{{$post->featured_image}}" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        </div>
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                        <textarea id="content" name="content" rows="12" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-colors resize-none" placeholder="Start writing your amazing content..." required>
                            {{ $post->content }}
                        </textarea>
                        @error('content')
                        <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <a href="{{ route('posts.index') }}" class="px-6 py-3 text-gray-600 hover:text-gray-800 transition-colors">
                            Cancel
                        </a>
                        <div class="flex space-x-4">
                            <button type="submit" class="px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors font-medium">
                                Publish Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Profile dropdown functionality
            const profileBtn = document.getElementById('profile-btn');
            const profileDropdown = document.getElementById('profile-dropdown');
            const profileChevron = document.getElementById('profile-chevron');
            const logoutBtn = document.getElementById('logout-btn');
            const createPostForm = document.getElementById('create-post-form');

            // Image upload functionality
            const imageUploadArea = document.getElementById('image-upload-area');
            const featureImageInput = document.getElementById('feature_image');
            const uploadPlaceholder = document.getElementById('upload-placeholder');
            const imagePreview = document.getElementById('image-preview');
            const previewImage = document.getElementById('preview-image');
            const imageName = document.getElementById('image-name');
            const imageSize = document.getElementById('image-size');
            const removeImageBtn = document.getElementById('remove-image');
            let currentFile = null;



            // Image upload drag and drop functionality
            imageUploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                imageUploadArea.classList.add('border-orange-400', 'bg-orange-50');
            });

            imageUploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                imageUploadArea.classList.remove('border-orange-400', 'bg-orange-50');
            });

            imageUploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                imageUploadArea.classList.remove('border-orange-400', 'bg-orange-50');

                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    handleFileUpload(files[0]);
                }
            });

            // File input change event
            featureImageInput.addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    handleFileUpload(e.target.files[0]);
                }
            });

            // Remove image functionality
            removeImageBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                resetImageUpload();
            });

            // Handle file upload
            function handleFileUpload(file) {
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    alert('Please select a valid image file.');
                    return;
                }

                // Validate file size (5MB max)
                if (file.size > 5 * 1024 * 1024) {
                    alert('File size must be less than 5MB.');
                    return;
                }

                currentFile = file;

                // Show image preview first
                showImagePreview(file);

                // Then show upload overlay
                showUploadOverlay();

                // Simulate upload progress
                let progress = 0;
                const interval = setInterval(() => {
                    progress += Math.random() * 15;
                    if (progress >= 100) {
                        progress = 100;
                        clearInterval(interval);
                        setTimeout(() => {
                            hideUploadOverlay();
                        }, 500);
                    }
                    updateProgress(progress);
                }, 200);
            }


            function hideUploadOverlay() {
                uploadOverlay.classList.add('hidden');
            }

            function updateProgress(progress) {
                overlayProgressBar.style.width = progress + '%';
                overlayProgressText.textContent = Math.round(progress) + '%';
            }

            function showImagePreview(file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    imageName.textContent = file.name;
                    imageSize.textContent = formatFileSize(file.size);

                    uploadPlaceholder.classList.add('hidden');
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }

            function resetImageUpload() {
                currentFile = null;
                featureImageInput.value = '';

                uploadPlaceholder.classList.remove('hidden');
                imagePreview.classList.add('hidden');
                uploadOverlay.classList.add('hidden');

                overlayProgressBar.style.width = '0%';
                overlayProgressText.textContent = '0%';
            }

            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

            // Create post form submission
            createPostForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(createPostForm);

                // Clear previous error messages
                document.querySelectorAll('.text-red-500').forEach(el => el.remove());

                fetch(createPostForm.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: formData
                })
                    .then(async response => {
                        if (!response.ok) {
                            const data = await response.json();

                            if (response.status === 422 && data.errors) {
                                Object.keys(data.errors).forEach(key => {
                                    const field = document.querySelector(`[name="${key}"]`);
                                    if (field) {
                                        const error = document.createElement('p');
                                        error.className = 'text-sm text-red-500 mt-2';
                                        error.innerText = data.errors[key][0];
                                        field.parentNode.appendChild(error);
                                    }
                                });
                            } else {
                                alert(data.message || 'Something went wrong.');
                            }

                            throw new Error('Validation or general error');
                        }

                        return response.json();
                    })
                    .then(data => {
                        if (data.status === 'success') {
                            alert(data.message || 'Post created successfully!');
                            window.location.href = "{{ route('posts.index') }}";
                        } else {
                            alert(data.message || 'Failed to create post.');
                        }
                    })
                    .catch(error => {
                        console.error('AJAX error:', error);
                    });
            });
        });
    </script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: [
                // Core editing features
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                // Your account includes a free trial of TinyMCE premium features
                // Try the most popular premium features until Aug 7, 2025:
                'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
        });
    </script>


@endsection


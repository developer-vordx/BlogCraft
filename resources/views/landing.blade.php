<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogCraft - Professional Blogging Made Simple</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#1E40AF',
                        accent: '#10B981',
                        warning: '#F59E0B',
                        danger: '#EF4444'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans">
<!-- Navigation Header -->
<nav class="bg-white shadow-sm border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <h1 class="text-xl font-bold text-gray-900">BlogCraft</h1>
            </div>
            <div class="hidden md:flex items-center space-x-4">
                <a href="#features" class="text-gray-600 hover:text-orange-900 px-3 py-2 rounded-md text-sm hover:bg-orange-100 transition-colors">Features</a>
                <a href="#blog" class="text-gray-600 hover:text-orange-900 px-3 py-2 rounded-md text-sm hover:bg-orange-100 transition-colors">Blog</a>
                <a href="#contact" class="text-gray-600 hover:text-orange-900 px-3 py-2 rounded-md text-sm hover:bg-orange-100 transition-colors">Contact</a>
                <a href="{{route('login')}}" class="text-grey-500 hover:text-orange-900 px-3 py-2 rounded-md text-sm hover:bg-orange-100 transition-colors">Login</a>
                <a href="{{route('register')}}" class="bg-orange-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-orange-600 transition-colors">Start Blogging</a>
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#features" class="block px-3 py-2 text-gray-600 hover:text-orange-900 hover:bg-orange-100 rounded-md">Features</a>
            <a href="#blog" class="block px-3 py-2 text-gray-600 hover:text-orange-900 hover:bg-orange-100 rounded-md">Blog</a>
            <a href="#contact" class="block px-3 py-2 text-gray-600 hover:text-orange-900 hover:bg-orange-100 rounded-md">Contact</a>
            <a href="{{route('login')}}" class="block px-3 py-2 text-gray-600 hover:text-orange-900 hover:bg-orange-100 rounded-md">Login</a>
            <a href="{{route('register')}}" class="block px-3 py-2 bg-orange text-white rounded-md text-center font-medium">Start Blogging</a>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-primary/10 via-white to-accent/10 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                Professional Blogging
                <span class="text-orange-500">Made Simple</span>
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                Create, publish, and grow your audience with our intuitive blogging platform. Share your stories with the world and build your online presence effortlessly.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{route('register')}}" class="bg-orange-500 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-orange-600 transition-colors shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Start Free Blog
                </a>
                <a href="#features" class="bg-white text-orange-500 border-2 border-orange-500 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-orange-600 hover:text-white transition-colors">
                    Explore Features
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Everything You Need to Create Amazing Content
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Streamline your blogging process with powerful features designed to help you write, publish, and grow your audience.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Rich Text Editor</h3>
                <p class="text-gray-600">Write beautiful posts with our intuitive editor featuring formatting tools, image embedding, and real-time preview.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Analytics & Insights</h3>
                <p class="text-gray-600">Track your blog's performance with detailed analytics, reader engagement metrics, and growth insights.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-warning/10 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Custom Themes</h3>
                <p class="text-gray-600">Choose from beautiful, responsive themes or customize your own to match your brand and style.</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Mobile Optimized</h3>
                <p class="text-gray-600">Your blog looks perfect on all devices. Write and manage posts from anywhere with our mobile-friendly interface.</p>
            </div>

            <!-- Feature 5 -->
            <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Community Features</h3>
                <p class="text-gray-600">Engage with your readers through comments, likes, and social sharing. Build a loyal community around your content.</p>
            </div>

            <!-- Feature 6 -->
            <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow">
                <div class="w-12 h-12 bg-warning/10 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">SEO Optimization</h3>
                <p class="text-gray-600">Built-in SEO tools help your content rank higher in search results and reach more readers organically.</p>
            </div>
        </div>
    </div>
</section>

<!-- Recent Blog Posts Section -->
<section id="blog" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Latest Blog Posts
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Discover insights, tips, and stories from our community of passionate writers.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Blog Post 1 -->
            <article class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-primary/20 to-accent/20"></div>
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <span>March 15, 2024</span>
                        <span class="mx-2">•</span>
                        <span>5 min read</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3 hover:text-orange-500 transition-colors">
                        <a href="#">10 Tips for Creating Engaging Blog Content</a>
                    </h3>
                    <p class="text-gray-600 mb-4">Learn how to write compelling blog posts that capture your audience's attention and keep them coming back for more.</p>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gray-300 rounded-full mr-3"></div>
                        <span class="text-sm text-gray-600">Sarah Johnson</span>
                    </div>
                </div>
            </article>

            <!-- Blog Post 2 -->
            <article class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-accent/20 to-warning/20"></div>
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <span>March 12, 2024</span>
                        <span class="mx-2">•</span>
                        <span>7 min read</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3 hover:text-orange-500 transition-colors">
                        <a href="#">The Ultimate Guide to Blog SEO</a>
                    </h3>
                    <p class="text-gray-600 mb-4">Master the art of search engine optimization for your blog and increase your organic traffic dramatically.</p>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gray-300 rounded-full mr-3"></div>
                        <span class="text-sm text-gray-600">Mike Chen</span>
                    </div>
                </div>
            </article>

            <!-- Blog Post 3 -->
            <article class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow overflow-hidden">
                <div class="h-48 bg-gradient-to-br from-warning/20 to-primary/20"></div>
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <span>March 10, 2024</span>
                        <span class="mx-2">•</span>
                        <span>4 min read</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3 hover:text-orange-500 transition-colors">
                        <a href="#">Building Your Personal Brand Through Blogging</a>
                    </h3>
                    <p class="text-gray-600 mb-4">Discover how consistent blogging can help you establish yourself as an expert in your field and grow your personal brand.</p>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gray-300 rounded-full mr-3"></div>
                        <span class="text-sm text-gray-600">Emma Wilson</span>
                    </div>
                </div>
            </article>
        </div>

        <div class="text-center mt-12">
            <a href="#" class="bg-orange-500 text-white px-8 py-3 rounded-lg font-medium hover:bg-orange-600 transition-colors">
                View All Posts
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Get in Touch
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Have questions about blogging or need help getting started? We're here to support your journey.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h3>
                <div class="space-y-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Email</h4>
                            <p class="text-gray-600">support@blogcraft.com</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Phone</h4>
                            <p class="text-gray-600">+1 (555) 123-4567</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Address</h4>
                            <p class="text-gray-600">123 Creator Ave, Suite 100<br>San Francisco, CA 94105</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Send us a Message</h3>
                <form class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors" required>
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors" required>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors resize-none" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-orange-500 text-white py-3 px-6 rounded-lg font-medium hover:bg-orange-600 transition-colors">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">BlogCraft</h3>
                <p class="text-gray-400">Professional blogging made simple for content creators and businesses.</p>
            </div>
            <div>
                <h4 class="font-semibold mb-4">Platform</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#features" class="hover:text-white transition-colors">Features</a></li>
                    <li><a href="#blog" class="hover:text-white transition-colors">Blog</a></li>
                    <li><a href="dashboard.html" class="hover:text-white transition-colors">Dashboard</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Templates</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4">Resources</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#contact" class="hover:text-white transition-colors">Contact</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Writing Guide</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Community</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-4">Legal</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Cookie Policy</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">DMCA</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; {{date('Y')}} BlogCraft. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Contact form handling
        const contactForm = document.querySelector('#contact form');
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            alert('Thank you for your message! We\'ll get back to you soon.');
            this.reset();
        });
    });
</script>
</body>
</html>

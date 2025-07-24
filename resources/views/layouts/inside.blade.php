<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BlogCraft')</title>

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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const profileBtn = document.getElementById('profile-btn');
            const profileDropdown = document.getElementById('profile-dropdown');
            const profileChevron = document.getElementById('profile-chevron');

            if (profileBtn) {
                profileBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    profileDropdown.classList.toggle('hidden');
                    profileChevron.classList.toggle('rotate-180');
                });
            }

            // Close dropdown if clicked outside
            document.addEventListener('click', function (e) {
                const isClickInside = profileBtn.contains(e.target) || profileDropdown.contains(e.target);
                if (!isClickInside) {
                    profileDropdown.classList.add('hidden');
                    profileChevron.classList.remove('rotate-180');
                }
            });
        });
    </script>
</head>
<body class="bg-gray-50 font-sans">
<!-- Navigation Header -->
@include('layouts.dashboard_navbar')

<div class="flex">
    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Main Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>
</div>

</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts & Bootstrap -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        @media (max-width: 768px) {
            #sidebar {
                position: absolute;
                z-index: 1000;
                height: 100%;
                left: -280px;
                transition: left 0.3s;
            }

            #sidebar.active {
                left: 0;
            }

            #overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
                display: none;
            }

            #overlay.active {
                display: block;
            }
        }
    </style>
</head>

<body>
    <div id="login_app">
        <div class="d-flex flex-column flex-md-row min-vh-100">


            <!-- Offcanvas Sidebar for mobile -->
            <div class="offcanvas offcanvas-start d-md-none bg-dark text-white" tabindex="-1" id="mobileSidebar">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-0">
                    @include('partials._sidebar')
                </div>
            </div>
            <!-- Content area -->
            <div class="flex-fill d-flex flex-column">
                <!-- Header -->

                <!-- Main content -->
                <main class="flex-fill container-fluid py-3 px-4">
                    @yield('content')
                </main>


            </div>
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }
    </script>
</body>

</html>

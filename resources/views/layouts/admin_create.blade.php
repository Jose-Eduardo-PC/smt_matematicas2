<!DOCTYPE html>
<html>

<head>
    <html lang="es">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>STM Multimedia</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('admin/assets/img/brand/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/argon.css?v=1.2.0') }}" type="text/css">
</head>

<body>
    <!-- Sidenav -->
    @include('layouts.admin.sidebar')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        @include('layouts.admin.navbar')
        <!-- Page content -->
        <div class="container-fluid mt-3">
            @yield('content')
            <!-- Footer -->
            @include('layouts.admin.footer')
        </div>
    </div>
    @yield('js')
    <script src="{{ asset('admin/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ asset('admin/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('admin/assets/js/argon.js?v=1.2.0') }}"></script>
    <!-- Sidebar JS -->
    <script>
        $('.btn_abrir').on('click', function() {
            $('#sidenav-main').toggleClass('side');
            $('.main-content').toggleClass('width-100');
        })
        // JavaScript
        const menuBtn = document.querySelector('.menu-btn');
        const menuIcon = document.querySelector('.menu-btn i');

        menuBtn.addEventListener('click', () => {
            menuBtn.classList.toggle('open');
            menuIcon.classList.toggle('fa-bars');
            menuIcon.classList.toggle('fa-times');
        });
        // Obtener todos los elementos li del sidebar
        var navItems = document.querySelectorAll('.sidenav .nav-item');

        navItems.forEach(function(navItem) {
            // Obtener el enlace dentro del elemento li
            var navLink = navItem.querySelector('.nav-link');

            // Crear un objeto URL a partir del href del enlace
            var linkUrl = new URL(navLink.href);

            // Obtener la primera parte de la ruta del enlace (por ejemplo, "/users" para "/users/create")
            var linkPathFirstPart = linkUrl.pathname.split('/')[1];

            // Obtener la última parte de la ruta de la URL actual
            var currentPathLastPart = window.location.pathname.split('/').pop();

            // Verificar si la primera parte de la ruta del enlace coincide con la primera parte de la ruta de la URL actual
            if (linkPathFirstPart === window.location.pathname.split('/')[1]) {
                // Si coincide, agregar la clase .active al elemento li
                navItem.classList.add('active');

                // Verificar si la última parte de la ruta de la URL actual es "create"
                if (currentPathLastPart === 'create') {
                    // Si es así, agregar una "C" al enlace y resaltarla con un color
                    navLink.innerHTML += ' <span style="color: blue;">&nbsp;Crear</span>';
                }
                // Verificar si la última parte de la ruta de la URL actual es "edit"
                else if (currentPathLastPart === 'edit') {
                    // Si es así, agregar una "E" al enlace y resaltarla con un color
                    navLink.innerHTML += ' <span style="color: blue;">&nbsp;Editar</span>';
                }
            }
        });
    </script>
    @yield('css')
    <style>
        body {
            background-color: rgba(174, 230, 240, 0.5) !important;
            font-family: 'Roboto', sans-serif !important;
            font-size: 14px !important;
        }

        .nav-item.active .nav-link {
            background-color: #66dff1 !important;
            border-radius: 10px;
            margin-right: 10px;
            margin-left: 10px;
        }

        .btn_abrir {
            margin-right: 20px !important;
        }

        .menu-btn {
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
            color: white;
        }

        .menu-btn i {
            font-size: 25px;
            color: #333;
            color: white;
        }

        .menu-btn:focus {
            outline: none;
        }

        .side {
            display: none !important;
        }

        .width-100 {
            margin-left: 0 !important;
            width: 100% !important;
            overflow-x: hidden !important;
        }

        .footer-fondo {
            background-color: rgba(174, 230, 240, 0.5) !important;
            font-family: 'Roboto', sans-serif !important;
            font-size: 14px !important;
        }
    </style>
</body>

</html>

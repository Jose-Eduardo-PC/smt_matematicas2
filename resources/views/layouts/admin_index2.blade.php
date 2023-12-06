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
        </div>
    </div>
    <!-- Core -->
    @yield('js')
    <!-- Optional JS -->
    <script src="{{ asset('admin/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
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

                if (!isNaN(currentPathLastPart)) {
                    // Si es así, agregar una "C" al enlace y resaltarla con un color
                    navLink.innerHTML += ' <span style="color: blue;">&nbsp;Ver</span>';
                }

            }
        });
    </script>

    @yield('datatables-script')
    <!--Datatables-->
    <script src="{{ asset('admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    @yield('table')
    @yield('sweetalert-script')
    <!-- Sweetaler -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'EL registro ha sido eliminado.',
                'success'
            )
        </script>
    @endif
    @yield('css')
    <!-- Datatables -->
    <link href="{{ asset('admin/assets/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
        rel="stylesheet">

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

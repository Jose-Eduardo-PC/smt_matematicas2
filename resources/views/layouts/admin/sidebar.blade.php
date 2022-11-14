<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="/admin/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="ni ni-single-02 text-blue"></i>
                            <span class="nav-link-text">Usuarios</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cursos.index') }}">
                            <i class="ni ni-books text-blue"></i>
                            <span class="nav-link-text">Cursos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.html">
                            <i class="ni ni-book-bookmark text-blue"></i>
                            <span class="nav-link-text">Actividades</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.html">
                            <i class="ni ni-single-copy-04 text-blue"></i>
                            <span class="nav-link-text">Examenes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tables.html">
                            <i class="ni ni-bullet-list-67 text-default"></i>
                            <span class="nav-link-text">Notas</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Documentacion</span>
                </h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html"
                            target="_blank">
                            <i class="ni ni-spaceship"></i>
                            <span class="nav-link-text">Getting started</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html"
                            target="_blank">
                            <i class="ni ni-palette"></i>
                            <span class="nav-link-text">Foundation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html"
                            target="_blank">
                            <i class="ni ni-ui-04"></i>
                            <span class="nav-link-text">Components</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

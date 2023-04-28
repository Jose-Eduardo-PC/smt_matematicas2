<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="\storage\imagenes\administration.png" width="150" height="150">
                <div class="text-center">
                    <span class="">{{ Auth::user()->roles->first()->name }}</span>
                </div>
            </a>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/home">
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
                        <a class="nav-link" href="{{ route('themes.index') }}">
                            <i class="ni ni-books text-blue"></i>
                            <span class="nav-link-text">Temas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('activitys.index') }}">
                            <i class="ni ni-book-bookmark text-blue"></i>
                            <span class="nav-link-text">Actividades</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tests.index') }}">
                            <i class="ni ni-single-copy-04 text-blue"></i>
                            <span class="nav-link-text">Examenes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('media_resources.index') }}">
                            <i class="ni ni-folder-17 text-blue"></i>
                            <span class="nav-link-text">Recursos Multimedia</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('tools') }}">
                            <i class="ni ni-ruler-pencil text-blue"></i>
                            <span class="nav-link-text">Herramientas</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

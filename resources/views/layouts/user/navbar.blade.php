<nav class="navbar navbar-top navbar-expand navbar-dark p-3 mb-2 bg-info text-white border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="/storage/imagenes/EscudoUajms.png">
                </span>
                <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="text-white font-weight-bold">SISTEMA MULTIMEDIA DE MATEMATICAS</span>
                </div>
            </div>
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item dropdown">
                    <div class="row">
                        <div class="media align-items-center">
                            <div class="media-body  ml-2  d-none d-lg-block">
                                @if (Route::has('login'))
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        @auth
                                            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                                                @hasanyrole('SuperAdministrador|Profesor')
                                                    <li class="nav-item">
                                                        <a class="nav-link font-weight-bold" href="/home">PANEL DE
                                                            ADMINISTRACION</a>
                                                    </li>
                                                @endhasanyrole
                                                <li class="nav-item">
                                                    <a class="nav-link font-weight-bold" href={{ route('menu') }}>MENU</a>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link pr-0" href="#" role="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <div class="media align-items-center">
                                                            <span class="avatar avatar-sm rounded-circle">
                                                                <img>
                                                                @if (Auth::user()->avatar)
                                                                    <img alt="Image placeholder"
                                                                        src="{{ Storage::url(Auth::user()->avatar) }}"
                                                                        onerror="this.src='/storage/imagenes/avatar.gif'">
                                                                @else
                                                                    <img alt="Image placeholder"
                                                                        src="/storage/imagenes/avatar.gif">
                                                                @endif
                                                            </span>
                                                            <div class="media-body  ml-2  d-none d-lg-block">
                                                                <span
                                                                    class="mb-0 text-sm font-weight-bold">{{ Auth::user()->name }}
                                                                    {{ Auth::user()->surname }}</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="dropdown-menu  dropdown-menu-right ">
                                                        <div class="dropdown-header noti-title">
                                                            <h6 class="text-overflow m-0">Bienvenido!</h6>
                                                        </div>
                                                        <a href="{{ route('usuario_show', Auth::user()->id) }}"
                                                            class="dropdown-item">
                                                            <i class="ni ni-single-02"></i>
                                                            <span>MI PERFIL</span>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <div class="col-md">
                                                            <form action="{{ route('logout') }}" method="POST">
                                                                @csrf
                                                                <button class="col-12 btn btn-danger" type="submit">Cerrar
                                                                    sesión</button>
                                                            </form>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        @else
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <a href="{{ route('login') }}"
                                                            class="text-white font-weight-bold"class="text-white font-weight-bold">Iniciar
                                                            Sesion</a>
                                                    </div>
                                                    @if (Route::has('register'))
                                                        <div class="col-5">
                                                            <a href="{{ route('register') }}"
                                                                class="text-white font-weight-bold ">Registrarse</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-top navbar-expand navbar-dark bg-info border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <button class="menu-btn btn_abrir">
                <i class="fas fa-bars"></i>
            </button>
            <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="/storage/imagenes/EscudoUajms.png">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                    <span class="text-white font-weight-bold">Sistema Multimedia de Matematicas</span>
                </div>
            </div>
            <ul class="navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center ">
                            <span class="avatar avatar-sm rounded-circle">
                                @if (Auth::user()->avatar)
                                    <img alt="Image placeholder" src="{{ Storage::url(Auth::user()->avatar) }}"
                                        onerror="this.src='/storage/imagenes/avatar.gif'">
                                @else
                                    <img alt="Image placeholder" src="/storage/imagenes/avatar.gif">
                                @endif
                            </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bienvenido!</h6>
                        </div>
                        <a href="{{ route('users.show', Auth::user()->id) }}" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>MI Perfil</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <div class="col-md">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="col-12 btn btn-danger" type="submit">Cerrar sesion</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Styles-->
    <link href="{{ asset('css/admin.css') }}"
          rel="stylesheet">

</head>
<body>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <a class="navbar-brand ml-4" href="#">
            <img src="{{ asset('img/logo-white.svg') }}" width="30" height="30" class="d-inline-block align-top" alt="">
            BuffaloSafe
        </a>

        <div class="container mt-4 mb-2">
            <div class="mb-2">
                <img src="{{ asset('img/users/user.jpg') }}" class="img-responsive" style="border-radius: 50%;" alt="" width="70">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">Brayan Angarita</div>
                <div class="profile-usertitle-status">admin@admin.com</div>
            </div>
        </div>


        <ul class="list-unstyled components">
            <li class="active">
                <a href="#"><i class="fas fa-chart-line"></i> Panel</a>
            </li>

            <li>
                <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user-circle"></i> Mi perfil</a>
                <ul class="collapse list-unstyled" id="profileSubmenu">
                    <li>
                        <a href="#">Ver mi perfil</a>
                    </li>
                    <li>
                        <a href="#">Actualizar perfil</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#filesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-file-upload"></i> Mis archivos</a>
                <ul class="collapse list-unstyled" id="filesSubmenu">
                    <li>
                        <a href="{{ route('archivo.crear') }}">Agregar archivos</a>
                    </li> <li>
                        <a href="#">Imágenes</a>
                    </li>
                    <li>
                        <a href="#">Videos</a>
                    </li>
                    <li>
                        <a href="#">Documentos</a>
                    </li>
                    <li>
                        <a href="#">Audio</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#rolesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-unlock-alt"></i> Roles</a>
                <ul class="collapse list-unstyled" id="rolesSubmenu">
                    <li>
                        <a href="#">Ver todos</a>
                    </li>
                    <li>
                        <a href="#">Agregar rol</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#permissionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-fingerprint"></i> Permisos</a>
                <ul class="collapse list-unstyled" id="permissionSubmenu">
                    <li>
                        <a href="#">Ver todos</a>
                    </li>
                    <li>
                        <a href="#">Agregar permiso</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> Usuarios</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Ver todos</a>
                    </li>
                    <li>
                        <a href="#">Agregar rol</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="far fa-question-circle"></i> Soporte</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>

                <a class="logout btn btn-outline-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                    <i class="fas fas-power-off"></i>
                    Cerrar sesión
                </a>
            </li>
        </ul>
    </nav>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a>@yield('page')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @if(session('info'))
        <div class="container">
            <div class="alert alert-{{session('info')[0]}}" role="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none;'">X</span>
                <strong>Exito</strong> {{session('info')[1]}}
            </div>
        </div>
        @endif
        @if($errors->any())
            <div class="container">
                <div class="alert alert-danger" role="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none;'">X</span>
                    @foreach($errors->all() as $error)
                        {{--$error--}}
                        @if($error == 'validation.mimes')
                        <strong>Error</strong> No se puede subir ese formato de archivo
                        @endif
                        @if($error == 'validation.max.file')
                         <strong>Error </strong> El archivo excede el tamaño maximo
                         @endif
                    @endforeach
                </div>
            </div>
        @endif
@yield('content')

<script src="{{ asset('js/slim.js')}}"></script><!-- Popper.JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>

@yield('scripts')
</div>
</body>

</html>

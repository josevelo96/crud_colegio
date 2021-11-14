<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap5-1-3/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('sweetalert/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('custom.css')}}">
    <script src="https://kit.fontawesome.com/0a0498ed86.js" crossorigin="anonymous"></script>
    <title>Colegio @yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">Colegio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menú
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{url('alumnos')}}">
                            <i class="fas fa-user-graduate"></i>
                            Alumnos</a>
                        </li>
                        <li><a class="dropdown-item" href="{{url('profesores')}}">
                            <i class="fas fa-chalkboard-teacher"></i>
                            Profesores</a>
                        </li>
                        <li><a class="dropdown-item" href="{{url('grados')}}">
                            <i class="fas fa-landmark"></i>
                            Grados</a>
                        </li>
                        <li><a class="dropdown-item" href="{{url('clases')}}">
                            <i class="fas fa-clipboard-list"></i>
                            Clases</a>
                        </li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- <div class=""> --}}
        <div class="sidebar-container">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white sidebar-link" title="Alumnos" href="{{url('alumnos')}}">
                        <i class="fas fa-user-graduate"></i>
                        <span class="sidebar-link-text">Alumnos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white sidebar-link" href="{{url('profesores')}}">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span class="sidebar-link-text">Profesores</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white sidebar-link" href="{{url('grados')}}">
                        <i class="fas fa-landmark"></i>
                        <span class="sidebar-link-text">Grados</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white sidebar-link" href="{{url('clases')}}">
                        <i class="fas fa-clipboard-list"></i>
                        <span class="sidebar-link-text">Clases</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main-container">
            <div class="container-fluid">
                <br>
                @yield('content')
            </div>
        </div>
    {{-- </div> --}}
    <script type="text/javascript" src="{{asset('bootstrap5-1-3/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('sweetalert/dist/sweetalert2.all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/helpers.js')}}"></script>
    @includeWhen($errors->any(), 'scripts.validation_errors')
    @yield('footer_scripts')
</body>
</html>
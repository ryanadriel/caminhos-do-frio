<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Caminhos do Frio | Rota Paraibana</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">-->


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{url('css/theme.css')}}" rel="stylesheet"/>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap"
        rel="stylesheet">

</head>


<body>

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-5 d-block"
         data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="{{url('/')}}"><img src="{{url('images/logo.png')}}"
                                                                                height="60"
                                                                                alt="logo"/></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span>
            </button>
            <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-lg-center align-items-start">
                    <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page" href="#service">Serviços</a>
                    </li>
                    <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page"
                                                         href="{{url('/'. '#destination')}}">Destinos</a></li>
                    <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page"
                                                         href="#testimonial">Avaliações</a></li>

                    <!-- Verifica se o usuário está logado -->
                    @auth
                        <li class="nav-item dropdown px-3 px-lg-0"><a
                                class="d-inline-block ps-0 py-2 pe-3 text-decoration-none dropdown-toggle fw-medium"
                                href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><!-- Verifica se o usuário tem uma foto de perfil -->
                                @if(auth()->user()->image)
                                    <!-- Exibe a foto do usuário -->
                                    <img src="{{url('/storage'). '/' . auth()->user()->image }}" alt="Foto de Perfil"
                                         style="width: 30px; height: 30px; border-radius: 50%; margin-left: 10px">

                                @else
                                    <!-- Exibe o ícone padrão se não tiver foto -->
                                    <img src="{{ url('images/icons/person-square.svg') }}" alt="Ícone de Perfil"
                                         style="width: 30px; height: 30px;">
                                @endif</a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg" style="border-radius:0.3rem;"
                                aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ url('admin/profile') }}">
                                        Editar Perfil
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#!">
                                        Minhas Reservas
                                    </a>
                                </li>
                                <li class="nav-item px-3 px-xl-4">
                                    <!-- Formulário para Logout -->
                                    <form action="{{ route('filament.admin.auth.logout') }}" method="POST"
                                          style="display: inline;">
                                        @csrf
                                        <button type="submit"
                                                style="background: none; border: none; padding: 0; cursor: pointer;">
                                            Logout
                                            <img src="{{ url('images/icons/box-arrow-right.svg') }}" alt="Logout"
                                                 style="width: 24px; height: 24px;">
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>

                    @else
                        <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium"
                                                             href="{{ route('filament.admin.auth.login') }}">Login</a>
                        </li>
                        <li class="nav-item px-3 px-xl-4"><a class="btn btn-outline-dark order-1 order-lg-0 fw-medium"
                                                             href="!#">Registrar-se</a></li>
                    @endauth


                </ul>
            </div>
        </div>
    </nav>

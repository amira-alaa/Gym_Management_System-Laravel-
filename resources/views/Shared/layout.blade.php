<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400..800&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" />
    <!-- ^ Bootstrap 5.3.8 css file -->
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/dist/css/bootstrap.min.css') }}" />
    <!-- ^ Our main css file -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />


    <title>Power Fitness | @yield('title')</title>
</head>
<body>
<header>
    <!-- ^ navbar -->
    <nav class="navbar navbar-expand-lg bg-white my-3">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../images/logo.jpg" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0 mt-3 mt-lg-0">
                    <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 mx-2 fw-bolder fs-5 " aria-current="page"
                           href="{{ route('home') }}">Home</a>
                    </li>
                        {{-- @if (User.IsInRole("SuperAdmin"))
                        { --}}
                            <li class="nav-item">
                                <a class="nav-link  px-3 py-2 mx-2 fw-bolder fs-5 " aria-current="page" href="{{ route('members.index') }}">Members</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  px-3 py-2 mx-2 fw-bolder fs-5 " aria-current="page"
                                   href="{{ route('trainers.index') }}">Trainers</a>
                            </li>

                        <li class="nav-item">
                        <a class="nav-link  px-3 py-2 mx-2 fw-bolder fs-5 " aria-current="page"
                           href="{{ route('sessions.index') }}">Sessions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  px-3 py-2 mx-2 fw-bolder fs-5 " aria-current="page"
                           href="{{ route('plans.index') }}">Plans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  px-3 py-2 mx-2 fw-bolder fs-5 " aria-current="page"
                           href="{{ route('memberships') }}">Memberships</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  px-3 py-2 mx-2 fw-bolder fs-5 " aria-current="page"
                           href="{{ route('membersessions.index') }}">Sessions Schedule</a>
                    </li>
                    <li class="nav-item">
                        <form asp-action="Logout" asp-controller="Account" method="post" class="d-inline">
                            <button type="submit"
                                    class="btn btn-link nav-link px-3 py-2 mx-2 fw-bolder fs-5 text-black-alternative">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>

<div class="container">
    <main role="main" class="pb-3">
        @yield('content')
    </main>
</div>


<script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/site.js') }}" ></script>
</body>
</html>

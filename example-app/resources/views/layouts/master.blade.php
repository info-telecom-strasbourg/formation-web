<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font awesome icons -->
    <link href="{{ URL::asset('fontawesome/css/all.css') }}" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- JavaScript -->


    <title>@yield('title')</title>
</head>

<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="connection.html">Connection</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Title -->
    <h1 class="text-center my-3">
        @yield('page-title')
    </h1>
</header>

<body>
    <main class="main-content">
        @yield('content')
    </main>

    <script src="href="{{ URL::asset('js/main.js') }}""></script>
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/images/seamhealth_logo.png" class="img-fluid" alt="" style="height: 50px !important;" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Note</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://ndmichael.github.io/" target="_blank">Github</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    <footer class="border-top bg-light py-3">
        <div class=" container">
            <div class="row">
                <div class="col-12 col-md-4 offset-md-4 text-center">
                    <div class="">
                        <p>
                            <b>&copy; </b> <span class="text-primary">seamhealth Innovation Diagnosis app |
                                Terms</span>
                        </p>
                    </div>
                    <p>
                        developed by: <b class="text-danger">Michael Ukeje</b>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
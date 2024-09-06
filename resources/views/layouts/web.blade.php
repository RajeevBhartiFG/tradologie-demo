<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token Meta Tag -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    @yield('css')
   
 </head>
<body>
    <!-- Navigation Bar -->
   

    <!-- Main Content -->
    <div class="container mt-4">

    @if(isset(Auth::user()->role))
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{strtoupper(Auth::user()->role)}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">{{Auth::user()->email}}</a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            </li>
            </ul>
        </div>
    </nav>
    @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="text-center p-3">
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </footer>

    <script
  src="https://code.jquery.com/jquery-3.3.0.min.js"
  integrity="sha256-RTQy8VOmNlT6b2PIRur37p6JEBZUE7o8wPgMvu18MC4="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  
    @yield('script')
   
   </body>
</html>

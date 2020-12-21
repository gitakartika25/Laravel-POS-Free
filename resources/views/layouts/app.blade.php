<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/main.png">
    <script type="text/javascript">
    document.write(unescape('%3c%6c%69%6e%6b%20%72%65%6c%20%3d%20%22%69%63%6f%6e%22%20%68%72%65%66%20%3d%22%69%6d%67%2f%6c%6f%67%6f%2e%70%6e%67%22%20%74%79%70%65%20%3d%20%22%69%6d%61%67%65%2f%70%6e%67%22%3e'));

    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    
    <title>GitSa Resto</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css" rel="stylesheet">

     @stack('style')

</head>


<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #1c041a;>
            <div class="container-fluid">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                    <a class="nav-link font-weight-bolder" href="{{url('transcation')}}">Gitsa Resto                           
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Menu</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('products.index')}}">List Menu</a>
                            <a class="dropdown-item" href="#">Menu Stock</a>
                        </div>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="{{url('/transcation/history')}}">History Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manageusers') }}">User</a>
                    </li>
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        
    </div>

    
</body>
    <!-- Footer -->
        <footer class="page-footer " style="background-color: #1c041a;">
            <br>
          <!-- Footer Elements -->
          <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Gita Kartika Pariwara | 1931710020</p>
            <!-- Social buttons -->
            <ul class="list-unstyled list-inline text-center">
              <li class="list-inline-item">
                <a class="btn-floating btn-fb mx-1">
                  <i class="fab fa-facebook-f"> </i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-tw mx-1">
                  <i class="fab fa-twitter"> </i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-gplus mx-1">
                  <i class="fab fa-google-plus-g"> </i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-li mx-1">
                  <i class="fab fa-linkedin-in"> </i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-dribbble mx-1">
                  <i class="fab fa-dribbble"> </i>
                </a>
              </li>
            </ul>
            <!-- Social buttons -->
        
        </div>
        
        </footer>
       

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js">
</script>
<!-- MDB core JavaScript //-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js"></script>

@stack('script')

</html>

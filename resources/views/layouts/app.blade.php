<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Laravel</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</style>
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <body style="background-color: #ffff">
    <nav class="navbar navbar-expand-md navbar-light bg-light" style="z-index: 1;" >
    <a class="navbar-brand" href="{{ url('/') }}" style="padding: 0px;">
    <img src="{{ asset('img/sukilogo.jpg') }}" alt="SUKISPARES" style="height:60px;">
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
    <div class="navbar-nav">
    <ul class="navbar-nav only-mobile">
      <li><a href="/" class="navio"><i class="fa fa-tachometer" aria-hidden="true" fa-3x></i>&nbsp; Dashboard</a></li>
    <li data-toggle="collapse" data-target="#products" class="navio"><i class="fa fa-product-hunt" aria-hidden="true"fa-3x></i>&nbsp; Products
   <span class="arrow"></span></li>
    <ul class="sub-menu collapse" id="products">
     <a href="/product" class="navio" style="width: 110% ; margin-left: -10%"><i class="fa fa-product-hunt" aria-hidden="true"fa-3x></i>&nbsp;Catalog
     </a>
     <a href="/Category" class="navio" style="width: 110% ; margin-left: -10%"><i class="fa fa-tag" aria-hidden="true"fa-3x></i>&nbsp;
      Categories
     </a>
       </ul>
      <li  data-toggle="collapse" data-target="#setting" class="navio">
        <i class="fa fa-cog" aria-hidden="true" fa-3x></i>&nbsp;
      Settings 
      <span class="arrow"></span>
      </li>
      <ul class="sub-menu collapse" id="setting">
        <a href="/role" class="navio" style="width: 110% ; margin-left: -10%"><i class="fa fa-tasks" aria-hidden="true" fa-3x></i>&nbsp;Roles</a>
      <a href="/user" class="navio" style="width: 110% ; margin-left: -10%"><i class="fa fa-user" aria-hidden="true" fa-3x></i>&nbsp;Users</a>

      </ul>
    </ul>
    </div>
    <div class="navbar-nav">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
            </div>
        </div>
    </nav>

    <div class="main-content">
                <div class="sidebar">
                    @include('includes.sidebar')
                </div>
              <div class="cont">
                  <div style="min-height: calc(100vh - 150px)">
                    @yield('content')
                  </div>
                    <div class="row footer">
                    <div class="col-sm-6" style="text-align: right;"> System developed by <a href="https://Mbitrix.co.ke" target="_blank">Mbitrix Technologies LTD</a></div>
                    </div>
                </div>
            </div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />

<script type="text/javascript">

  $('.sidebar-menu li').on('click', 'a', function(e){
  console.log('here'); 
    if ($(this).parent().children('ul').length){
    e.preventDefault();
    $('a.active').removeClass('active');
    $('.nolist').slideUp();
    $(this).addClass('active');
    $(this).parent().children('ul').slideDown();
  }         
  });

  $('.sidebar-menu li').on('click', 'a.active', function(e){
    e.preventDefault();
    $(this).removeClass('active');
  $(this).parent().children('ul').slideUp();   
    
  });

</script>

@yield('scripts')
</body>
</html>                            
<div class="row ">
  <div class="col-sm-6" style="font-size: 11px;"><i class="fa fa-phone" style="background-color:#fdb819; padding: 10px;  display: inline-block;"></i> Cant find what you are looking for? Call our support team: <strong> (+254) 783 111 333 (+254) 727 78 78 78.</strong></div>
  <div class="col-sm-6" style="font-size: 11px; padding-top: 5px;"><marquee> We provide quality car spare parts, timely, efficiently and at affordable standardized prices.</marquee></div>
  <div class="col-sm-4"></div>
</div>
    
<div class="row headbox">
  <div class="col-sm-3">
    <a href="{{ url('/') }}" style="padding: 0px;">
    <img src="{{ asset('img/sukilogo.png') }}" alt="SUKISPARES" style="height:60px; max-width: 160px;">
    </a>
  </div>
  <div class="col-sm-5">
    <form action="/search" method="POST">
      @csrf
        <div class="input-group">
          <select class="form-select" name="category_id">
            <option value="">Select Category</option>
            @foreach($globalCategories as $gcategory)
            <option value="{{$gcategory->id}}">{{$gcategory->name}}</option>
            @endforeach
          </select>
        <input class="form-control" name="query" type="search" placeholder="Search" aria-label="Search" style="border:none; border-left:1px solid;">
        <button class="btn btn-sm btn-warning" type="submit"><i class="fa fa-search"></i></button>
        </div>
      </form>
      <span style="color: #FFF; font-size: 12px; display: block;">Search for your spares here. Eg: Subaru XV Oil Filter</span>
  </div>
  <div class="col-sm-4" style="text-align: right;">
    <div class="hm-minicart"></div>
  </div>
</div>



    <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm" style="z-index: 2;" >
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
      <ul class="navbar-nav">
      <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
      <li class="nav-item"><a href="/shop" class="nav-link">Shop</a></li>
      <li class="nav-item"><a href="/requestSpare" class="nav-link">Request Spare</a></li>
      <li class="nav-item"><a href="/about" class="nav-link">About us</a></li>
      <li class="nav-item"><a href="/contact" class="nav-link">Contact us</a></li>
      </ul>
    <div class="navbar-nav" style="margin-left: 0px; margin-right: 100px;">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Dashboard') }}
                                    </a>
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
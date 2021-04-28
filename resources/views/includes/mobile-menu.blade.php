<ul class="navbar-nav only-mobile">
    <li class="nav-item"><a href="/home" class="nav-link"><i class="fa fa-tachometer"></i> Dashboard</a>
     </li>
     @can('View Product')
     <li class="dropdown">
     <a href="#products" class="nav-link"><i class="fa fa-caret-square-o-down"></i> Product
     </a>
     <ul class="dropdown-menu">
      @can('View Product')
      <li class="dropdown-item"><a href="/product"><i class="fa fa-product-hunt"></i> Products</a></li>
       @endcan
       @can('Create Product')
       <li class="dropdown-item"><a href="/product/create"><i class="fa fa-plus"></i> Create products</a></li>
      @endcan
      @can('View Category')
      <li class="dropdown-item"><a href="/category"><i class="fa fa-tag"></i> Categories</a></li>
      @endcan
      @can('View SubCategory')
      <li class="dropdown-item"><a href="/subCategory"><i class="fa fa-tag"></i> Sub Categories</a></li>
      @endcan
      </ul>
      </li>
      @endcan

      <li class="dropdown"><a href="#" class="nav-link"><i class="fa fa-first-order"></i> Orders</a>
      <ul class="dropdown-menu">
      <li class="dropdown-item"><a href="/pending"><i class="fa fa-clock-o"></i> Pending </a></li>
      <li class="dropdown-item"><a href="/delivery"><i class="fa fa-check"></i> Delivery in progress</a></li>
      <li class="dropdown-item"><a href="/complete"><i class="fa fa-check"></i> Completed</a></li>
      </ul>
      </li>
      <li class="nav-item">
      <a href="/affiliate" class="nav-link"><i class="fa fa-dollar"></i> Affiliate Earnings 
      </a>
      </li>

      @can('View Banner')
      <li class="dropdown"><a href="#" class="nav-link"><i class="fa fa-gift"></i> Coupon</a>
      <ul class="dropdown-menu">
        @can('View Banner')
        <li class="dropdown-item"><a href="/coupon"><i class="fa fa-gift"></i> Coupons</a></li>
        @endcan
        @can('View Banner')
        <li class="dropdown-item"><a href="/coupon/create"><i class="fa fa-plus"></i> Create coupon </a></li>
        @endcan 
      </ul>
      </li>
      @endcan

      @can('View Banner')
      <li class="dropdown"><a href="#" class="nav-link"><i class="fa fa-file-image-o"></i> Banner </a>
      <ul class="dropdown-menu">
      @can('View Banner')
      <li class="dropdown-item"><a href="/banner"><i class="fa fa-flag"></i> Banners</a></li>
      @endcan
      @can('Create Banner')
      <li class="dropdown-item">
        <a href="/banner/create"><i class="fa fa-plus"></i> Create Banner</a>
      </li>
      @endcan
      </ul>
      @endcan

        @can('View Mechanic')
       </li>
       <li class="dropdown"><a href="#" class="nav-link"><i class="fa fa-wrench"></i></i> Mechanic </a>
       <ul class="dropdown-menu">
        @can('View Mechanic')
        <li class="dropdown-item"><a href="/mechanic"><i class="fa fa-wrench"></i> Mechanics</a></li>
        @endcan
        @can('Create Mechanics')
        <li class="dropdown-item">
        <a href="/mechanic/create"><i class="fa fa-plus"></i> Create mechanic</a>
        </li>
        @endcan
        @can('View MechaniRequest')
       <li class="dropdown-item">
        <a href="/mechaniRequest"><i class="fa fa-paper-plane"></i> Requests</a>
       </li>
       @endcan
      </ul>
      </li>
      @endcan

      @can('View SpareRequest')
      <li class="nav-item">
      <a href="/spareRequest" class="nav-link"><i class="fa fa-wrench"></i> SpareRequest 
      </a>
      </li>
      @endcan

      @can('View Rider')
      <li class="dropdown">
      <a href="#" class="nav-link"><i class="fa fa-motorcycle"></i> Rider 
      </a>
      <ul class="dropdown-menu">
      <li class="dropdown-item">
      <a href="/rider"><i class="fa fa-tasks"></i> Riders</a>
      </li>
      @endcan
      @can('Create Rider')
      <li class="dropdown-item"><a href="/rider/create"><i class="fa fa-plus"></i> Create rider</a></li>
      </ul>
   	  </li>
      @endcan

      @can('is_admin')
      <li class="dropdown"><a href="#" class="nav-link"><i class="fa fa-cog"></i> Settings </a>
      <ul class="dropdown-menu">
        @can('View Make')
        <li class="dropdown-item"><a href="/make"><i class="fa fa-car"></i> Makes</a></li>
        @endcan
        @can('View Model')
        <li class="dropdown-item"><a href="/model"><i class="fa fa-car"></i> Model</a></li>
        @endcan
        @if(Auth::user()->is_admin == 1)
        <li class="dropdown-item"><a href="/role"><i class="fa fa-tasks"></i> Roles</a></li>
        @endif
        @can('View User')
        <li class="dropdown-item"><a href="/user"><i class="fa fa-users"></i> Users</a></li>
        @endcan
      </ul>
    </li>
    @endcan
  </ul>
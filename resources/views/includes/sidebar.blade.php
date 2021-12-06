<div class="col-sm-2 sidebar">
    <ul class="sidebar-menu">
    <li><a href="/home" class="navy"><i class="fa fa-tachometer"></i> Dashboard</a>
     </li>
     
     @can('View Product')
     <li>
     <a href="#products" class="navy"><i class="fa fa-caret-square-o-down"></i> Product<i class="fa fa-chevron-right"></i>
     </a>
     <ul class="nolist">
      @can('View Product')
      <li><a href="/product"><i class="fa fa-product-hunt"></i> Products</a></li>
       @endcan
       @can('Create Product')
       <li><a href="/product/create"><i class="fa fa-plus"></i> Create products</a></li>
      @endcan
      @can('View Category')
      <li><a href="/category"><i class="fa fa-tag"></i> Categories</a></li>
      @endcan
      @can('View SubCategory')
      <li><a href="/subCategory"><i class="fa fa-tag"></i> Sub Categories</a></li>
      @endcan
      </ul>
      </li>
      @endcan

      <li><a href="#" class="navy"><i class="fa fa-first-order"></i> Orders<i class="fa fa-chevron-right"></i></a>
      <ul class="nolist">
      <li><a href="/pending"><i class="fa fa-clock-o"></i> Pending </a></li>
      <li><a href="/delivery"><i class="fa fa-check"></i> Delivery in progress</a></li>
      <li><a href="/complete"><i class="fa fa-check"></i> Completed</a></li>
      </ul>
      </li>
      <li>
      <a href="/affiliate" class="navy"><i class="fa fa-dollar"></i> Affiliate Earnings <i class="fa fa-chevron-right"></i>
      </a>
      </li>

      @can('View Banner')
      <li><a href="#" class="navy"><i class="fa fa-gift"></i> Coupon<i class="fa fa-chevron-right"></i></a>
      <ul class="nolist">
        @can('View Banner')
        <li><a href="/coupon"><i class="fa fa-gift"></i> Coupons</a></li>
        @endcan
        @can('View Banner')
        <li><a href="/coupon/create"><i class="fa fa-plus"></i> Create coupon </a></li>
        @endcan 
      </ul>
      </li>
      @endcan

      @can('View Banner')
      <li><a href="#" class="navy"><i class="fa fa-file-image-o"></i> Banner <i class="fa fa-chevron-right"></i></a>
      <ul class="nolist">
      @can('View Banner')
      <li><a href="/banner"><i class="fa fa-flag"></i> Banners</a></li>
      @endcan
      @can('Create Banner')
      <li>
        <a href="/banner/create"><i class="fa fa-plus"></i> Create Banner</a>
      </li>
      @endcan
      </ul>
      @endcan

        @can('View Mechanic')
       </li>
       <li><a href="#" class="navy"><i class="fa fa-wrench"></i></i> Mechanic <i class="fa fa-chevron-right"></i></a>
       <ul class="nolist">
        @can('View Mechanic')
        <li><a href="/mechanic"><i class="fa fa-wrench"></i> Mechanics</a></li>
        @endcan
        @can('Create Mechanics')
        <li>
        <a href="/mechanic/create"><i class="fa fa-plus"></i> Create mechanic</a>
        </li>
        @endcan
        @can('View MechaniRequest')
       <li>
        <a href="/mechaniRequest"><i class="fa fa-paper-plane"></i> Requests</a>
       </li>
       @endcan
      </ul>
      </li>
      @endcan

      @can('View SpareRequest')
      <li>
      <a href="/spareRequest" class="navy"><i class="fa fa-wrench"></i> SpareRequest <i class="fa fa-chevron-right"></i>
      </a>
      </li>
      @endcan

      @can('View Rider')
      <li>
      <a href="#" class="navy"><i class="fa fa-motorcycle"></i> Rider <i class="fa fa-chevron-right"></i>
      </a>
      <ul class="nolist">
      <li>
      <a href="/rider"><i class="fa fa-tasks"></i> Riders</a>
      </li>
      @endcan
      @can('Create Rider')
      <li><a href="/rider/create"><i class="fa fa-plus"></i> Create rider</a></li>
      </ul>
   	  </li>
      @endcan
       @can('View Banner')
      <li><a href="#" class="navy"><i class="fa fa-handshake-o"></i> Partners <i class="fa fa-chevron-right"></i></a>
      <ul class="nolist">
      @can('View Banner')
      <li><a href="/partner"><i class="fa fa-flag"></i> partner</a></li>
      @endcan
      @can('Create Banner')
      <li>
        <a href="/partner/create"><i class="fa fa-plus"></i> Create Partner</a>
      </li>
      @endcan
      </ul>
      @endcan

      @can('is_admin')
      <li><a href="#" class="navy"><i class="fa fa-cog"></i> Settings <i class="fa fa-chevron-right"></i></a>
      <ul class="nolist">
        @can('View Make')
        <li><a href="/make"><i class="fa fa-car"></i> Makes</a></li>
        @endcan
        @can('View Model')
        <li><a href="/model"><i class="fa fa-car"></i> Model</a></li>
        @endcan
        @if(Auth::user()->is_admin == 1)
        <li><a href="/role"><i class="fa fa-tasks"></i> Roles</a></li>
        @endif
        @can('View User')
        <li><a href="/user"><i class="fa fa-users"></i> Users</a></li>
        @endcan
      </ul>
    </li>
    @endcan
  </ul>
</div>
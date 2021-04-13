<div class="col-sm-2 sidebar">
    <ul class="sidebar-menu">
    <li><a href="/" class="navy"><i class="fa fa-tachometer"></i> Dashboard</a>
     </li>
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
      <li><a href="#" class="navy"><i class="fa fa-first-order"></i> Orders<i class="fa fa-chevron-right"></i></a>
      <ul class="nolist">
      <li><a href=""><i class="fa fa-clock-o"></i> Pending </a></li>
      <li><a href=""><i class="fa fa-check"></i> Completed</a></li>
      </ul>
      </li>
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
        @can('View Mechanic_request')
       <li>
        <a href="/mechanic_request"><i class="fa fa-paper-plane"></i> Requests</a>
       </li>
       @endcan
      </ul>
      </li>
      <li>
      <a href="#" class="navy"><i class="fa fa-motorcycle"></i> Rider <i class="fa fa-chevron-right"></i>
      </a>
      <ul class="nolist">
      @can('View Rider')
      <li>
      <a href="/rider"><i class="fa fa-tasks"></i> Riders</a>
      </li>
      @endcan
      @can('Create Rider')
      <li><a href="/rider/create"><i class="fa fa-plus"></i> Create rider</a></li>
      @endcan
      </ul>
   	  </li>
      <li><a href="#" class="navy"><i class="fa fa-cog"></i> Settings <i class="fa fa-chevron-right"></i></a>
      <ul class="nolist">
        @can('View Make')
        <li><a href="/make"><i class="fa fa-car"></i> Makes</a></li>
        @endcan
        @can('View Model')
        <li><a href="/model"><i class="fa fa-car"></i> Model</a></li>
        @endcan
        @can('View Role')
        <li><a href="/role"><i class="fa fa-tasks"></i> Roles</a></li>
        @endcan
        @can('View User')
        <li><a href="/user"><i class="fa fa-users"></i> Users</a></li>
        @endcan
      </ul>
    </li>
  </ul>
</div>
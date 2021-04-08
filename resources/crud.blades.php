<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Create Banner
View Banner
Edit Banner
Delete Banner

Create Banner
View Banner
Edit Banner
Delete Banner

Create Category
Edit Category
Delete Category

Create Coupon
Edit Coupon
Delete Coupon

$this->authorize('viewAny', Item::class);
$this->authorize('create', Item::class);
$this->authorize('create', Item::class);
$this->authorize('view', $item);
$this->authorize('update', $item);
$this->authorize('update', $item);
$this->authorize('delete', $item);

Banner create
	<!-- 'id','title','image','url','location', -->


<div class="container">
<div class="row">
	<div class="col-sm-6">
		 @if ($errors->any())
    <div class="alert alert-danger mb-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
		<form action="/banner" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control">
			</div>
			   <div class="form-group">
       		 <label>Image</label>
        	<input type="file" name="image" class="form-control">
      			</div>
			<div class="form-group">
				<label>Url</label>
				<input type="text" name="url" class="form-control">
			</div>
			<div class="form-group">
				<label>Location</label>
				<input type="text" name="location" class="form-control">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-success">Save</button>
				<a href="/banner" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
			</div>
		</form>
	</div>
</div>
</div>

Index banner
<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
		<thead>
		<tr> 
        <th>NO</th>  
        <th>Image</th>
        <th>Title</th>
        <th>Url</th>
        <th>Location</th>
        <th>Action</th>
        </tr>
		</thead>
		<tbody>
        @foreach($banners as $banner) 
        <tr>
        <td>{{ ++$i }}</td>
        <td> <img src="{{ asset('public/images/' . $banner->image) }}" alt="image" height="50px"; width="50px"; /> </td>
        <td>{{$banner->title}}</td>
        <td>{{$banner->url}}</td>
        <td>{{$banner->location}}</td>
        <td><a href="/banner/{{$banner->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
        </tr>
        @endforeach
        </tbody>
		</table>
		{{$banners->links()}}
	</div>
</div>
</div>
edit banner
	<!-- 'id','title','image','url','location', -->
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/banner/{{$banner->id}}" method="POST" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" class="form-control" value="{{$banners->title}}">
		</div>
		<div class="form-group">
	    <label>Image</label>
	    <input type="file" name="image" class="form-control" value="{{$banners->image}}">
	    </div>
	    <div class="form-group">
	    <label>Url</label>
	    <input type="file" name="url" class="form-control" value="{{$banners->url}}">
	    </div>
	    <div class="form-group">
	    <label>Location</label>
	    <input type="file" name="location" class="form-control"value="{{$banners->location}">
	    </div>
	    <div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Update
		</button>
		</div>
		</form>
		</div>
	</div>
</div>



show blade
		<div class="container">
		<div class="row">
		<div class="col-sm-6">
			<!-- 'id','title','image','url','location', -->
		<table class="table table-condensed table-striped table-bordered">
		<tbody>
		<tr>
		<th>Title</th>
		<td>{{$banners->title}}</td>
		</tr>
		<tr>
		<th>Url</th>
		<td>{{$banners->url}}</td>
		</tr>
		<tr>
		<th>Location</th>
		<td>{{$banners->location}}</td>
		</tr>
		</tbody>
		</table>
		<form action="/banner/{{$banners->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="DELETE">
		<div class="btn btn-group">
		<a href="/banner/{{$banners->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
		<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
		<a href="/banner" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
		</div>
		<div class="col-sm-6">
		<table>
		<tr>
		<td><img src="{{ asset('public/images/' . $banners->image) }}" alt="image" height="230px"; width="230px"; /></td>
		</tr>
		</table>
		</div>
		</div>
		</div>



CATEGORY Blade

'id','name','slug','order'

Create
<div class="container">
<div class="row">
	<div class="col-sm-6">
	@if ($errors->any())
    <div class="alert alert-danger mb-2">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif
		<form action="/banner" method="POST">
		@csrf
		<div class="form-group">
		<label>Category name</label>
		<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
		<label>Slug</label>
		<input type="text" name="slug" class="form-control">
		</div>
		<div class="form-group">
       	<label>Order</label>
        <input type="text" name="order" class="form-control">
      	</div>
		<div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Save</button>
		<a href="/banner" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
	</div>
</div>
</div>


Index category
'id','name','slug','order'
<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
		<thead>
		<tr> 
        <th>NO</th>  
        <th>Category name</th>
        <th>Slug</th>
        <th>Order</th>
        <th>Action</th>
        </tr>
		</thead>
		<tbody>
        @foreach($categorys as $category) 
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->slug}}</td>
        <td>{{$category->order}}</td>
        <td><a href="/category/{{$category->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>view</a></td>
        </tr>
        @endforeach
        </tbody>
		</table>
		{{$banners->links()}}
	</div>
</div>
</div>

edit category
	'id','name','slug','order'
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/category/{{$categorys->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Category name</label>
		<input type="text" name="name" class="form-control" value="{{$categorys->name}}">
		</div>
		<div class="form-group">
	    <label>Slug</label>
	    <input type="text" name="slug" class="form-control" value="{{$categorys->slug}}">
	    </div>
	    <div class="form-group">
	    <label>Order</label>
	    <input type="text" name="order" class="form-control" value="{{$categorys->order}}">
	    </div>
	    <div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Update
		</button>
		</div>
		</form>
		</div>
	</div>
</div>

show blade category
'id','name','slug','order'

		<div class="container">
		<div class="row">
		<div class="col-sm-6">
		<table class="table table-condensed table-striped table-bordered">
		<tbody>
		<tr>
		<th>Category name</th>
		<td>{{$categorys->name}}</td>
		</tr>
		<tr>
		<th>Url</th>
		<td>{{$categorys->slug}}</td>
		</tr>
		<tr>
		<th>Order</th>
		<td>{{$categorys->order}}</td>
		</tr>
		</tbody>
		</table>
		<form action="/category/{{$categorys->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="DELETE">
		<div class="btn btn-group">
		<a href="/category/{{$categorys->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
		<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
		<a href="/category" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
		</div>
		</div>
		</div>



Coupon blade

'id','code','type','value','expiry_date'

Create
<div class="container">
<div class="row">
	<div class="col-sm-6">
	@if ($errors->any())
    <div class="alert alert-danger mb-2">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif
		<form action="/coupon" method="POST">
		@csrf
		<div class="form-group">
		<label>Coupon code</label>
		<input type="text" name="code" class="form-control">
		</div>
		<div class="form-group">
		<label>Type</label>
		<input type="text" name="type" class="form-control">
		</div>
		<div class="form-group">
       	<label>Value</label>
        <input type="text" name="value" class="form-control">
      	</div>
      	<div class="form-group">
       	<label>Expiry date</label>
       	<input type="date" name="expiry_date" class="form-control" value="{{date('Y-m-d')}}">
      	</div>
		<div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Save</button>
		<a href="/coupon" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
	</div>
</div>
</div>


Index Coupon
'id','code','type','value','expiry_date'
<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
		<thead>
		<tr> 
        <th>NO</th>  
        <th>Coupon code</th>
        <th>Type</th>
        <th>Value</th>
         <th>Expiry date</th>
        <th>Action</th>
        </tr>
		</thead>
		<tbody>
        @foreach($coupons as $coupon) 
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{$coupon->code}}</td>
        <td>{{$coupon->type}}</td>
        <td>{{$coupon->value}}</td>
        <td>{{$coupon->expiry_date}}</td>
        <td><a href="/coupon/{{$coupon->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>view</a></td>
        </tr>
        @endforeach
        </tbody>
		</table>
		{{$coupons->links()}}
	</div>
</div>
</div>

edit coupons
	'id','code','type','value','expiry_date'
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/category/{{$coupons->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Coupon code</label>
		<input type="text" name="code" class="form-control" value="{{$coupons->code}}">
		</div>
		<div class="form-group">
	    <label>Type</label>
	    <input type="text" name="type" class="form-control" value="{{$coupons->type}}">
	    </div>
	    <div class="form-group">
	    <label>Value</label>
	    <input type="text" name="value" class="form-control" value="{{$coupons->value}}">
	    </div>
	    <div class="form-group">
	    <label>Expiry date</label>
	    <input type="date" name="expiry_date" class="form-control" value="{{$coupons->expiry_date}}">
	    </div>
	    <div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Update
		</button>
		</div>
		</form>
		</div>
	</div>
</div>

show blade coupons
'id','code','type','value','expiry_date'

	<div class="container">
		<div class="row">
		<div class="col-sm-6">
		<table class="table table-condensed table-striped table-bordered">
		<tbody>
		<tr>
		<th>Coupon code</th>
		<td>{{$coupons->code}}</td>
		</tr>
		<tr>
		<th>Type</th>
		<td>{{$coupons->type}}</td>
		</tr>
		<tr>
		<th>Value</th>
		<td>{{$coupons->value}}</td>
		</tr>
		<tr>
		<th>Expiry date</th>
		<td>{{$coupons->expiry_date}}</td>
		</tr>
		</tbody>
		</table>
		<form action="/coupon/{{$coupons->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="DELETE">
		<div class="btn btn-group">
		<a href="/coupon/{{$coupons->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
		<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
		<a href="/coupon" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
		</div>
		</div>
	</div>



product blade

  	'id','name','slug','price','sale_price','description','featured','quantity',
   	'image1','image2','image3','image4','make_id','model_id','year','engine',
   	'fuel','sub_category_id','category_id','status'

Create
<div class="container">
<div class="row">
	<div class="col-sm-6">
	@if ($errors->any())
    <div class="alert alert-danger mb-2">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif
		<form action="/make" method="POST">
		@csrf
		<div class="form-group">
		<label>Product name</label>
		<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
		<label>Slug</label>
		<input type="text" name="slug" class="form-control">
		</div>
		<div class="form-group">
		<label>Price</label>
		<input type="text" name="price" class="form-control">
		</div>
		<div class="form-group">
		<label>Selling price</label>
		<input type="text" name="sale_price" class="form-control">
		</div>
		<div class="form-group">
		<label>Product description</label>
		<input type="text" name="description" class="form-control">
		</div>
		<div class="form-group">
		<label>Featured</label>
		<input type="text" name="featured" class="form-control">
		</div>
		<div class="form-group">
		<label>Quantity</label>
		<input type="text" name="quantity" class="form-control">
		</div>
		<div class="form-group">
		<label>Image</label>
		<input type="text" name="image1" class="form-control">
		</div>
		<div class="form-group">
		<label>Image</label>
		<input type="text" name="image2" class="form-control">
		</div>
		<div class="form-group">
		<label>Image</label>
		<input type="text" name="image3" class="form-control">
		</div>
		<div class="form-group">
		<label>Image</label>
		<input type="text" name="image4" class="form-control">
		</div>
		<div class="form-group">
		<label>Make</label>
		<select class="form-control" name="make_id">
        @foreach($makes as $make)
        <option value="{{$make->id}}">{{$make->name}}</option>
        @endforeach
         </select>
		</div>
		<div class="form-group">
		<label>Model</label>
		<select class="form-control" name="model_id">
        @foreach($models as $model)
        <option value="{{$model->id}}">{{$model->name}}</option>
        @endforeach
         </select>
		</div>
		<div class="form-group">
		<label>Year</label>
		<input type="text" name="year" class="form-control">
		</div>
		<div class="form-group">
		<label>Engine</label>
		<input type="text" name="engine" class="form-control">
		</div>
		<div class="form-group">
		<label>Fuel</label>
		<input type="text" name="fuel" class="form-control">
		</div>
		<div class="form-group">
		<label>Category</label>
		<select class="form-control" name="category_id">
        @foreach($categorys as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
		</div>
		<div class="form-group">
		<label>Sub category</label>
		<select class="form-control" name="sub_category_id">
        @foreach($sub_categorys as $sub_category)
        <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
        @endforeach
         </select>
		</div>
		<div class="form-group">
		<label>Status</label>
		<input type="text" name="status" class="form-control">
		</div>
		<div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Save</button>
		<a href="/product" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
	</div>
</div>
</div>


Index product

<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
		<thead>
		<tr> 
		<th>NO</th> 
		<th>Image<th>
		<th>Product name<th>
		<th>Price<th>
		<th>Selling price<th>
		<th>Quantity<th>
		<th>Category<th>
		<th>Sub category<th>
		<th>Make<th>
		<th>Model<th>
		<th>Year<th>
		<th>Engine<th>
		<th>Fuel<th>
		<th>Status<th>
		<th>Action</th>
        </tr>
		</thead>
		<tbody>
        @foreach($products as $product) 
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{$product->image1}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->sale_price}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->category->name}}</td>
        <td>{{$product->sub_category->name}}</td>
        <td>{{$product->make->name}}</td>
        <td>{{$product->model->name}}</td>
        <td>{{$product->year}}</td>
        <td>{{$product->engine}}</td>
        <td>{{$product->fuel}}</td>
        <td>{{$product->status}}</td>
        <td><a href="/product/{{$product->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>view</a></td>
        </tr>
        @endforeach
        </tbody>
		</table>
		{{$make->links()}}
	</div>
</div>
</div>

edit product
	
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/product/{{$products->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Product name</label>
		<input type="text" name="name" class="form-control" value="{{$products->name}}">
		</div>
		<div class="form-group">
		<label>Slug</label>
		<input type="text" name="slug" class="form-control" value="{{$products->slug}}">
		</div>
		<div class="form-group">
		<label>Price</label>
		<input type="text" name="price" class="form-control" value="{{$products->price}}">
		</div>
		<div class="form-group">
		<label>Selling price</label>
		<input type="text" name="sale_price" class="form-control" value="{{$products->sale_price}}">
		</div>
		<div class="form-group">
		<label>Product description</label>
		<input type="text" name="description" class="form-control" value="{{$products->description}}">
		</div>
		<div class="form-group">
		<label>Featured</label>
		<input type="text" name="featured" class="form-control" value="{{$products->featured}}">
		</div>
		<div class="form-group">
		<label>Quantity</label>
		<input type="text" name="quantity" class="form-control" value="{{$products->quantity}}">
		</div>
		<div class="form-group">
		<label>Image</label>
		<input type="text" name="image1" class="form-control" value="{{$products->image1}}">
		</div>
		<div class="form-group">
		<label>Image</label>
		<input type="text" name="image2" class="form-control" value="{{$products->image2}}">
		</div>
		<div class="form-group">
		<label>Image</label>
		<input type="text" name="image3" class="form-control" value="{{$products->image3}}">
		</div>
		<div class="form-group">
		<label>Image</label>
		<input type="text" name="image4" class="form-control" value="{{$products->image4}}">
		</div>
		<div class="form-group">
		<label>Make</label>
		<select class="form-control" name="make_id">
        @foreach($makes as $make)
        <option value="{{$make->id}}">{{$make->name}}</option>
        @endforeach
         </select>
		</div>
		<div class="form-group">
		<label>Model</label>
		<select class="form-control" name="model_id">
        @foreach($models as $model)
        <option value="{{$model->id}}">{{$model->name}}</option>
        @endforeach
         </select>
		</div>
		<div class="form-group">
		<label>Year</label>
		<input type="text" name="year" class="form-control" value="{{$products->image4}}">
		</div>
		<div class="form-group">
		<label>Engine</label>
		<input type="text" name="engine" class="form-control" value="{{$product->engine}}">
		</div>
		<div class="form-group">
		<label>Fuel</label>
		<input type="text" name="fuel" class="form-control" value="{{$products->fuel}}">
		</div>
		<div class="form-group">
		<label>Category</label>
		<select class="form-control" name="category_id">
        @foreach($categorys as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
		</div>
		<div class="form-group">
		<label>Sub category</label>
		<select class="form-control" name="sub_category_id">
        @foreach($sub_categorys as $sub_category)
        <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
        @endforeach
         </select>
		</div>
		<div class="form-group">
		<label>Status</label>
		<input type="text" name="status" class="form-control" value="{{$producst->status}}">
		</div>
		<div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Update</button>
		</div>
		</form>
		</div>
	</div>
</div>

show blade product
	'id','name','order'

	<div class="container">
		<div class="row">
		<div class="col-sm-6">
		<table class="table table-condensed table-striped table-bordered">
		<tbody>
		<tr>
		<th>Product name</th>
		<td>{{$products->name}}</td>
		</tr>
		<tr>
		<th>Price</th>
		<td>{{$products->price}}</td>
		</tr>
		</tbody>
		</table>
		<form action="/product/{{$product->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="DELETE">
		<div class="btn btn-group">
		<a href="/product/{{$products->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
		<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
		<a href="/product" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
		</div>
		</div>
	</div>







</body>
</html>


Create Banner
View Banner
Edit Banner
Delete Banner

Create Category
View Category
Edit Category
Delete Category

Create Coupon
View Coupon
Edit Coupon
Delete Coupon

Create Make
View Make
Edit Make
Delete Make

Create Mechanic
View Mechanic
Edit Mechanic
Delete Mechanic

Create Mechanic_request
View Mechanic_request
Edit Mechanic_request
Delete Mechanic_request

Create Model
View Model
Edit Model
Delete Model

Create Order
View Order
Edit Order
Delete Order

Create Order_item
View Order_item
Edit Order_item
Delete Order_item

Create Product
View Product
Edit Product
Delete Product

Create Rider
View Rider
Edit Rider
Delete Rider

Create Spare_request
View Spare_request
Edit Spare_request
Delete Spare_request

Create Sub_category
View Sub_category
Edit Sub_category
Delete Sub_category

Create User
View User
Edit User
Delete User


index role

<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
		<thead>
		<tr> 
		<th>NO</th> 
		<th>Role name<th>
		<th>Action</th>
        </tr>
		</thead>
		<tbody>
        @foreach($roles as $role) 
        <tr>
        <td>{{++$i}}</td>
        <td>{{$role->name}}</td>
        <td><a href="/role/{{$role->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>view</a></td>
        </tr>
        @endforeach
        </tbody>
		</table>
		{{$make->links()}}
	</div>
</div>
</div>


role edit
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/product/{{$products->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Role name</label>
		<input type="text" name="name" class="form-control" value="{{$roles->name}}">
		</div>	
		<div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Update</button>
		</div>
		</form>
		</div>
	</div>
</div>



role show


	<div class="container">
		<div class="row">
		<div class="col-sm-6">
		<table class="table table-condensed table-striped table-bordered">
		<tbody>
		<tr>
		<th>Product name</th>
		<td>{{$roles->name}}</td>
		</tr>
		</tbody>
		</table>
		<form action="/role/{{$role->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="DELETE">
		<div class="btn btn-group">
		<a href="/role/{{$roles->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
		<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
		<a href="/role" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
		</div>
		</div>
	</div>

create role
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/role/{{$roles->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Role name</label>
		<input type="text" name="name" class="form-control" value="{{$roles->name}}">
		</div>
		<div class="form-group">
		<label>Permission</label>
		@foreach ($permissions as $permission)

    	<div class="checkbox">
        <label>
            {{ ucfirst($permission->name) }}
        </label>
        <input type="checkbox" name="permissions[]" value="{{ $permission->id }} {{($roles->permissions == $permission->id) ? 'checked' : ''}}">
        <br>
    	</div>
		@endforeach
		</div>		
		<div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Update</button>
		</div>
		</form>
		</div>
	</div>
</div>




create edit
<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/role/{{$roles->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Role name</label>
		<input type="text" name="name" class="form-control" value="{{$roles->name}}">
		</div>
		<div class="form-group">
		<label>Permission</label>
		@foreach ($permissions as $permission)

    	<div class="checkbox">
        <label>
            {{ ucfirst($permission->name) }}
        </label>
        <input type="checkbox" name="permissions[]" value="{{ $permission->id }} {{($roles->permissions == $permission->id) ? 'checked' : ''}}">
        <br>
    	</div>
		@endforeach
		</div>		
		<div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Update</button>
		</div>
		</form>
		</div>
	</div>
</div>

<div class="form-check form-switch col-sm-3">
<input type="checkbox" class="form-check-input" name="permissions[]" id="Edit-BaseRate" value="Edit BaseRate">
<label class="form-check-label" for="Edit">Edit BaseRate</label>
</div>


role show
<div class="container">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
           <label>Role name</label>
            {{ $roles->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $rolePermission)
                    <label class="label label-success">{{ $rolePermission->name }},</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
</div>


make blade
create
'id','name','order'
<div class="container">
<div class="row">
	<div class="col-sm-6">
		 @if ($errors->any())
    <div class="alert alert-danger mb-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
		<form action="/make" method="POST">
			@csrf
			<div class="form-group">
				<label>Make</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Order</label>
				<input type="text" name="order" class="form-control">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-success">Save</button>
				<a href="/make" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
			</div>
		</form>
	</div>
</div>
</div>

Index Make
'id','name','order'
<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
		<thead>
		<tr> 
        <th>NO</th>  
        <th>Make</th>
        <th>Order</th>
        <th>Action</th>
        </tr>
		</thead>
		<tbody>
        @foreach($makes as $make) 
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{$make->name}}</td>
        <td>{{$make->order}}</td>
        <td><a href="/make/{{$make->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
        </tr>
        @endforeach
        </tbody>
		</table>
		{{$make->links()}}
	</div>
</div>
</div>
edit make

<div class="container">
	<div class="row">
		<div class="col-sm-6">
		<form action="/make/{{$make->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT">
		<div class="form-group">
		<label>Make</label>
		<input type="text" name="name" class="form-control" value="{{$makes->name}}">
		</div>
	    <div class="form-group">
	    <label>Order</label>
	    <input type="file" name="order" class="form-control" value="{{$makes->order}}">
	    </div>
	    <div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Update
		</button>
		</div>
		</form>
		</div>
	</div>
</div>



show blade
		<div class="container">
		<div class="row">
		<div class="col-sm-6">
		<table class="table table-condensed table-striped table-bordered">
		<tbody>
		<tr>
		<th>Make</th>
		<td>{{$makes->name}}</td>
		</tr>
		<tr>
		<th>Url</th>
		<td>{{$makes->order}}</td>
		</tr>
		</tbody>
		</table>
		<form action="/make/{{$makes->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="DELETE">
		<div class="btn btn-group">
		<a href="/make/{{$makes->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
		<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
		<a href="/make" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
		</div>
		</div>
		</div>


Mechanic blade

<div class="container">
<div class="row">
	<div class="col-sm-6">
		 @if ($errors->any())
    <div class="alert alert-danger mb-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
		<form action="/make" method="POST">
			@csrf
				<div class="form-group">
				<label>Make</label>
				<select class="form-control" name="sub_category_id">
       			 @foreach($makes as $make)
        		<option value="{{$make->id}}">{{$make->name}}</option>
        		@endforeach
        		 </select>
				</div>
				<div class="form-group">
				<label>Longitude</label>
				<input type="text" name="longitude" class="form-control">
				</div>
				<div class="form-group">
				<label>Latitude</label>
				<input type="text" name="latitude" class="form-control">
				</div>
				<div class="form-group">
				<label>Mechanic</label>
				<select class="form-control" name="sub_category_id">
       			 @foreach($users as $user)
        		<option value="{{$make->id}}">{{$user->name}}</option>
        		@endforeach
        		 </select>
				</div>
			<div class="form-group">
				<label>Approved</label>
				<input type="text" name="approved" class="form-control">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-sm btn-success">Save</button>
				<a href="/mechanic" class="btn btn-sm btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
			</div>
		</form>
	</div>
</div>
</div>

Index mechanic
id','location','latitude','longitude','make_id','status','approved','user_id'
<div class="container">
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered">
		<thead>
		<tr> 
        <th>NO</th>  
        <th>Mechanic</th>
        <th>Location</th>
        <th>Approved</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
		</thead>
		<tbody>
        @foreach($mechanics as $mechanic) 
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{$mechanic->user->name}}</td>
        <td>{{$mechanic->make->name}}</td>
        <td>{{$mechanic->approved}}</td>
        <td>{{$mechanic->status}}</td>
        <td><a href="/make/{{$make->id}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> view</a></td>
        </tr>
        @endforeach
        </tbody>
		</table>
		{{$make->links()}}
	</div>
</div>
</div>
edit mechanic
<div class="container">
<div class="row">
	<div class="col-sm-6">
		<form action="/mechanic" method="POST">
			@csrf
				<div class="form-group">
				<label>Make</label>
				<select class="form-control" name="sub_category_id">
       			 @foreach($makes as $make)
        		<option value="{{$make->id}}">{{$make->name}}</option>
        		@endforeach
        		 </select>
				</div>
				<div class="form-group">
				<label>Longitude</label>
				<input type="text" name="longitude" class="form-control" value="{{$mechanics->longitude}}">
				</div>
				<div class="form-group">
				<label>Latitude</label>
				<input type="text" name="latitude" class="form-control" value="{{$mechanic->latitude}}">
				</div>
				<div class="form-group">
				<label>Mechanic</label>
				<select class="form-control" name="user_id">
       			 @foreach($users as $user)
        		<option value="{{$make->id}}">{{$user->name}}</option>
        		@endforeach
        		 </select>
				</div>
			<div class="form-group">
				<label>Approved</label>
				<input type="text" name="approved" class="form-control" value="{{$mechanics->approved}}">
			</div>
		 <div class="form-group">
		<button type="submit" class="btn btn-sm btn-success">Update
		</button>
		</div>
		</form>
	</div>
</div>
</div>
show blade
		<div class="container">
		<div class="row">
		<div class="col-sm-6">
		<table class="table table-condensed table-striped table-bordered">
		<tbody>
		<tr>
		<th>Make</th>
		<td>{{$mechanics->name}}</td>
		</tr>
		<tr>
		<th>Location</th>
		<td>{{$mechanics->location}}</td>
		</tr>
		<tr>
		<th>Approved</th>
		<td>{{$mechanics->approved}}</td>
		</tr>
		<tr>
		<th>Status</th>
		<td>{{$mechanics->status}}</td>
		</tr>
		</tbody>
		</table>
		<form action="/mechanic/{{$mechanics->id}}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="DELETE">
		<div class="btn btn-group">
		<a href="/mechanic/{{$mechanics->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
		<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete </button>
		<a href="/mechanic" class="btn btn-sm btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
		</div>
		</form>
		</div>
		</div>
		</div>




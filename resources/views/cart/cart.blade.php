<table class="table table-bordered">
    		<thead>
        		<tr> 
                    <th>#</th>  
                    <th>Images</th>
                    <th>Product</th>
                    <th>Unit Price</th>
                    <th width="150px">Qty</th>
                    <th>Total</th>
                </tr>
        		</thead>
        		<tbody>
                @foreach (Cart::content() as $item)
                    <tr>
                        <td>
                        <form action="" method=""> 
                            @csrf
                            <input type="hidden" name="rowId" value="{{$item->rowId}}">
                            <button class="btn btn-sm btn-light removeFromCartPage"><i class="fa fa-times"></i></button>
                        </form>
                        </td>
                        <td><a href="/sparepart/{{$item->model->slug}}" class="minicart-product-image"><img src="{{$item->model->firstImage}}" alt="cart products" width="50px"></a>
                        </td>
                        <td><a href="/sparepart/{{$item->model->slug}}">{{ $item->model->name }}</a></td>
                        <td>{{'Kes.'.number_format($item->model->effectivePrice)}}</td>
                        <td>
                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                <input type="hidden" name="product_id" value="{{$item->model->id}}">
                                <div class="input-group">
                                <button class="btn btn-md btn-outline-dark minus"><i class="fa fa-minus"></i></button>
                                <input type="number" name="qty" value="{{ $item->qty }}" class="form-control qty" style="border-color: #000;">
                                <button class="btn btn-md btn-outline-dark plus"><i class="fa fa-plus"></i></button>
                                </div>
                            </form>
                        </td>
                        <td>{{ 'Kes. '.number_format($item->subtotal,2) }}</td>
                    </tr>
                @endforeach
            </tbody>
		</table>
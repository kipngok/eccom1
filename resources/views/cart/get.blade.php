<a href="#" id="cartButton" class="header-icons"><i class="fa fa-shopping-basket"></i> CART <div class="badge badge-dark"> {{ Cart::instance('default')->count() }}</div></a>
<div class="minicart">
    <ul class="minicart-product-list">
        @foreach (Cart::content() as $item)
            <li><a href="/sparepart/{{$item->model->slug}}" class="minicart-product-image"><img src="{{$item->model->firstImage}}" alt="cart products" width="50px"></a>
                <div class="minicart-product-details">
                    <h6><a href="/sparepart/{{$item->model->slug}}">{{ $item->model->name }}</a></h6>
                    <span>{{ $item->qty }} x = {{ 'Kes'.number_format($item->subtotal,2) }}</span>
                </div>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="rowId" value="{{$item->rowId}}">
                    <button class="btn btn-sm btn-light removeFromCart"><i class="fa fa-times"></i></button>
                </form>
                </li>
        @endforeach
    </ul>
    <p class="minicart-total">SUBTOTAL: <span>{{ 'Kes'.Cart::subtotal() }}</span></p>
    <div class="minicart-button">
        <a href="{{ route('cart.index') }}" class="li-button li-button-dark li-button-fullwidth li-button-sm"><span>View Full Cart</span></a>
        <a href="{{ route('checkout.index') }}" class="li-button li-button-fullwidth li-button-sm"><span>Checkout</span></a>
    </div>
</div>
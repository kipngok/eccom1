@component('mail::message')
# Order Received

Thank you for your order.

**Order ID:** {{ $order->id }}

**Order Email:** {{ $order->email }}

**Order Name:** {{ $order->name }}

**Order Total:** Ksh{{ number_format($order->total, 2) }}

**Items Ordered**

@foreach ($order->orderItems as $item)
Name: {{ $item->product->name }} <br>
Price: Ksh{{ number_format($item->price,2)}} <br>
Quantity: {{ $item->qty }} <br>
@endforeach


You can get further details about your order by logging into our website.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

Thank you again for choosing us.

Regards,<br>
{{ config('app.name') }}
@endcomponent

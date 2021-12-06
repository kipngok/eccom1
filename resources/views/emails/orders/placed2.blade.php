 @component('mail::message')
# Order



**Order ID:** {{ $order->id }}

**Order From Email:** {{ $order->email }}

**Order From Name:** {{ $order->name }}

**Order Total:** Ksh{{ number_format($order->total, 2) }}

**Items Ordered**

@foreach ($order->orderItems as $item)
Name: {{ $item->product->name }} <br>
Price: Ksh{{ number_format($item->price,2)}} <br>
Quantity: {{ $item->qty }} <br>
@endforeach



@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to Website
@endcomponent

Thank you .

Regards,<br>
{{ config('app.name') }}
@endcomponent

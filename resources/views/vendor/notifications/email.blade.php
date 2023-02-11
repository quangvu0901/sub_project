@php
    $user_id = auth()->user()->id;
    $order = App\Models\Order::with('oderDetail', 'shipping')
        ->where('user_id', $user_id)
        ->orderBy('created_at', 'desc')
        ->first();
    $order_id = $order->id;
    $order_details = App\Models\OrderDetail::where('order_id', $order_id)->get();
    $shipping = App\Models\Shipping::where('order_id', $order_id)
        ->orderBy('created_at', 'desc')
        ->first();
    // dd($shipping->name);
    $i = 1;
    // dd($order_detail_id);
@endphp

{{-- @dd($order) --}}
<h1>{{ __('Hello! ') . auth()->user()->name }}<br /></h1>
<h2 style="color: green">{{ __('Congratulations on your successful purchase!') }}</h2>

<table class="table text-center align-middle table-bordered table-hover mb-0">
    <tbody>

        <tr style="font-size: 18px">
            <div><b>{{ __('Order ID: ') }}</b> {{ $order->id }}</div><br />
            <div><b>{{ __('Name: ') }}</b> {{ $shipping->name }} <b style="padding-left: 100px">{{ __('Email: ') }}</b>
                {{ $order->user->email }} </div><br />
            <div><b>{{ __('Phone: ') }}</b> {{ $shipping->phone }} <b
                    style="padding-left: 100px">{{ __('Address: ') }}</b> {{ $shipping->address }}</div><br />
            <div><b>{{ __('Total price: ') }}</b> {{ $order->total_price }} </div><br />
            <div><b>{{ __('Status: ') }}</b>
                @php
                    if ($order->status == App\Constants\Params::DELIVERING) {
                        echo 'Delivering for you';
                    } else {
                        echo 'Delivered for you';
                    }
                @endphp

                <b>{{ __('Date: ') }}</b> {{ date('d-m-Y H:i:s', strtotime($order->created_at)) }}
            </div><br />
            
        </tr>
        <tr style="font-size: 18px; margin-left: 100px">
            @foreach ($order_details as $order_detail)
                <div><b>{{ __('Order number: ') }}</b> {{ $i++ }} </div>
                <div><b>{{ __('Product name: ') }}</b> {{ $order_detail->product_name }} </div>
                <div><b>{{ __('Quantity: ') }}</b> {{ $order_detail->quantity }} </div>
                <div><b>{{ __('Product price: ') }}</b> {{ $order_detail->product_price }} </div>
            @endforeach
        </tr>
    </tbody>
</table>

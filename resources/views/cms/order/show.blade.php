@extends('index')

@section('content')
<div style="padding: 0 0 20px 90%">
    <a class="btn btn-sm btn-primary" href="{{route('admin.order') }}"><i class="fa fa-chevron-left"> {{ __('Back') }}</i></a>
</div>
<div class="d-flex align-items-center justify-content-between mb-4">
    <h6 class="mb-0">{{ __('Order detail') }}</h6>
</div>
    @php
        $stt = 1;
    @endphp
    <div class="table-responsive">
        {{-- @dd($orders) --}}
        <table class="table text-center align-middle table-bordered table-hover mb-0">
            <thead>
                <tr class="text-dark">
                    <th scope="col">{{ __('STT') }}</th>
                    <th scope="col">{{ __('Product') }}</th>
                    <th scope="col">{{ __('Quantity') }}</th>
                    <th scope="col">{{ __('Price') }}</th>
                    <th scope="col">{{ __('Amount') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders->oderDetail as $order_detail)
                    <td>{{ $stt++ }}</td>
                    <td>{{ $order_detail->product_name }}</td>
                    <td>{{ $order_detail->quantity }}</td>
                    <td>{{ $order_detail->product_price }}</td>
                    <td>{{ $order_detail->product_price * $order_detail->quantity }}</td>
                @endforeach
            </tbody>
        </table>
              
    </div>
    <br/>
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">{{ __('Shipping') }}</h6>
    </div>
    <div class="table-responsive">
        <table class="table text-center align-middle table-bordered table-hover mb-0">
            <thead>
                <tr class="text-dark">
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Phone') }}</th>
                    <th scope="col">{{ __('Address') }}</th>
                </tr>
            </thead>
            <tbody>
                <td>{{ $orders->shipping->name }}</td>
                <td>{{ $orders->shipping->phone }}</td>
                <td>{{ $orders->shipping->address }}</td>
            </tbody>
        </table>
    </div>
@endsection

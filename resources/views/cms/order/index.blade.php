@extends('index')

@section('content')
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">{{ __('List orders') }}</h6>
            <a class="btn btn-sm btn-primary" href="{{ route('admin.order.create') }}"><i class="fa fa-plus"></i>
                {{ __('Add') }}</a>
        </div>
        <div class="table-responsive">
            <table class="table text-center align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">{{ __('#') }}</th>
                        <th scope="col">{{ __('User') }}</th>
                        <th scope="col">{{ __('Product') }}</th>
                        <th scope="col">{{ __('Quantity') }}</th>
                        <th scope="col">{{ __('Total price') }}</th>
                        <th scope="col">{{ __('Status') }}</th>
                        <th scope="col">{{ __('Date') }}</th>
                        <th scope="col">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($orders))
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user_id }}</td>
                                <td>{{ $order->product_id }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                <td>
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('admin.order.edit', $order->id) }}"><i class="fa fa-pen"></i></a>
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ route('admin.order.delete', $order->id) }}"
                                        onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>
@endsection

@extends('index')

@section('content')
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">{{ __('List products') }}</h6>
            <a class="btn btn-sm btn-primary" href="{{ route('admin.product.create') }}"><i class="fa fa-plus"></i> {{ __('Add') }}</a>
        </div>

        <div class="table-responsive">
            <table class="table text-center align-middle table-bordered table-hover mb-0">
                <thead>
                <tr class="text-dark">
                    <th scope="col">{{ __('#') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Price') }}</th>
                    <th scope="col">{{ __('Quantity') }}</th>
                    <th scope="col">{{ __('Description') }}</th>
                    <th scope="col">{{ __('Category') }}</th>
                    <th scope="col">{{ __('Date') }}</th>
                    <th scope="col" style="width: 120px">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($products))

                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->description }}</td>
                            <td class="align-left">
                                @foreach($product->categories as $cat)
                                    {{ $cat->name }} <br/>
                                @endforeach
                            </td>

                            <td>{{ date('d-m-Y',strtotime($product->created_at)) }}</td>
                            <td style="width: 120px">
                                <a class="btn btn-sm btn-success" href="{{ route('admin.product.edit',$product->id) }}"><i class="fa fa-pen"></i> {{--Edit--}}</a>
                                <a class="btn btn-sm btn-danger" href="{{ route('admin.product.delete',$product->id) }}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> {{--Delete--}}</a>
                                <a class="btn btn-sm btn-danger" href="{{ route('admin.product.show',$product->id) }}" ><i class="fa fa-cart-plus"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
@endsection

@extends('index')

@section('content')
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Salse</h6>
            <a class="btn btn-sm btn-primary" href="{{ route('product.create') }}"><i class="fa fa-plus"></i> Add</a>
        </div>
        <div class="table-responsive">
            <table class="table text-center align-middle table-bordered table-hover mb-0">
                <thead>
                <tr class="text-dark">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
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
                            <td>
                                @foreach($product->categories as $cat)
                                    {{ $cat->name }}
                                @endforeach
                            </td>
                            <td>{{ date('d-m-Y',strtotime($product->created_at)) }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('product.edit',$product->id) }}"><i class="fa fa-pen"></i> {{--Edit--}}</a>
                                <a class="btn btn-sm btn-danger" href="{{ route('product.delete',$product->id) }}"><i class="fa fa-trash"></i> {{--Delete--}}</a>
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

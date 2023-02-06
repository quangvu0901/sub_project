@extends('index')

@section('content')
    <form action="{{ route('admin.order.store') }}" method="POST">
        @csrf
        <div class="py-2 ">
            <label class="w-100 h6">{{ __('User') }}</label>
            <input type="text" name="user_id" placeholder="Enter name" class="w-100 py-2 rounded border-1" value="{{ auth()->user()->name }}">
        </div>
        <div class="py-2">
            <label class="w-100 h6">{{ __('Product name') }}</label>
            <input type="text" name="product_id" placeholder="Enter name" class="w-100 py-2 rounded border-1" value="{{ $products->name }}"> 
        </div>
        <div class="py-2">
            <label class="w-100 h6">{{ __('Quantity') }}</label>
            <input type="number" name="quantity" placeholder="Enter name" class="w-100 py-2 rounded border-1"> 
        </div>
        <div class="py-2">
            <label class="w-100 h6">{{ __('Price') }}</label>
            <input type="text" name="price" placeholder="Enter name" class="w-100 py-2 rounded border-1" value="{{ $products->price }}"> 
        </div>
        <div>
            <input type="submit" value="Create" class="btn-success">
        </div>
    </form>
@endsection


<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>



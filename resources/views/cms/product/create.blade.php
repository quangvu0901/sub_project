@extends('index')

@section('content')

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="py-2 ">
            <label class="w-100 h6">Name</label>
            <input type="text" name="name" placeholder="Enter name" class="w-100 py-2 rounded border-1">
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">Price</label>
            <input type="number" name="price" placeholder="Enter price" class="w-100 py-2 rounded border-1">
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">Quantity</label>
            <input type="number" name="quantity" placeholder="Enter quantity" class="w-100 py-2 rounded border-1">
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">Description</label>
            <textarea name="description" placeholder="Enter description" class="w-100 py-2 rounded border-1"
                      rows="10"></textarea>
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">More Image</label>
            <input type="file" name="list_image[]" class="w-100 py-2 rounded border-1" multiple="multiple">
        </div>
        <select class="js-example-basic-multiple w-100 py-2 rounded border-1" name="category[]" multiple="multiple">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        <div>
            <input type="submit" value="Create" class="btn-success my-2">
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



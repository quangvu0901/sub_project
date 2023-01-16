@extends('index')

@section('content')

    <form action="{{ route('product.update',$products->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="py-2 ">
            <label class="w-100 h6">{{ __('Name') }}</label>
            <input type="text" name="name" class="w-100 py-2 rounded border-1"
                   value="{{ $products->name }}">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">{{ __('Price') }}</label>
            <input type="number" name="price" class="w-100 py-2 rounded border-1"
                   value="{{ $products->price }}">
            @error('price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">{{ __('Quantity') }}</label>
            <input type="number" name="quantity" class="w-100 py-2 rounded border-1"
                   value="{{ $products->quantity }}">
            @error('quantity')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">{{ __('Description') }}</label>
            <textarea name="description" class="w-100 py-2 rounded border-1"
                      rows="10">{{ $products->description }}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">{{ __('Images') }}</label>
            <input type="file" name="list_image[]" class="w-100 py-2 rounded border-1" multiple="multiple">
            @foreach($products->galeries as $galery)
                <img src="{{ asset('uploads/'.$galery->thumbnail) }}" style="width: 100px;height: 100px">
            @endforeach
            @error('list_image.*')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">{{ __('Categories') }}</label>
            <select class="js-example-basic-multiple w-100 py-2 rounded border-1" name="category[]" multiple="multiple">
                @foreach($categories as $cat)
                    <option {{$products->categories->contains('id', $cat->id)?"selected":""}} value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <input type="submit" value="Update" class="btn-success">
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



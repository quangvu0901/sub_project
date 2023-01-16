@extends('index')

@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="py-2 ">
            <label class="w-100 h6">{{ __('Name') }}</label>
            <input type="text" name="name" placeholder="Enter name" class="w-100 py-2 rounded border-1">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="py-2">
            <label class="w-100 h-8">{{ __('Category level') }}</label>
            <select name="parent_id" class="w-100 h-6">
                <option value="0">{{ __('Parent category') }}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">{{ __('Status') }}</label>
            <select name="status" class="w-100 py-2 rounded">
                <option value="1">{{ __('Active') }}</option>
                <option value="2">{{ __('Stopped') }}</option>
                <option value="3">{{ __('Broken') }}</option>
            </select>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
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



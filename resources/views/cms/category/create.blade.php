@extends('index')

@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="py-2 ">
            <label class="w-100 h6">Name</label>
            <input type="text" name="name" placeholder="Enter name" class="w-100 py-2 rounded border-1">
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">Status</label>
            <select name="status">
                <option value="1">Active</option>
                <option value="2">Stopped</option>
                <option value="3">Broken</option>
            </select>
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



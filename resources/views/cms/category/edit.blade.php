@extends('index')

@section('content')
    @foreach ($categories as $category)
        <form action="{{ route('category.update',$category->id) }}" method="POST">
            @csrf

            <div class="py-2 ">
                <label class="w-100 h6">Name</label>
                <input type="text" name="name" class="w-100 py-2 rounded border-1"
                       value="{{ $category->name }}">
            </div>
            <div class="py-2 ">
                <select name="status">
                    <option {{ $category->status == 1 ? 'selected' : '' }} value="1">Active</option>
                    <option {{ $category->status == 2 ? 'selected' : '' }} value="2">Stopped</option>
                    <option {{ $category->status == 3 ? 'selected' : '' }} value="3">Broken</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Update" class="btn-success">
            </div>

        </form>
    @endforeach
@endsection






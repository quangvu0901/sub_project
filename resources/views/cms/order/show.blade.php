@extends('index')

@section('content')
{{--    @foreach ($categories as $category)--}}
        <form action="{{ route('admin.category.update', $categories->id) }}" method="POST">
            @csrf

            <div class="py-2 ">
                <label class="w-100 h6">{{ __('Name') }}</label>
                <input type="text" name="name" class="w-100 py-2 rounded border-1" value="{{ $categories->name }}">
            </div>

            <div class="py-2 ">
                <label class="w-100 h6">{{ __('Category level') }}</label>
                <select class="w-100 h8" name="parent_id" >
                    <option value="{{ \App\Constants\Category::PARENT_CATEGOGY }}">{{ __('---Parent category---') }}</option>
                    @foreach($cats as $cat)
                        <option {{ $cat->id==$categories->parent_id ? "selected":"" }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="py-2 ">
                <label class="w-100 h-6">{{ __('Status') }}</label>
                <select name="status">
                    <option {{ $categories->status == \App\Constants\Category::ACTIVE_STATUS ? 'selected' : '' }}
                        value="{{ \App\Constants\Category::ACTIVE_STATUS }}">
                        {{ __('Active') }}
                    </option>
                    <option {{ $categories->status == \App\Constants\Category::STOP_STATUS ? 'selected' : '' }}
                        value="{{ \App\Constants\Category::STOP_STATUS }}">
                        {{ __('Stopped') }}
                    </option>
                    <option {{ $categories->status == \App\Constants\Category::BROKEN_STATUS ? 'selected' : '' }}
                        value="{{ \App\Constants\Category::BROKEN_STATUS }}">
                        {{ __('Broken') }}
                    </option>
                </select>
            </div>
            <div>
                <input type="submit" value="Update" class="btn-success">
            </div>

        </form>
{{--    @endforeach--}}
@endsection

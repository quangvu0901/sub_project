@extends('index')

@section('content')
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">{{ __('List categories') }}</h6>
            <a class="btn btn-sm btn-primary" href="{{ route('category.create') }}"><i class="fa fa-plus"></i> {{ __('Add') }}</a>
        </div>
        <div class="table-responsive">
            <table class="table text-center align-middle table-bordered table-hover mb-0">
                <thead>
                <tr class="text-dark">
                    <th scope="col">{{ __('#') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Status') }}</th>
                    <th scope="col">{{ __('Date') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($categories))

                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @php
                                if($category->status == \App\Constants\Category::ACTIVE_STATUS){
                                    echo "Active";
                                } elseif($category->status == \App\Constants\Category::STOP_STATUS){
                                    echo "Stopped";
                                }else{
                                    echo "Broken";
                                }
                                @endphp
                            </td>
                            <td>{{ date('d-m-Y',strtotime($category->created_at)) }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('category.edit',$category->id) }}"><i class="fa fa-pen"></i> {{--Edit--}}</a>
                                <a class="btn btn-sm btn-danger" href="{{ route('category.delete',$category->id) }}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> {{--Delete--}}</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
@endsection

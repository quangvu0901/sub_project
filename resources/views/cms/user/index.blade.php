@extends('index')
@dd(\Illuminate\Support\Facades\Auth::user())
@section('content')
<div class="bg-light text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h3 class="mb-0">{{ __('List users') }} {{--<a class="h6">({{ count($users) }})</a>--}} </h3>
        <a class="btn btn-sm btn-primary" href="{{ route('user.create') }}"><i class="fa fa-plus"></i> {{ __('Add') }}</a>
    </div>
    <div class="table-responsive">
        <table class="table text-center align-middle table-bordered table-hover mb-0">
            <thead>
                <tr class="text-dark">
                    <th scope="col">{{ __('#') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Email') }}</th>
                    <th scope="col">{{ __('Phone') }}</th>
                    <th scope="col">{{ __('Address') }}</th>
                    <th scope="col">{{ __('Birthday') }}</th>
                    <th scope="col">{{ __('Gender') }}</th>
                    <th scope="col">{{ __('Role') }}</th>
                    <th scope="col">{{ __('Date') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>

            @if(isset($users))

                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ optional($user->profile)->phone }}</td>
                        <td>{{ optional($user->profile)->address }}</td>
                        <td>{{ optional($user->profile)->birthday }}</td>
                        <td>
                            @php
                                if(optional($user->profile)->gender == \App\Constants\User::MALE)
                                    echo "Male";
                                elseif(optional($user->profile)->gender == \App\Constants\User::FEMALE)
                                    echo "Female";
                                else
                                    echo "Unknown";
                            @endphp
                        </td>
                    <td>
                        @php
                        if ($user->role == \App\Constants\User::ROLE_ADMIN) {
                            echo "Admin";
                        }else{
                            echo "Users";
                        }
                    @endphp
                    </td>
                    <td>{{ date('d-m-Y',strtotime($user->created_at)) }}</td>
                    <td>
                        <a class="btn btn-sm btn-success" href="{{ route('user.edit',$user->id) }}"><i class="fa fa-pen"></i> </a>
                        <a class="btn btn-sm btn-danger" href="{{ route('user.delete',$user->id) }}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>
                @endforeach

        @endif
            </tbody>

        </table>
    </div>
    {{ $users->links() }}
</div>
@endsection

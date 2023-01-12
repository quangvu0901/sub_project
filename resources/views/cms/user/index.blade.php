@extends('index')

@section('content')
<div class="bg-light text-center rounded p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Recent Salse</h6>
        <a class="btn btn-sm btn-primary" href="{{ route('user.create') }}"><i class="fa fa-plus"></i> Add</a>
    </div>
    <div class="table-responsive">
        <table class="table text-center align-middle table-bordered table-hover mb-0">
            <thead>
                <tr class="text-dark">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Role</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
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
                                if(optional($user->profile)->gender == 1)
                                    echo "Male";
                                elseif(optional($user->profile)->gender == 2)
                                    echo "Female";
                                else
                                    echo "Unknown";
                            @endphp
                        </td>
                    <td>
                        @php
                        if ($user->role == 1) {
                            echo "Admin";
                        }else{
                            echo "User";
                        }
                    @endphp
                    </td>
                    <td>{{ date('d-m-Y',strtotime($user->created_at)) }}</td>
                    <td>
                        <a class="btn btn-sm btn-success" href="{{ route('user.edit',$user->id) }}"><i class="fa fa-pen"></i> </a>
                        <a class="btn btn-sm btn-danger" href="{{ route('user.delete',$user->id) }}"><i class="fa fa-trash"></i> </a>
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

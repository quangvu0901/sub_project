@extends('index')

@section('content')

    <form action="{{ route('user.update',$users->id) }}" method="POST">
        @csrf

            <div class="py-2 ">
                <label class="w-100 h6">Username</label>
                    <input type="text" name="name" placeholder="Enter name" class="w-100 py-2 rounded border-1"
                        value="{{ $users->name }}" readonly>
            </div>
            <div class="py-2 ">
                <label class="w-100 h6">Email</label>
                    <input type="text" name="email" placeholder="Enter email" class="w-100 py-2 rounded border-1"
                        value="{{ $users->email }}" readonly>
            </div>
            <div class="py-2 ">
                <label class="w-100 h6">Password</label>
                    <input type="password" name="password" placeholder="Enter password" class="w-100 py-2 rounded border-1" value="{{ $users->password }}" readonly >
            </div>
            <div class="py-2 d-flex ">
                <div>
                    <label class="w-100 h6">Role</label>
                    <select name="role">
                        <option {{ $users->role == 1 ? 'selected' : '' }} value="1">Admin</option>
                        <option {{ $users->role == 2 ? 'selected' : '' }} value="2">User</option>
                    </select>
                </div>

            </div>
            <div>
                <input type="submit" value="Update" class="btn-success">
            </div>

    </form>

@endsection

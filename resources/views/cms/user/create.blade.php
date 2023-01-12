@extends('index')

@section('content')
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="py-2 ">
            <label class="w-100 h6">Username</label>
                <input type="text" name="name" placeholder="Enter name" class="w-100 py-2 rounded border-1">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">Email</label>
                <input type="email" name="email" placeholder="Enter email" class="w-100 py-2 rounded border-1">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">Password</label>
                <input type="password" name="password" placeholder="Enter password" class="w-100 py-2 rounded border-1">
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="py-2 d-flex ">
            <div class="w-100">
                <label class="w-100 h6">Role</label>
                <select name="role" class="w-100">
                    <option value="">--- Role ---</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
                @error('role')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div>
            <input type="submit" value="Create" class="btn-success">
        </div>
    </form>
@endsection

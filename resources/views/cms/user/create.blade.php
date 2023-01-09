@extends('index')

@section('content')
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="py-2 ">
            <label class="w-100 h6">Username</label>
                <input type="text" name="name" placeholder="Enter name" class="w-100 py-2 rounded border-1">
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">Email</label>
                <input type="email" name="email" placeholder="Enter email" class="w-100 py-2 rounded border-1">
        </div>
        <div class="py-2 ">
            <label class="w-100 h6">Password</label>
                <input type="password" name="password" placeholder="Enter password" class="w-100 py-2 rounded border-1">
        </div>
        <div class="py-2 d-flex">
{{--            <div>--}}
{{--                <label class="w-100 h6">Birthday</label>--}}
{{--                <input type="date" name="birthday" class=" py-2 rounded border-1">--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <label class="w-100 h6">Gender</label>--}}
{{--                <select name="gender">--}}
{{--                    <option>--- Gender ---</option>--}}
{{--                    <option value="1">Male</option>--}}
{{--                    <option value="2">Female</option>--}}
{{--                    <option value="3">Not now</option>--}}
{{--                </select>--}}
{{--            </div>--}}
            <div>
                <label class="w-100 h6">Role</label>
                <select name="role">
                    <option>--- Role ---</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
        </div>
{{--        <div class="py-2 ">--}}
{{--            <label class="w-100 h6">Phone</label>--}}
{{--            <input type="number" name="phone" placeholder="Enter phone numbers" class="w-100 py-2 rounded border-1">--}}
{{--        </div>--}}
{{--        <div class="py-2 ">--}}
{{--            <label class="w-100 h6">Address</label>--}}
{{--            <input type="text" name="address" placeholder="Enter address" class="w-100 py-2 rounded border-1">--}}
{{--        </div>--}}


        <div>
            <input type="submit" value="Create" class="btn-success">
        </div>
    </form>
@endsection

@extends('index')

@section('content')

    <form action="{{ route('user.update',$users->id) }}" method="POST">
        @csrf

            <div class="py-2 ">
                <label class="w-100 h6">{{ __('Username') }}</label>
                    <input type="text" name="name" placeholder="Enter name" class="w-100 py-2 rounded border-1"
                        value="{{ $users->name }}" readonly>
            </div>
            <div class="py-2 ">
                <label class="w-100 h6">{{ __('Email') }}</label>
                    <input type="text" name="email" placeholder="Enter email" class="w-100 py-2 rounded border-1"
                        value="{{ $users->email }}" readonly>
            </div>
            <div class="py-2 ">
                <label class="w-100 h6">{{ __('Password') }}</label>
                    <input type="password" name="password" placeholder="Enter password" class="w-100 py-2 rounded border-1" value="{{ $users->password }}" readonly>
            </div>
            <div class="py-2 d-flex ">
                <div>
                    <label class="w-100 h6">{{ __('Role') }}</label>
                    <select name="role">
                        <option {{ $users->role == \App\Constants\User::ROLE_ADMIN ? 'selected' : '' }} value="{{ \App\Constants\User::ROLE_ADMIN }}">{{ __('Admin') }}</option>
                        <option {{ $users->role == \App\Constants\User::ROLE_USER ? 'selected' : '' }} value="{{ \App\Constants\User::ROLE_USER }}">{{ __('User') }}</option>
                    </select>
                </div>

            </div>
            <div>
                <input type="submit" value="Update" class="btn-success">
            </div>

    </form>

@endsection

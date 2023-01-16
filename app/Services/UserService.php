<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser($request){
        $data = $request->all();
        $users = new User();
        $data['password'] = Hash::make($request->password);
        $users->fill($data);
        $users->save();
    }
}

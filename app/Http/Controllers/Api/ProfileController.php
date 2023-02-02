<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class ProfileController extends Controller
{
    public  function  __construct()
    {
        Auth::setDefaultDriver('api');
    }

    public function getUser()
    {

        $profile = User::find(Auth::user()->id)->profile;
        $user['profile'] = $profile;
        return response()->json([
            'status' => 'success',
            'user' => [
                'user' => Auth::user(),
                $user
            ],
        ]);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $user->profile()->updateOrCreate(
            ['user_id' => $request->user()->id],
            [
                'phone' => $request->phone,
                'address' => $request->address,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
            ]
        );
        $profile = User::find(Auth::user()->id)->profile;
        $user['profile'] = $profile;
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully edit profile',
            'user' => $user,
            //    'profile' =>$profile
        ]);
    }
}

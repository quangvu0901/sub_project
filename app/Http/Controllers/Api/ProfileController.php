<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public  function  __construct()
    {
        Auth::setDefaultDriver('api');
    }

    public function getUser()
    {
        $profile = User::find(Auth::user()->id)->profile;
        $user = $profile;
        return response()->json([
            'status' => 'success',
            'profile' => $user,
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
//        dd($request->hasFile('avatar'));
        if ($request->hasFile('avatar')) {
//            dd(1);
            $file = $request->file('avatar');
            $imageName = $file->getClientOriginalName();
            $link = $file->move(public_path('uploads/'), $imageName);
            $files = $imageName;
//            dd($request->all());
            $user->profile()->updateOrCreate(
                ['user_id' => $request->user()->id],
                [
                    'avatar' => $files,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'birthday' => $request->birthday,
                    'gender' => $request->gender,
                ]
            );
        }
        $profile = User::find(Auth::user()->id)->profile;
        $user['profile'] = $profile;
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully edit profile',
            'user' => $user,
        ]);
    }


}

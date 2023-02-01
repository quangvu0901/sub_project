<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();

        return response()->json($user);
    }
    public function update(Request $request)
    {
        $users = User::findOrFail(Auth::user()->id);
        $users->profile()->updateOrCreate([
            'user_id' => $request->user()->id,
        ],
            [
                'phone' => $request->phone,
                'address' => $request->address,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
            ]);

        return response()->json([
            'message' => 'Successfully',
            'information' => $users,
        ]);
    }
}

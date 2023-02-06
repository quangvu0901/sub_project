<?php


namespace App\Services;


use Illuminate\Support\Facades\Auth;

class OrderService
{
    public function order(){
        $user = Auth::user()->id;

    }
}

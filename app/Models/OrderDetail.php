<?php

namespace App\Models;

use Illuminate\Auth\Events\Failed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    // protected $timestamp = FALSE;
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'quantity',
        'product_price'
    ];

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'total_price',
        'status'
    ];

 
    public function orderDetailWithOrder()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function scopeSearch($query)
    {
        if ($keyword = request()->keyword) {
            $query = $query->where('user_id', 'like', '%' . $keyword . '%');
        }

        return $query;
    }
}

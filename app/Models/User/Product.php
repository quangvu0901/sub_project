<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = 'products';

    protected $fillable = [
        'id',
        'name',
        'price',
        'quantity',
        'description',
    ];

    public function scopeSearch($query)
    {
        if ($keyword = request()->keyword) {
            $query = $query->where('name', 'like', '%'.$keyword.'%');
        }

        return $query;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_products', 'product_id', 'category_id');
    }

    public function galeries()
    {
        return $this->hasMany(Galery::class, 'product_id', 'id');
    }
}

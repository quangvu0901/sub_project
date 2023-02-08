<?php

namespace App\Models;

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
        'discount',
        'description',
    ];

    public function scopeSearch($query)
    {
        if ($keyword = request()->keyword) {
            $query = $query->where('name', 'like', '%' . $keyword . '%');
        }

        return $query;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }

    public function orderDetailWithProduct()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function scopeFilter($products)
    {
        if (request('search')) {
            $products->where('name', 'LIKE', '%'.request('search').'%');
        }
        if (request('price_from')) {
            $products->where('price', '>=', request('price_from'))
                ->where('price', '<=', request('price_to'))->orderBy('price', 'asc');
        }
        if (request('time') == 'newest') {
            $products->orderBy('created_at', 'desc');
        }
        if (request('time') == 'oldest') {
            $products->orderBy('created_at', 'asc');
        }
        if (request('sort') == 'za') {
            $products->orderBy('name', 'desc');
        }
        if (request('sort') == 'az') {
            $products->orderBy('name', 'asc');
        }
        if (request('price') == 'desc') {
            $products->orderBy('price', 'desc');
        }
        if (request('price') == 'asc') {
            $products->orderBy('price', 'asc');
        }

        return $products;
        
    }
}

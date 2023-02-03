<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';

    protected $fillable = ['name', 'status', 'parent_id'];

    public function scopeSearch($query)
    {
        if ($keyword = request()->keyword) {
            $query = $query->where('name', 'like', '%' . $keyword . '%');
        }

        return $query;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id');
    }


    // SELF JOIN
//     public function parent()
//     {
//         return $this->hasMany(self::class, 'id', 'parent_id');
//     }

//     public function children()
//     {
//         return $this->belongsTo(self::class, 'id', 'parent_id');
//     }

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }
}

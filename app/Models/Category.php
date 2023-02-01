<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';

    protected $fillable = ['name', 'status'];

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

//    public function subCats()
//    {
//        return $this->belongsToMany(SubCategory::class,'category_subcategory');
//    }


    // SELF JOIN
    // public function parent()
    // {
    //     return $this->hasMany(self::class, 'id', 'parent_id');
    // }

    // public function children()
    // {
    //     return $this->belongsTo(self::class, 'id', 'parent_id');
    // }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id'
    ];

    public function cats()
    {
        return $this->belongsToMany(Category::class,'category_subcategory');
    }
}

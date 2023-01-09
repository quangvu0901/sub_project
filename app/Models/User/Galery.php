<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    public $table = 'galeries';

    protected $fillable = ['id', 'thumbnail'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}

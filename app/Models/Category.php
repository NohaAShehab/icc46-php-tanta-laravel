<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
        'is_active'
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

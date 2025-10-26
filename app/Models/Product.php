<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'image',
        'stock_quantity',
        'is_active',
        'category_id'
    ];

    protected $dates = ['deleted_at'];

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_slug',
        'product_description',
        'product_category_id',
        'product_image',
        'product_price',
        'product_discount_price',
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function scopeProduct($query, array $filters) 
    {
        $query->when($filters['cari'] ?? false, function ($query, $cari) {
            $query->where('product_name', 'like', "%{$cari}%")->orWhere('product_slug', 'like', "%{$cari}%")->orWhere('product_description', 'like', "%{$cari}%");
        });
    }
}

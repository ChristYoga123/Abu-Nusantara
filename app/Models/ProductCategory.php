<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_category_name',
        'product_category_description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeProductCategory($query, array $filters) 
    {
        $query->when($filters['cari'] ?? false, function ($query, $cari) {
            $query->where('product_category_name', 'like', "%{$cari}%")->orWhere('product_category_description', 'like', "%{$cari}%");
        });
    }
}

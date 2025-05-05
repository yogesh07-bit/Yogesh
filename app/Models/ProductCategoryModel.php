<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryModel extends Model
{
    protected $table = 'product_category'; // Replace with the actual table name
    protected $fillable = ['category_name', 'parent_category_id']; // Add other fillable attributes as needed

    // Define the inverse relationship with Product
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id'); // Replace 'product_category' if different
    }

    // Relationship for Parent Category
    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_category_id');
    }

    // Relationship for Child Categories
    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_category_id');
    }

    
}

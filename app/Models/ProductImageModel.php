<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class ProductImageModel extends Model
{
    protected $table = 'product_images'; // Replace with your table name if different
    protected $fillable = ['item_id', 'highlighted','file_url']; // Replace with your table columns

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'item_id'); // Replace 'item_id' with the actual foreign key
    }

    public function getFileUrlArrayAttribute()
    {
        return $this->file_url ? explode(',', $this->file_url) : [];
    }

    // Get the highlighted image directly (no modification needed)
    public function getHighlightedImageAttribute()
    {
        return $this->highlighted;
    }


}

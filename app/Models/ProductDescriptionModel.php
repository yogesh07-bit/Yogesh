<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;

class ProductDescriptionModel extends Model
{
    protected $table = 'product_description'; // Replace with your table name if different
    protected $fillable = ['id','item_id', 'title','description','display_title','status']; // Replace with your table columns

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'item_id'); // Replace 'item_id' with the actual foreign key
    }

    public function descriptions()
    {
        return $this->hasMany(ProductDescriptionModel::class, 'item_id');
    }

  
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionProduct extends Model
{
    use HasFactory;

    protected $table = 'section_products'; // Replace with your actual table name
    public $timestamps = false; // Set to true if you have created_at and updated_at columns
    protected $fillable = [
        'section_id',
        'product_id',
    ];

    public function section(){
        return $this->belongsTo(SectionModel::class);
    }
    public function products()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }
}

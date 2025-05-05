<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands'; // Define the table name if needed
    protected $primaryKey = 'id'; // Primary Key
    public $timestamps = false; // Disable timestamps if not present in DB

    // Fillable fields
    protected $fillable = ['brand_name', 'logo', 'address', 'owner', 'phone'];

    /**
     * Get brand data by ID
     */
    public static function getBrandById($id)
    {
        return self::find($id);
    }

    /**
     * Get all brand data
     */
    public static function getAllBrands()
    {
        return self::all();
    }
}

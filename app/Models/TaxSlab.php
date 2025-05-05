<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxSlab extends Model
{
    use HasFactory;

    protected $table = 'tax_slabs'; // Table name
    protected $primaryKey = 'id';   // Primary Key
    public $timestamps = true;      // Enable timestamps

    protected $fillable = [
        'name',
        'cgst',
        'sgst',
        'igst'
    ];

    /**
     * Get all tax slabs
     */
    public static function getAllTaxSlabs()
    {
        return self::all();
    }

    /**
     * Get tax slab by ID
     */
    public static function getTaxSlabById($id)
    {
        return self::find($id);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HsnCode extends Model
{
    use HasFactory;

    protected $table = 'hsn_code'; // Explicitly mention the table name if not plural

    protected $fillable = [
        'code',
        'item_description',
        'tax_id',
    ];
}

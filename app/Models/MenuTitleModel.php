<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuTitleModel extends Model
{
    use HasFactory;

    // Define the table name (if it's not plural)
    protected $table = 'menu_title';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'category_name',
        'status',
        'display_title',
        'description',
    ];

    // Cast attributes for better handling
    protected $casts = [
        'status' => 'boolean',
        'display_title' => 'boolean',
    ];
}

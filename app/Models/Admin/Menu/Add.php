<?php

namespace App\Models\Admin\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
    use HasFactory;

    protected $table = 'menu_title'; // Table name
    protected $fillable = ['category_name', 'status', 'display_title', 'description']; // Allow mass assignment

}

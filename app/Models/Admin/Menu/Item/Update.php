<?php

namespace App\Models\Admin\Menu\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;
   protected $table = 'menu_title'; // Table name
    protected $fillable = ['category_name', 'description']; // Allow mass assignment

}

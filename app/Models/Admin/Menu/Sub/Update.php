<?php

namespace App\Models\Admin\Menu\Sub;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;
    protected $table = 'menu_items'; // Table name
   protected $fillable = [ 'menu_items', 'menu_type', 'css_class', 'css_id', 'menu_link']; // Allow mass assignment


}

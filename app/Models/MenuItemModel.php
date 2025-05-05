<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItemModel extends Model
{
    use HasFactory;

    // Define the table name (if it's not the default plural form)
    protected $table = 'menu_items';

    // Specify the fillable fields to allow mass assignment
    protected $fillable = [
        'category_id',
        'menu_items',
        'menu_type',
        'submenu_ids',
        'css_class',
        'css_id',
        'menu_link',
        'menu_icon',
    ];

    // Cast attributes for better handling
    protected $casts = [
        'submenu_ids' => 'array', // If storing JSON-encoded submenus
    ];

    // Define the relationship with the category (MenuTitle)
    public function category()
    {
        return $this->belongsTo(MenuTitle::class, 'category_id');
    }
}

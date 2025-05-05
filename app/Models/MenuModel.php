<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    // Define the table if different from the default 'about_models'
    protected $table = 'menu_items';
    protected $primaryKey = 'id';


    // public static function getMenuOfCategory($category_id)
    // {
    //     return self::$table->where('category_id', $category_id)    
    //      ->get();  // Adjust to fetch the necessary data
    // }

}


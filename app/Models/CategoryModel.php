<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    // Define the table if different from the default 'about_models'
    protected $table = 'product_category';


    public static function getCategoryData()
    {
        return self::all();  // Adjust to fetch the necessary data
    }

    public static function getCategoryById($id)
    {
        return self::find($id); // Retrieves a single record by ID
    }

}

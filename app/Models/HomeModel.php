<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeModel extends Model
{
    // Define the table if different from the default 'about_models'
    protected $table = 'company_details';

    // A method to fetch the data for the 'about' page
    public static function getAboutPageData()
    {
        // Fetch data from the 'about_page_data' table or any other related tables
        return self::all();  // Adjust to fetch the necessary data
    }
    public static function getCompanyData()
    {
        // Fetch data from the 'about_page_data' table or any other related tables
        $table  = 'company_details';
        return self::all();  // Adjust to fetch the necessary data

        return DB::table('table_name')->where('condtion')->get();
    } 

}

<?php 

namespace App\Http\Controllers;

use App\Models\AboutModel; // Import the corresponding model

class AboutController extends Controller 
{
    public function handleTemplate($modelName, $template)
    {
       // Pass the data to the Blade view
        $data = ['empty data'];
        return view('template.' . $template, ['data' => $data]);
    }
}

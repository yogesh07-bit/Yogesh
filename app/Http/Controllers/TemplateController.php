<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PageModel;


use Illuminate\Support\Facades\Schema;

class TemplateController extends Controller
{

        public function home($template='home'){


            // Fetch template info
            $templateInfo = DB::table('templates')->where('template_name', $template)->first();
            if (!$templateInfo) {
                abort(404, 'Template not found');
            }
    
            // Fetch partials grouped by section
            $partials = DB::table('partials')
            ->where('template_name', $template)
            ->orderBy('partial_order') // Order partials by their specified order
            ->get()
            ->groupBy('section'); // Group partials by their section
    
            // Call the corresponding controller dynamically
            $controllerName = $templateInfo->controller_name;
            $modelName = $templateInfo->model_name;
            $controller = app()->make("App\Http\Controllers\\$controllerName");
            $viewData = $controller->handleTemplate($modelName, $template);
    
            // Ensure $viewData is an array
            $viewData = is_array($viewData) ? $viewData : ($viewData instanceof \Illuminate\View\View ? $viewData->getData() : []);
    
            // Add grouped partials to the view data
            $viewData['partials'] = $partials;
    //print_r( $controller); exit;
            // Render the view
            return view('template.' . $template, $viewData);

        }

   
        public function show($template,$slug,$id)
        {           


            // Fetch template info
            $templateInfo = DB::table('templates')->where('template_name', $template)->get()[0];
            if (!$templateInfo) {
                abort(404, 'Template not found');
            }

                
            // Fetch partials grouped by section
            $partials = DB::table('partials')
            ->where('template_name', $template)
            ->where('status', 1)
            ->orderBy('partial_order') // Order partials by their specified order
            ->get()
            ->groupBy('section'); // Group partials by their section
    

     
            // Call the corresponding controller dynamically
            $controllerName = $templateInfo->controller_name;
            $modelName = $templateInfo->model_name;
            $controller = app()->make("App\Http\Controllers\\$controllerName");
            $viewData = $controller->handleTemplate($modelName, $template, $id);
            // Ensure $viewData is an array
            $viewData = is_array($viewData) ? $viewData : ($viewData instanceof \Illuminate\View\View ? $viewData->getData() : []);
    
            // Add grouped partials to the view data
            $viewData['partials'] = $partials;          

    
            // Render the view
            return view('template.' . $template, $viewData);
        }

public function pages($slug, $id = '')
{
    // Step 1: Template info fetch karo
    $templateInfo = DB::table('templates')->where('template_name', $slug)->first();
    if (!$templateInfo) {
        abort(404, 'Template not found');
    }

    // Step 2: Page record fetch karo
    $page = \App\Models\PageModel::where('page_slug', $slug)->first();
    if (!$page) {
        abort(404, 'Page not found');
    }

    // Step 3: Partial section load karo (if table has `status` column)
    $partials = [];
    if (Schema::hasColumn('partials', 'status')) {
        $partials = DB::table('partials')
            ->where('template_name', 'pages')
            ->where('status', 1)
            ->orderBy('partial_order')
            ->get()
            ->groupBy('section');
    }

    // Step 4: Controller name and model name dynamically set karo
    $controllerName = $templateInfo->controller_name;
    $modelName = $templateInfo->model_name;

    try {
        // Dynamic controller load karte hain
        $controller = app()->make("App\Http\Controllers\\$controllerName");

        // Controller ka method ko call karte hain
        $viewData = $controller->handleTemplate($modelName, $slug, $id);
    } catch (\Exception $e) {
        // Agar controller load nahi ho paaya, toh error
        abort(500, 'Controller handling failed: ' . $e->getMessage());
    }

    // Step 5: Prepare data for the view
    $viewData = is_array($viewData) ? $viewData : ($viewData instanceof \Illuminate\View\View ? $viewData->getData() : []);
    $viewData['partials'] = $partials;
    $viewData['page_name'] = $slug;  // Pass the slug name to the view

    // Step 6: Render the final page view
    return view('template.pages', $viewData);
}






    }    


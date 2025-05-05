<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class GetAllRoutes extends Controller
{

    public function All()
    {

        $routes = collect(Route::getRoutes())->filter(function ($route) {
            return in_array('web', $route->middleware()); // Only web routes
        })->map(function ($route) {
            return $route->uri();
        })->unique()->values();
        return response()->json(["response" => $routes]);
    }
}

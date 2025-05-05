<?php
namespace App\Http\Controllers;


use App\Models\ProductCategoryModel;
use Illuminate\Http\Request;


class ProductCategoryController extends Controller
{

	public function getSubcategories(Request $request)
	{
	    $subcategories = ProductCategoryModel::where('parent_category_id', $request->category_id)->get();
	    return response()->json($subcategories);
	}

}
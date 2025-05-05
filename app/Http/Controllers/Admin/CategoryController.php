<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomeModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $company_data = HomeModel::getCompanyData();

        // This makes it available to all views loaded from this controller
        view()->share('company_data', $company_data);
    }
    public function index()
    {
        $categories = Category::with('parent')->paginate(10);
        return view('admin.categories.index', [
            'title' => 'Categories',
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        try {
            // Validate input
            $validatedData = $request->validate([
                'category_name' => 'required',
                'parent_category_id' => 'nullable|exists:product_category,id'
            ]);

            // Create category
            $category = Category::create($validatedData);

            // Return success response
            return response()->json([
                'status' => 'success',
                'message' => 'Category added successfully',
                'category' => $category
            ]);
        } catch (\Exception $e) {
            // Any other error
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'category_name' => 'required|max:40',
                'parent_category_id' => 'nullable|exists:product_category,id',
            ]);

            $category = Category::findOrFail($id);
            $category->update($request->only('category_name', 'parent_category_id'));

            return response()->json([
                'status' => 'success',
                'message' => 'Category updated successfully',
                'category' => $category
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Category deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

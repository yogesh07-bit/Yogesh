<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomeModel;
use App\Models\ProductModel;
use App\Models\SectionModel;
use App\Models\SectionProduct;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function __construct()
    {
        $company_data = HomeModel::getCompanyData();

        // This makes it available to all views loaded from this controller
        view()->share('company_data', $company_data);
    }
    public function index()
    {
        $sections = SectionModel::paginate(10);
        return view("admin.sectionManage.index", [
            "sections" => $sections,
            "title" => "Section Management",
        ]);
    }

    public function getAllProducts($sectionId)
    {
        $sectionProducts = SectionProduct::with('products', 'section')
            ->where('section_id', $sectionId)
            ->get();

        if ($sectionProducts->isEmpty()) {
            $section = SectionModel::find($sectionId);
        } else {

            $section = $sectionProducts->first()->section;
        }
        $categories = Category::whereNull('parent_category_id')->get();
        return view('admin.sectionManage.viewAllSectionProduct', [
            'sectionProducts' => $sectionProducts,
            'section' => $section,
            'categories' => $categories,
            'title' => 'Section Products',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_title' => 'required|string|max:255',
            'product_template' => 'required|string|max:255',
            'section_template' => 'required|string|max:255',
            'page_type' => 'required|string|max:255',
            'display_section' => 'required|string|max:255',
        ]);

        try {
            $validated['display_title'] = 1;
            SectionModel::create($validated);

            return redirect()->back()->with('success', 'Section created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'section_title' => 'required|string|max:255',
            'product_template' => 'required|string|max:255',
            'section_template' => 'required|string|max:255',
            'page_type' => 'required|string|max:255',
            'display_section' => 'required|string|max:255',
        ]);

        $section = SectionModel::findOrFail($id);

        $section->section_title = $request->section_title;
        $section->product_template = $request->product_template;
        $section->section_template = $request->section_template;
        $section->page_type = $request->page_type;
        $section->display_section = $request->display_section;

        $section->save();

        return response()->json(['success' => true, 'message' => 'Section updated successfully!']);
    }
    public function toggleStatus(Request $request)
    {
        $section = SectionModel::find($request->section_id);

        if (!$section) {
            return response()->json(['status' => 'error', 'message' => 'Section not found']);
        }

        $section->display_title = $section->display_title == 1 ? 0 : 1;
        $section->save();

        return response()->json([
            'status' => 'success',
            'display_title' => $section->display_title
        ]);
    }

    public function changeStatus(Request $request)
    {
        $section = SectionModel::find($request->section_id);

        if (!$section) {
            return response()->json(['status' => 'error', 'message' => 'Section not found']);
        }

        $section->status = $section->status == 1 ? 0 : 1;
        $section->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Section status updated successfully',
            'display_title' => $section->status
        ]);
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = Category::where('parent_category_id', $categoryId)->get();
        return response()->json($subcategories);
    }

    public function searchProducts(Request $request)
    {
        $query = ProductModel::with('images');;

        if ($request->category_ids) {
            $categoryIds = is_array($request->category_ids)
                ? $request->category_ids
                : explode(',', $request->category_ids);
            $query->whereIn('product_category', $categoryIds);
        }

        if ($request->search) {
            $query->where('product_title', 'like', '%' . $request->search . '%');
        }

        return response()->json($query->get());
    }

    public function storeSectionProduct(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:section_products,id',
            'product_id' => 'required|exists:section_products,id',
        ]);

        // Prevent duplicates
        $exists = SectionProduct::where('section_id', $request->section_id)
            ->where('product_id', $request->product_id)
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Product already added.'], 409);
        }

        SectionProduct::create([
            'section_id' => $request->section_id,
            'product_id' => $request->product_id,
        ]);

        return response()->json(['message' => 'Product added successfully.']);
    }

    public function deleteSectionProduct($id)
    {
        try {
            $sectionProduct = SectionProduct::findOrFail($id);
            $sectionProduct->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Section Product removed successfully'
            ]);
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
            $section = SectionModel::findOrFail($id);
            $section->delete();

            $sectionProducts = SectionProduct::where('section_id', $id)->get();
            foreach ($sectionProducts as $sectionProduct) {
                $sectionProduct->delete();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Section Deleted Successfully'
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

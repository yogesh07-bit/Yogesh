<?php
namespace App\Http\Controllers;

use App\Models\SectionModel;
use App\Models\ProductModel;

class SectionController extends Controller
{
    public function getAllSectionsData()
    {
        $sections = SectionModel::all();  // Retrieve all sections
    
        $sectionData = [];
    
        foreach ($sections as $section) {
            $productIds = explode(',', $section->products ?? '');
            $categoryIds = explode(',', $section->category ?? '');
            $highlightProductIds = explode(',', $section->highlight_products ?? '');
    
            // Build product query
            $productsQuery = ProductModel::query();
            if (!empty($productIds)) {
                $productsQuery->whereIn('id', $productIds);
            }
            if (!empty($categoryIds)) {
                $productsQuery->orWhereIn('product_category', $categoryIds);
            }
            $products = $productsQuery->with('category')->get();
    
            // Fetch highlighted products
            $highlightProducts = [];
            if (!empty($highlightProductIds)) {
                $highlightProducts = ProductModel::whereIn('id', $highlightProductIds)->with('category')->get();
            }
    
            // Add section with its products to the section data array
            $sectionData[] = [
                'section' => $section,
                'products' => $products,
                'highlight_products' => $highlightProducts,
            ];
        }
    
        return $sectionData;
    }

    public function getSectionData($sectionName){

        $sectionData = SectionModel::with([
            'products' => function ($query) {
                $query->with(['images','category']);
            }
        ])->where('display_section', $sectionName)->get();

       // dd($sectionData); 

        return $sectionData;

    }
    
}

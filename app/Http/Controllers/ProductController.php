<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\SectionModel;
use App\Models\HomeModel;
use App\Models\CategoryModel;
use App\Models\MenuModel;
use App\Models\BannerModel;
use App\Models\DealModel;
use App\Models\ProductImageModel;
use App\Models\ProductDescriptionModel;
use App\Models\OfferModel;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class ProductController extends Controller
{
    // Show single product page with both slug & ID


    public function handleTemplate($modelName, $template, $id='')
    {

        // Extract data from the corresponding models
        $company_data = HomeModel::getCompanyData();
        $sc_cat = CategoryModel::getCategoryData();
        $prime_menu = MenuModel::where('category_id', 1)->get();
        $horizontal_category_menu = MenuModel::where('category_id', 12)->get();
        $main_slider = BannerModel::where('banner_name', "Hero Slider")->get();
        $offer_slider = BannerModel::where('banner_name', "sale sale")->get();
        $deals = DealModel::getSelectedDeals('short_deal');
        $left_banner = OfferModel::getHighlight('left_highlight');



        $sectionController = new SectionController();
          
        $center_section = $sectionController->getSectionData('section2');

        
        
        $sectionData = $sectionController->getSectionData('section1');

        $item_details = ProductModel::getProductWithDetails($id);        

        
        $item_details['category_slug'] = Str::slug($item_details['category']->category_name);

        
        // Prepare data for view
        $data = [
            'page_class' => $template,
            'page_id' => $template,
            'company_data' => $company_data,
            'sc_cat' => $sc_cat,
            'prime_menu' => $prime_menu,
            'horizontal_category_menu' => $horizontal_category_menu,
            'main_slider' => $main_slider,
            'offer_slider' => $offer_slider,
            'sections' => $sectionData,
            'center_section' => $center_section,
            'deals' => $deals,   
            'item_id' => $id,   
            'item_details' => $item_details,   
            'left_banner' => (object) $left_banner[0]
        ];

             
        // Validate template before rendering
        if (view()->exists('template.' . $template)) {
            return view('template.' . $template, ['data' => $data]);
        } else {
            abort(404, "Template not found: " . $template);
        }


    }
}

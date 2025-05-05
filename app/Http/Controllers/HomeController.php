<?php 
namespace App\Http\Controllers;

use App\Models\HomeModel;
use App\Models\CategoryModel;
use App\Models\MenuModel;
use App\Models\BannerModel;
use App\Models\DealModel;
use App\Models\ProductImageModel;
use App\Models\ProductModel;
use App\Models\OfferModel;
use App\Models\SectionModel;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class HomeController extends Controller
{
 
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function handleTemplate($modelName, $template)
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

        //print_r($sectionData);

        // Prepare data for view
        $data = [
            'company_data' => $company_data,
            'sc_cat' => $sc_cat,
            'prime_menu' => $prime_menu,
            'horizontal_category_menu' => $horizontal_category_menu,
            'main_slider' => $main_slider,
            'offer_slider' => $offer_slider,
            'sections' => $sectionData,
            'center_section' => $center_section,
            'deals' => $deals,   
            'left_banner' => (object) $left_banner[0]
        ];


            //print_r($data['products']); exit;
            // Return the view with variables passed directly
      
        // Validate template before rendering
        if (view()->exists('template.' . $template)) {
            return view('template.' . $template, ['data' => $data]);
        } else {
            abort(404, "Template not found: " . $template);
        }


    }
}

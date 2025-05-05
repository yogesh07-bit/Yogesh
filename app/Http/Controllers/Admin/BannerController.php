<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use Illuminate\Http\Request;
use App\Models\HomeModel;
use Illuminate\Support\Facades\DB;
use App\Helpers\ImageHelper;
use Illuminate\Support\Arr;


class BannerController extends Controller
{

    public function __construct()
    {
        $company_data = HomeModel::getCompanyData();

        // This makes it available to all views loaded from this controller
        view()->share('company_data', $company_data);
    }


    // Load banner list by banner_location
    public function index(Request $request)
    {
       // $banners = BannerModel::select('banner_location')->distinct()->get();   
        
        // Subquery: Get the max ID for each banner_location
        $sub = BannerModel::select(DB::raw('MAX(id) as id'))
            ->groupBy('banner_location');

        // Final query: Fetch full banner records for those IDs
        $banners = BannerModel::whereIn('id', $sub)->get();
       
        return view('admin.all_banners', compact('banners'));
    }

    

    // Load banner images for a specific banner location
    public function show($banner_location)
    {
        $banners = BannerModel::where('banner_location', $banner_location)->get();
        return view('admin.show_banner', compact('banners', 'banner_location'));
    }

    // Show the form for editing or adding a banner
    public function edit_slide($id = null)
    {
        $banner_locations = BannerModel::select('banner_location')
            ->distinct()
            ->pluck('banner_location');  

        $banner = $id ? BannerModel::findOrFail($id) : new BannerModel();
        return view('admin.edit_banner', compact('banner','banner_locations'));
    }

    // Save or update a banner
  public function store(Request $request)
{

   //  dd($request->all());
     
    $request->validate([
        'banner_location'   => 'required|string|max:255',
        'banner_text_html'  => 'nullable|string',
        'banner_button'     => 'nullable|string|max:255',
        'banner_image'      => 'nullable', // now handled manually
        'banner_name'       => 'nullable|string|max:255',
        'banner_template'   => 'nullable|string|max:255',
        'banner_order'      => 'nullable|integer',
        'banner_link'       => 'nullable|string',
        'banner_class'      => 'nullable|string|max:255',
        'banner_id'         => 'nullable|string|max:255',
    ]);

    $banner = $request->id ? BannerModel::findOrFail($request->id) : new BannerModel();

   
    // Handle the cropped image upload if present
    if ($request->banner_image_cropped) {
        $imagePath = ImageHelper::uploadBase64Image(
            $request->banner_image_cropped,
            'assets/banner_image/home_slider',
            'banner_' . time(),
            false // relative path
        );

        // Set the banner_image value from the cropped image
        $banner->banner_image = 'public/'.$imagePath;

    }
    

    // Fill other fields except the image fields we handled manually
    $banner->fill($request->except(['id', 'banner_image', 'banner_image_cropped']));
    $banner->save();

    // return redirect()->route('banner.edit_slide',$request->id)->with('success', 'Banner saved successfully.');
    return redirect()->route('banner.show',$request->banner_location)->with('success', 'Banner saved successfully.');
}


    // Delete a banner
    public function delete_slide($id)
    {
        $banner = BannerModel::findOrFail($id);
        $banner->delete();

        return redirect()->back()->with('success', 'Banner deleted successfully.');
    }
}

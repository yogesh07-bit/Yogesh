<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\HomeModel; 

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use App\Helpers\ImageHelper;

class BrandController extends Controller
{

      public function __construct()
    {
        $company_data = HomeModel::getCompanyData();

        // This makes it available to all views loaded from this controller
        view()->share('company_data', $company_data);
    }

    public function View()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');  // brand creation view
    }
public function store(Request $request)
{
    $request->validate([
        'brand_name' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'address' => 'nullable|string|max:255',
        'owner' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:15',
    ]);

    $brand = $request->id ? Brand::findOrFail($request->id) : new Brand();

    if ($request->hasFile('logo')) {
        // Delete old file
        if ($brand->logo && file_exists(public_path($brand->logo))) {
            unlink(public_path($brand->logo));
        }

        $imagePath = ImageHelper::uploadImage(
            $request->file('logo'),
            'assets/brands',
            'brand_' . time()
        );

        $brand->logo = $imagePath;
    }
    // Agar naya logo nahi mila, aur update ho raha hai, to purana logo preserve karo
    elseif ($request->id) {
        $existingBrand = Brand::findOrFail($request->id);
        $brand->logo = $existingBrand->logo;
    }

    $brand->brand_name = $request->brand_name;
    $brand->address = $request->address;
    $brand->owner = $request->owner;
    $brand->phone = $request->phone;

    $brand->save();

    return redirect()->route('admin.brands.index')->with('success', 'Brand saved successfully!');
}




    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
{
    // Validate the incoming data
    $request->validate([
        'brand_name' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'address' => 'nullable|string|max:255',
        'owner' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:15',
    ]);

    // Find the brand record for updating
    $brand = Brand::findOrFail($id);

    // Check if logo is uploaded, if yes, delete the old one and save the new logo
    if ($request->hasFile('logo')) {
        // Delete the old logo file if it exists
        if ($brand->logo && file_exists(public_path($brand->logo))) {
            unlink(public_path($brand->logo));
        }

        // Upload the new logo
        $imagePath = ImageHelper::uploadImage(
            $request->file('logo'),
            'assets/brands',
            'brand_' . time()
        );

        // Set the new logo path in the database
        $brand->logo = $imagePath;
    }
    // If logo is not uploaded, keep the existing logo
    elseif ($brand->logo) {
        $existingBrand = Brand::findOrFail($id);
        $brand->logo = $existingBrand->logo;
    }

    // Update the other fields
    $brand->brand_name = $request->brand_name;
    $brand->address = $request->address;
    $brand->owner = $request->owner;
    $brand->phone = $request->phone;

    // Save the updated record
    $brand->save();

    // Redirect back with success message
    return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully!');
}


    

    public function destroy($id)
    {
        $banner = Brand::findOrFail($id);
        $banner->delete();

        return redirect()->back()->with('success', 'Banner deleted successfully.');
    }


}

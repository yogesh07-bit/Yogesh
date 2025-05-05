<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\TaxSlab;
use App\Models\Brand;
use App\Models\ProductDescriptionModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Auth;
use App\Models\HomeModel;
use App\Models\Discount;
use App\Models\HsnCode;
use App\Helpers\ImageUploadHelper;




class ProductEntryController extends Controller
{

    public function __construct()
    {
        $company_data = HomeModel::getCompanyData();

        // This makes it available to all views loaded from this controller
        view()->share('company_data', $company_data);
    }


    public function store(Request $request)
    {

     
        //dd($request->all());     
 
        // Product validation
  /*      $request->validate([
            'product_title' => 'required|string|max:200',
            'slug' => 'nullable|string|max:300',
            'mrp' => 'required|numeric|min:0',
            'barcode' => 'nullable|string|max:100',
            'tax_included' => 'nullable|boolean',
            'tax_slab_id' => 'nullable|exists:tax_slabs,id',
            'discount_id' => 'nullable|exists:discounts,id',
            'discount_type' => 'nullable|in:percentage,flat',
            'offer_style' => 'nullable|string|max:100',
            'brand_id' => 'required|numeric|exists:brands,id',
            'category' => 'required|numeric|exists:product_category,id',
            'hsn_id' => 'nullable|exists:hsn_code,id',
            'descriptions' => 'nullable|array|max:3',
            'images' => 'nullable|array',
            'highlighted' => 'nullable|boolean',
        ]);

      

        // Store product data
        $product = ProductModel::create($request->except(['descriptions', 'images', 'highlighted']));

      

         

        // Store product descriptions
        if ($request->has('descriptions')) {
            foreach ($request->descriptions as $desc) {
                ProductDescriptionModel::create([
                    'item_id' => $product->id,
                    'title' => $desc['title'],
                    'description' => $desc['description'],
                    'display_title' => 1,
                    'status' => 1,
                    'title_order' => 1,
                ]);
            }
        }
*/
        // Store product images



        if ($request->hasFile('images')) {
        $highlightedIndex = $request->input('highlighted_index');
        foreach ($request->file('images') as $index => $image) {
            $path = ImageUploadHelper::uploadImage($image, 'public/products');
            ProductImages::create([
                'item_id'    => $product->id,
                'file_title' => $request->input('titles')[$index] ?? 'Image ' . ($index + 1),
                'file_url'   => $path,
                'highlighted'=> ($highlightedIndex == $index) ? 1 : 0,
                ]);

            echo $path."<br>";

            }
        }


        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function add_product(){

        $taxslabs = TaxSlab::all();
        $brands = Brand::all();
        $discounts = Discount::active()->get();
        $hsncode = HsnCode::all();


         $category = ProductCategoryModel::whereNull('parent_category_id')->get();

        $admin = Auth::guard('admin')->user(); // Retrieve logged-in admin data 
    	return view('admin.product_entry', compact('admin', 'category', 'taxslabs', 'brands','discounts','hsncode'));

    }

    public function checkSlug(Request $request)
    {
        $slug = $request->query('slug');
        $exists = ProductModel::slugExists($slug);

        return response()->json(['exists' => $exists]);
    }

}

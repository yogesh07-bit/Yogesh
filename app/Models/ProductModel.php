<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SectionModel;

class ProductModel extends Model
{
    protected $table = 'product'; // Replace with your table name if different
    protected $fillable = [
    'product_title',
    'slug',
    'mrp',
    'barcode',
    'tax_included',
    'tax_slab_id',
    'discount_id',
    'offer_style',
    'brand_id',
    'category_id',
    'hsn_id',
    // Add any other column that you're trying to store
];


      // Many-to-Many Relationship with Section Model
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'section_products', 'product_id', 'section_id');
    }

    // Define the relationship with ProductCategoryModel
    public function category()
    {
        return $this->belongsTo(ProductCategoryModel::class, 'category_id'); // Adjust 'product_category' if it's the correct foreign key column
    }

    // Define the relationship with ProductDescriptionModel
    public function description()
    {
        return $this->hasMany(ProductDescriptionModel::class, 'item_id')
        ->where('status',1)->orderBy('title_order'); ; 
    }

    public function images()
    {
      
         return $this->hasOne(ProductImageModel::class, 'item_id');
    }


    public static function getProductBySection($section)
    {
        return self::join('product_category','product_category.id','=','product.category_id')
        ->join('product_images','product_images.item_id','=','product.id')
         ->join('section','section.id','=','product.id')
            ->whereIn('product.id', function ($query) use($section) {
                $query->select('section_product.products')
                    ->from('section_product')
                    ->whereIn('section_product.section_id', function ($subQuery) use($section) {
                        $subQuery->select('id')
                            ->from('section')
                            ->where('display_sections', $section);
                    });
            })
            ->get(['product.id','product_title', 'mrp', 'category_id', 'category_name', 'highlighted','section_title','section.id as section_id']
                );            
            //->get();            
        
    }

    public static function getProductWithDetails($id)
    {
        return self::with(['images', 'category','description']) // Add other relationships if needed
            ->where('id', $id)
            ->first();
    }

    public static function getProductById($id)
    {
        return self::where('id', $id)->first(); // Returns a single Product object or null
    }

    public static function getProductByCategoryId($id)
    {
        return self::with(['images', 'category','description'])
        ->where('category_id', $id)->get(); // Returns a single Product object or null
    }
 
    public static function slugExists($slug)
    {
        return self::where('slug', $slug)->exists();
    }

}



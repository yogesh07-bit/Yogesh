<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class DealModel extends Model
{
   

    // Define the table if different from the default 'about_models'
    protected $table = 'deals';
 
    public function getAllDeals() 
    {
        return self::all();  // Adjust to fetch the necessary data
    }

    public function productImage() 
    {
        return $this->hasOne(ProductImageModel::class, 'item_id', 'product_id');
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    public static function getSelectedDeals($type) 
    {
        return self::join('product_images','product_images.item_id','=','deals.product_id')
        ->join('product', 'product.id', '=', 'deals.product_id') // Join with products table
        ->where('deals.deal_type',$type)
        ->get(['deals.deal_title',
                'deals.product_id',
                'deals.deal_content',
                'deals.button',
                'deals.product_id',
                'deals.deal_url',
                'product.product_title',
                'product.slug',
                'product.mrp',
                'product_images.highlighted'


            ]);
       
    }

    public static function getWithImageDeals($type) 
    {
        return self::where('deals.deal_type',$type)
        ->with(['productImage' => function($query) {
                $query->select('product_images.item_id', 'product_images.highlighted'); }
            ])
       ->get();
       
    }

  

}

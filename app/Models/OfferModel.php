<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class OfferModel extends Model
{
   

    // Define the table if different from the default 'about_models'
    protected $table = 'offers';
 

    public static function getHighlight($type) 
    {
        return self::join('product_images','product_images.item_id','=','offers.single_product')
        ->join('product','product.id','=','offers.single_product')
        ->where('offers.offer_type',$type)
        ->get(['offers.*',
                'product_images.highlighted',
                'product.product_title',
                'product.mrp',
                ]);
       
    }

  

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SectionModel extends Model
{
    protected $table = 'section'; // Replace with your table name if different
    public $timestamps = false;
    protected $fillable = [
        'section_title','display_title','product_template','section_template','page_type','display_section','status'
    ];


    public static function getSectionType($type)
    {
        return self::join('product_images','product_images.item_id','=','product.id')
        ->join('product','product.id','=','secton.product_id')
        ->where('deals.deal_type',$type)
        ->get(['deals.deal_title',
                'deals.product_id',
                'deals.deal_content',
                'deals.button',
                'deals.product_id',
                'deals.deal_url',
                'product_images.highlighted']);

    }


    public function products()
    {
        return $this->belongsToMany(ProductModel::class, 'section_products', 'section_id', 'product_id');
    }

}

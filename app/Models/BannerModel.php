<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;

    protected $table = 'banner';
    
    protected $fillable = [
        'banner_location', 'banner_text_html', 'banner_button', 'banner_image', 
        'banner_name', 'banner_template', 'banner_order', 'banner_link', 
        'banner_class', 'banner_id'
    ];

}



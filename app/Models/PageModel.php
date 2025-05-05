<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{

    protected $table = 'pages';
    protected $primaryKey = 'id';


    protected $fillable = [
        'template_url', 'page_slug', 'html_content'
    ];
}

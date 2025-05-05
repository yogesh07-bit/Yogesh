<?php

namespace App\Models\Admin\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    protected $table = 'menu_items';
    protected $primaryKey = 'id';
}

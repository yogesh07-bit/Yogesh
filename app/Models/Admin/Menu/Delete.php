<?php

namespace App\Models\Admin\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delete extends Model
{
    use HasFactory;
    protected $table = 'menu_title';
    protected $primaryKey = 'id';
    public $timestamps = false; // Disable timestamps if they are not in the table

    public static function menu($id)
    {
        $menuItem = self::find($id);

        if (!$menuItem) {
            return null; // Return null if the menu item is not found
        }

        $menuItem->delete(); // Delete the record

        return true;
    }
}

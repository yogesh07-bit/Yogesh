<?php

namespace App\Models\Admin\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allow extends Model
{
    use HasFactory;
     protected $table = 'menu_title'; // Table name
    protected $primaryKey = 'id'; // Primary key

    public $timestamps = false; // Disable timestamps if they are not in the table

    protected $fillable = ['status']; // Allow mass assignment for status

    /**
     * Toggle the status of a menu item.
     */
    public static function toggleStatus($id)
    {
        $menuItem = self::find($id);

        if (!$menuItem) {
            return null; // Return null if the menu item is not found
        }

        // Toggle the status (if 1, set to 0; otherwise, set to 1)
        $menuItem->status = $menuItem->status == 1 ? 0 : 1;
        $menuItem->save(); // Save the changes

        return $menuItem;
    }
    public static function toggleDisplayTitle($id)
    {
        $menuItem = self::find($id);

        if (!$menuItem) {
            return null; // Return null if the menu item is not found
        }

        // Toggle the status (if 1, set to 0; otherwise, set to 1)
        $menuItem->display_title = $menuItem->display_title == 1 ? 0 : 1;
        $menuItem->save(); // Save the changes

        return $menuItem;
    }
}

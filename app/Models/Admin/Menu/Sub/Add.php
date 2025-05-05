<?php

namespace App\Models\Admin\Menu\Sub;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
    use HasFactory;

    protected $table = 'sub_menu_items'; // Table name
    protected $fillable = ["item_name","menu_id","menu_link","css_class","css_id","order"]; // Allow mass assignment

    public static function reorder($from, $to, $id)
    {
        if ($from == $to)
            return true;

        // Get the item being moved
        $movingItem = self::where('menu_id', $id)
            ->where('order', $from)
            ->first();

        if (!$movingItem)
            return false;

        if ($from < $to) {
            // Move down: shift up others in between
            self::where('menu_id', $id)
                ->whereBetween('order', [$from + 1, $to])
                ->decrement('order');
        } else {
            // Move up: shift down others in between
            self::where('menu_id', $id)
                ->whereBetween('order', [$to, $from - 1])
                ->increment('order');
        }

        // Set the new position for the moved item
        $movingItem->order = $to;
        $movingItem->save();

        return true;
    }

}

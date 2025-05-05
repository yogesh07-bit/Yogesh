<?php

namespace App\Models\Admin\Menu\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
    use HasFactory;

    protected $table = 'menu_items'; // Table name
    protected $fillable = ['category_id', 'menu_items', 'menu_type', 'css_class', 'css_id', 'menu_link', 'order']; // Allow mass assignment

    // public static function reorder($from, $to, $category_id,$id)
    // {
    //     if ($from == $to)
    //         return true;

    //     // Get the item being moved
    //     $movingItem = self::where('category_id', $category_id)
    //         ->where('order', $from)
    //         ->where('id', $id)
    //         ->first();

    //     if (!$movingItem)
    //         return false;

    //     if ($from < $to) {
    //         // Move down: shift up others in between
    //         self::where('category_id', $category_id)
    //             ->where('id', $id)
    //             ->whereBetween('order', [$from + 1, $to])
    //             ->decrement('order');
    //     } else {
    //         // Move up: shift down others in between
    //         self::where('category_id', $category_id)
    //             ->where('id', $id)
    //             ->whereBetween('order', [$to, $from - 1])
    //             ->increment('order');
    //     }

    //     // Set the new position for the moved item
    //     $movingItem->order = $to;
    //     $movingItem->save();

    //     return true;
    // }


    public static function reorderItem($category_id, $item_id, $new_position) {
    // 1. Get the item we're moving
    $item = self::where('category_id', $category_id)
                ->where('id', $item_id)
                ->first();

    if (!$item) return false; // Item not found

    $old_position = $item->order;

    // 2. If position isn't changing, do nothing
    if ($old_position == $new_position) return true;

    // 3. Update other items' positions
    if ($old_position < $new_position) {
        // Moving DOWN (e.g., pos 2 → 4)
        self::where('category_id', $category_id)
            ->where('id', '!=', $item_id)
            ->whereBetween('order', [$old_position + 1, $new_position])
            ->decrement('order'); // 3→2, 4→3
    } else {
        // Moving UP (e.g., pos 4 → 2)
        self::where('category_id', $category_id)
            ->where('id', '!=', $item_id)
            ->whereBetween('order', [$new_position, $old_position - 1])
            ->increment('order'); // 2→3, 3→4
    }

    // 4. Update the moved item
    $item->order = $new_position;
    $item->save();

    return true;
}

}



<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Menu\Item\Delete;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin\Menu\Item\Add as AddModel;
use App\Models\Admin\Menu\Sub\Update;
use Illuminate\Http\Request;

class MenuItem extends Controller
{
    public function Add(Request $request)
    {

        try {
            //code...
            $existingMenu = AddModel::where('menu_items', $request->input('name'))->where('category_id', $request->input('category_id'))->first();
            $order = AddModel::where('category_id', $request->input('category_id'))->count();

            if ($existingMenu) {
                return response()->json([
                    'error' => true,
                    'message' => 'this item name already exists'
                ]);
            }

            $insert = AddModel::create([
                "category_id" => $request->input('category_id'),
                "menu_items" => $request->input('name'),
                "menu_type" => $request->input('type'),
                "css_class" => $request->input('className'),
                "css_id" => $request->input('id'),
                "menu_link" => $request->input('link'),
                "order" => $order + 1,
            ]);
            if ($insert) {
                return response()->json(["status" => true]);
            }
            return response()->json(["status" => false]);
        } catch (\Throwable $th) {
            return response()->json(["error" => true, "message" => $th->getMessage()]);
        }
    }
    public function Order(Request $request)
    {

        try {

            $update = AddModel::reorderItem( $request->input('category_id'),$request->input('id'),$request->input('to'));
            if ($update) {
                return response()->json(["status" => true]);
            }
            return response()->json(["status" => false]);
        } catch (\Throwable $th) {
            return response()->json(["error" => true, "message" => $th->getMessage()]);
        }
    }

    public function DeleteMenu(Request $request)
    {

        try {
            //code...
            $status = Delete::menu($request->input("id"));

            if (!$status) {
                return response()->json(["status" => false, "message" => "Menu item not found"]);
            }

            return response()->json(["status" => true]);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th]);

        }
    }

    public function UpdateItem(Request $request)
    {

        try {
            $itemId = $request->input('id');
            $newName = trim($request->input('name')); // Trim whitespace
            $categoryId = $request->input('category_id');

            // 1. Find the item
            $item = Update::find($itemId);

            if (!$item) {
                return response()->json([
                    "error" => true,
                    "message" => "Item not found"
                ]);
            }

            // 2. Check for changes
            $isChanged = (
                $item->menu_items != $newName ||
                $item->menu_type != $request->input('type') ||
                $item->css_class != $request->input('className') ||
                $item->css_id != $request->input('cssId') ||
                $item->menu_link != $request->input('link')
            );

            if (!$isChanged) {
                return response()->json([
                    "error" => true,
                    "message" => "No changes detected"
                ]);
            }

            // 3. Check for duplicates (UNIQUE PER CATEGORY)
            $duplicateCount = AddModel::where('menu_items', $newName)
                ->where('category_id', $categoryId) // Only check within same category
                ->where('id', '!=', $itemId) // Exclude current item
                ->count();

            if ($duplicateCount > 0) {
                return response()->json([
                    "error" => true,
                    "message" => "Menu name already exists in this category"
                ]);
            }

            // 4. Update the item
            $item->update([
                'menu_items' => $newName,
                'menu_type' => $request->input('type'),
                'css_class' => $request->input('className'),
                'css_id' => $request->input('cssId'),
                'menu_link' => $request->input('link'),
            ]);

            return response()->json([
                "status" => true,
                "message" => "Updated successfully"
            ]);
        } catch (\Throwable $th) {
            return response()->json(["error" => true, "message" => $th->getMessage()]);

        }
    }
}

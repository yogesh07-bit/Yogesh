<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu\Sub\Add as AddModel;
use App\Models\Admin\Menu\Sub\Delete;
use App\Models\Admin\Menu\Sub\View;
use Illuminate\Http\Request;

class SubMenuItem extends Controller
{
    //


    public function Add(Request $request)
    {

        try {
            //code...
            $existingMenu = AddModel::where('item_name', $request->input('name'))->where('menu_id', $request->input('id'))->first();
            $order = AddModel::where('menu_id', $request->input('id'))->count();

            if ($existingMenu) {
                return response()->json([
                    'error' => true,
                    'message' => 'this item name already exists'
                ]);
            }


            $insert = AddModel::create([
                "item_name" => $request->input('name'),
                "menu_id" => $request->input('id'),
                "css_class" => $request->input('className'),
                "css_id" => $request->input('cssId'),
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
    public function All(Request $request)
    {

        try {

            $data = View::where('menu_id', $request->input('id'))->get(); // Get all records
            // Or return JSON response
            return response()->json(["response" => $data]);
        } catch (\Throwable $th) {
            return response()->json(["error" => true, "message" => $th->getMessage()]);
        }
    }

       public function DeleteItem(Request $request)
    {

        try {
            //code...
            $status = Delete::menu($request->input("id"));

            if (!$status) {
                return response()->json(["status" => false, "message" => "Sub Menu item not found"]);
            }

            return response()->json(["status" => true]);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th]);

        }
    }


}

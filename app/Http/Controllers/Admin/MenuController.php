<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Menu\Item\Update;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuTitleModel;
use App\Models\Admin\Menu\View;
use App\Models\Admin\Menu\Allow;
use App\Models\Admin\Menu\Delete;
use App\Models\Admin\Menu\Add as AddModel;
use App\Models\Admin\Menu\Title;
use App\Models\HomeModel;

class MenuController extends Controller
{

    public function __construct()
    {
        $company_data = HomeModel::getCompanyData();

        // This makes it available to all views loaded from this controller
        view()->share('company_data', $company_data);
    }



    // Fetch all menu titles
    public function index()
    {
        return view('admin.menu.index');

    }
    // Fetch all menu titles
    public function AllMenus()
    {
        $menuTitles = MenuTitleModel::all()->sortByDesc("id"); // Get all records
        // Or return JSON response
        return response()->json(["response" => $menuTitles]);
    }

    public function Add(Request $request)
    {

        try {
            //code...
            $existingMenu = AddModel::where('category_name', $request->input('name'))->first();

            if ($existingMenu) {
                return response()->json([
                    'error' => true,
                    'message' => 'Category name already exists'
                ]);
            }

            $insert = AddModel::create([
                'category_name' => $request->input("name"),
                'status' => 0,
                'display_title' => 0,
                'description' => $request->input("description")
            ]);
            if ($insert) {
                return response()->json(["status" => true]);
            }
            return response()->json(["status" => false]);
        } catch (\Throwable $th) {
            return response()->json(["status" => $th]);
        }
    }
    public function viewAll($id)
    {

        $company_data = HomeModel::getCompanyData();
        $data = View::join('menu_title', 'menu_items.category_id', '=', 'menu_title.id')
            ->where('menu_title.id', $id) // your where condition
            ->select('menu_items.*', 'menu_title.category_name')
            ->orderBy("order", "asc")
            ->get();
        $title = Title::where('id', $id)->first()->category_name;
        return view('admin.menu.view', compact('data', 'title', 'id', 'company_data')); // Pass to view

    }

    public function StatusToggle(Request $request)
    {

        try {
            //code...
            $status = Allow::toggleStatus($request->input("id"));

            if (!$status) {
                return response()->json(["status" => false, "message" => "Menu item not found"]);
            }

            return response()->json(["status" => true]);

        } catch (\Throwable $th) {
            return response()->json(["error" => true, "message" => $th->getMessage()]);

        }
    }
    public function DisplayTitleToggle(Request $request)
    {

        try {
            //code...
            $status = Allow::toggleDisplayTitle($request->input("id"));

            if (!$status) {
                return response()->json(["status" => false, "message" => "Menu item not found"]);
            }

            return response()->json(["status" => true]);

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
            return response()->json(["error" => true, "message" => $th->getMessage()]);

        }
    }
    public function UpdateTitle(Request $request)
    {

        try {

            $itemId = $request->input("id");
            $newCategoryName = $request->input("name");

            // Check if the name exists, excluding the current record
            $existingCount = AddModel::where('category_name', $newCategoryName)
                ->where('id', '!=', $itemId)  // Exclude current record
                ->count();

            if ($existingCount == 0) {
                $item = Update::find($itemId);
                if ($item) {
                    // Optional: Check if the name is actually being changed
                    if ($item->category_name != $newCategoryName) {
                        $item->category_name = $newCategoryName;
                        $item->description = $request->input("description");
                        $item->save();
                        return response()->json(["status" => true, "message" => "Updated successfully"]);
                    }
                    return response()->json(["error" => true, "message" => "No changes detected"]);
                }
                return response()->json(["error" => true, "message" => "Item not found"]);
            } else {
                return response()->json([
                    "error" => true,
                    "message" => "Category name already exists"
                ]);
            }


        } catch (\Throwable $th) {
            return response()->json(["error" => true, "message" => $th->getMessage()]);

        }
    }


}

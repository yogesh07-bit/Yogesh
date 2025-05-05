<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\HomeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function __construct()
    {
        $company_data = HomeModel::getCompanyData();

        // This makes it available to all views loaded from this controller
        view()->share('company_data', $company_data);
    }
    public function index()
    {
        $discounts = Discount::paginate(5);
        return view("admin.discount.index", [
            'discounts' => $discounts,
        ]);
    }

    public function create()
    {

        return view("admin.discount.create", [
            "title" => "Create Discount",

        ]);
    }
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:discounts,code',
            'description' => 'nullable|string|max:255',
            'type' => 'required|in:fixed,percentage',
            'value' => 'required|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        // Create the discount
        Discount::create($request->all());

        return redirect()->route('admin.discount')->with('success', 'Discount created successfully.');
    }

    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return view("admin.discount.edit", [
            'discount' => $discount,
            'title' => "Edit Discount",
        ]);
    }
    public function update(Request $request, $id)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        if ($start_date) {
            $request->merge(['start_date' => Carbon::createFromFormat('d/m/Y', $start_date)->format('Y-m-d')]);
        }

        if ($end_date) {
            $request->merge(['end_date' => Carbon::createFromFormat('d/m/Y', $end_date)->format('Y-m-d')]);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:discounts,code,' . $id,
            'description' => 'nullable|string|max:255',
            'type' => 'required|in:fixed,percentage',
            'value' => 'required|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        // Update the discount
        $discount = Discount::findOrFail($id);
        $discount->update($request->all());

        return redirect()->route('admin.discount')->with('success', 'Discount updated successfully.');
    }

    public function toggleStatus(Request $request)
    {
        $discount = Discount::findOrFail($request->id);
        $discount->status = $discount->status === '1' ? '0' : '1';
        $discount->save();

        return response()->json([
            'status' => $discount->status,
            'message' => 'Status updated successfully',
        ]);
    }

    public function destroy(Request $request, $id){
        $discount = Discount::findOrFail($id);
        $discount->delete();

        return response()->json([
            'status' => true,
            'message' => 'Discount deleted successfully.',
        ]);
       // return redirect()->route('admin.discount')->with('success', 'Discount deleted successfully.');
    }
}

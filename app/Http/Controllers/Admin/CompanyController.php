<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyModel;

class CompanyController extends Controller
{
    public function index()
    {
        $company_data = CompanyModel::all();
        return view('admin.company_data', compact('company_data'));
    }

    // Add create, edit, update methods here
    public function edit($id)
    {
        $company = CompanyModel::findOrFail($id);
        return response()->json($company);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:company_details,id',
            'info_type' => 'required|string|max:255',
            'data' => 'required|string',
        ]);

        $company = CompanyModel::findOrFail($request->id);
        $company->update([
            'info_type' => $request->info_type,
            'data' => $request->data,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Company info updated successfully'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeModel;
use App\Models\TaxSlab;
use Illuminate\Http\Request;

class TaxSlabController extends Controller
{
    public function __construct()
    {
        $company_data = HomeModel::getCompanyData();
        view()->share('company_data', $company_data);
    }
    public function index()
    {
       
        $taxSlabs = TaxSlab::getAllTaxSlabs();
        return view('admin.taxSlab.index', [
            'title'=> 'All Tax Slabs',
            'taxSlabs' => $taxSlabs,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cgst' => 'required|numeric',
            'sgst' => 'required|numeric',
            'igst' => 'required|numeric|unique:tax_slabs,igst',
        ]);

        $taxSlab = new TaxSlab();
        $taxSlab->name = $request->input('name');
        $taxSlab->cgst = $request->input('cgst');
        $taxSlab->sgst = $request->input('sgst');
        $taxSlab->igst = $request->input('igst');
        $taxSlab->save();

        return response()->json(['success' => true, 'message' => 'Tax Slab created successfully']);
    }
    public function update(Request $request, TaxSlab $taxSlab){
        $request->validate([
            'name' => 'required|string|max:255',
            'cgst' => 'required|numeric',
            'sgst' => 'required|numeric',
            'igst' => 'required|numericunique:tax_slabs,igst,' . $taxSlab->id,
        ]);
        $taxSlab->name = $request->input('name');
        $taxSlab->cgst = $request->input('cgst');
        $taxSlab->sgst = $request->input('sgst');
        $taxSlab->igst = $request->input('igst');
        $taxSlab->save();
        return response()->json(['success' => true, 'message' => 'Tax Slab updated successfully']);
    }

    public function destroy($id)
    {
        $tax = TaxSlab::findOrFail($id);
        $tax->delete();
    
        return response()->json(['message' => 'Tax slab deleted successfully']);
    }
}

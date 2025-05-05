<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HomeModel;

class AdminController extends Controller
{

    public function index(){

    $admin = Auth::guard('admin')->user(); // Retrieve logged-in admin data 
    $company_data = HomeModel::getCompanyData();
      return view('admin.dashboard',compact('admin','company_data')); // Create this Blade file
    }

    // Show the admin login form
    public function showLoginForm()
    {

     echo 'showLoginForm';  
     //   return view('admin.auth.login'); // Create this Blade file
    }

    // Handle Admin Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Handle Admin Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

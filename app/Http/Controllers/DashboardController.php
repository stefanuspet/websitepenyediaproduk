<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $countProduct = Product::count();
        $countUser = User::where('role', 'user')->count();
        $countProductActive = Product::where('status', '1')->count();
        $countUserActive = User::where('is_active', '1')->where('role', 'user')->count();
        $countCategory = ProductCategories::count();

        // show product newest 10
        $products = Product::orderBy('created_at', 'desc')->take(10)->get();

        if (Auth::user()->role !== 'admin') {
            return abort(403);
        } else {
            return view('admin.dashboard', compact('countProduct', 'countUser', 'countProductActive', 'countUserActive', 'countCategory', 'products'));
        }
    }
}

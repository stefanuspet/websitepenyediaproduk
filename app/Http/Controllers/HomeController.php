<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role !== 'user') {
            return abort(403);
        }
        $categories = ProductCategories::all();
        $products = Product::where('status', '1')->get();
        return view('home', compact('categories', 'products'));
    }

    public function detailProduk($id)
    {
        if (Auth::check() && Auth::user()->role !== 'user') {
            return abort(403);
        } else {
            $product = Product::find($id);
            $categories = ProductCategories::all();
            if ($product) {
                return view('user.detail-produk', compact('product', 'categories'));
            }
            return abort(404);
        }
    }
}

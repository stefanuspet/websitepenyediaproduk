<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
    }
    public function index()
    {
        $products = Product::all();
        return view('admin.Product.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategories::all();
        return view('admin.Product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'path_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'status' => 'required|string',
            'category_id' => 'required|integer',
        ]);

        $path = $request->file('path_img')->store('images', 'public');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'path_img' => $path,
            'description' => $request->description,
            'stock' => $request->stock,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = ProductCategories::all();
        if ($product) {
            return view('admin.Product.edit', compact('product', 'categories'));
        }
        return redirect()->route('product.index')->with('error', 'Produk tidak ditemukan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'path_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'status' => 'required|string',
            'category_id' => 'required|integer',
        ]);

        $product = Product::find($id);
        if ($product) {
            $path = $product->path_img;
            if ($request->hasFile('path_img')) {
                $path = $request->file('path_img')->store('images', 'public');
            }

            $product->name = $request->name;
            $product->price = $request->price;
            $product->path_img = $path;
            $product->description = $request->description;
            $product->stock = $request->stock;
            $product->status = $request->status;
            $product->category_id = $request->category_id;
            $product->save();
            return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui!');
        }
        return redirect()->route('product.index')->with('error', 'Produk tidak ditemukan!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus!');
    }
}

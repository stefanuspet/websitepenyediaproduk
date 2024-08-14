<?php

namespace App\Http\Controllers;

use App\Models\ProductCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
    }

    public function index()
    {
        $categories = ProductCategories::all();
        if (Auth::user()->role === 'admin') {
            return view('admin.category.index', compact('categories'));
        }
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = new ProductCategories();
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan !!');
    }

    public function edit($id)
    {
        $category = ProductCategories::find($id);
        if ($category) {
            return view('admin.category.edit', compact('category'));
        }
        return redirect()->route('category.index')->with('error', 'Kategori tidak ditemukan !!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = ProductCategories::find($id);
        if ($category) {
            $category->category_name = $request->category_name;
            $category->save();
            return redirect()->route('category.index')->with('success', 'Kategori berhasil diperbarui.');
        }
        return redirect()->route('category.index')->with('error', 'Kategori tidak ditemukan !!');
    }

    public function destroy($id)
    {
        $category = ProductCategories::find($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus !!');
    }
}

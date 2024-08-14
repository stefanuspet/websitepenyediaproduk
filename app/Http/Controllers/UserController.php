<?php

namespace App\Http\Controllers;

use App\Models\ProductCategories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();
        if (Auth::user()->role === 'admin') {
            return view('admin.user.index', compact('users'));
        } else {
            return abort(403);
        }
    }

    public function approveStatus(Request $request)
    {
        $user = User::find($request->id);
        $user->is_active = true;
        $user->save();
        return redirect()->back();
    }

    public function deactiveStatus(Request $request)
    {
        $user = User::find($request->id);
        $user->is_active = false;
        $user->save();
        return redirect()->back();
    }

    public function showProfile()
    {
        $categories = ProductCategories::all();
        if (Auth::user()->role === 'user') {
            return view('user.profile', compact('categories'));
        } else {
            return abort(403);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(Request $request, $category)
    {
        $user = array();
        if (Session::has('loginId')) {
            $user = User::where('id', '=', Session::get('loginId')) -> first();
        }
        $category = Blog::where('category', $category) -> first();
        $categories = Blog::where('category', '=', $request -> category) -> get();
        return view('category', compact('category', 'user')) -> with(['categories' => $categories]);
    }
}

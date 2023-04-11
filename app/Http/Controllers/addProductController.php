<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class addProductController extends Controller
{
    public function index()
    {
        $user = array();
        if (Session::has('loginId')) {
            $user = User::where('id', '=', Session::get('loginId')) -> first();
        }
        $category = Category::all();
        return view('add-blogs', compact('user', 'category'));
    }

    public function blogs(Request $request)
    {
        $this -> validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required',
        ]);
        if ($request -> has('image')) {
            $file = $request -> image;
            $file_name = time(). '_' .$file -> getClientOriginalName();
            $file -> move(public_path('blogs'), $file_name);
        }
        Blog::create([
            'title' => $request -> title,
            'slug' => Str::slug($request -> title),
            'description' => $request -> description,
            'category' => $request -> category,
            'image' => $file_name,
            'user_id' => $request -> user_id,
        ]);
        return redirect() -> route('home') -> with('success', 'blog added succefuly');
    }
}

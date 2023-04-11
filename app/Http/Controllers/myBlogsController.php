<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class myBlogsController extends Controller
{
    public function index(Request $request, $id)
    {
        $user = array();
        if (Session::has('loginId')) {
            $user = User::where('id', '=', Session::get('loginId')) -> first();
        }
        $userId = User::find($id) -> first();
        $blogs = Blog::where('user_id', '=', $user ->id) -> get();
        return view('my-blogs', compact('user', 'userId')) -> with('blogs', $blogs);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogsController extends Controller
{
    public function index()
    {
        return view('layouts.blogs');
    }

    public function show($slug)
    {
        $user = array();
        if (Session::has('loginId')) {
            $user = User::where('id', '=', Session::get('loginId')) -> first();
        }
        $detail = Blog::where('slug', $slug) -> first();
        return view('blogs.details-blogs', compact('detail', 'user'));
    }

    public function blogs()
    {
        $user = array();
        if (Session::has('loginId')) {
            $user = User::where('id', '=', Session::get('loginId')) -> first();
        }
        $blogs = Blog::all();
        return view('blogs.home', compact('user')) -> with([
            'blogs' => $blogs,
        ]);
    }
}





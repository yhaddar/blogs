<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index()
    {
        return view('account.login');
    }

    public function register(Request $request)
    {
        return view('account.register');
    }

    public function User(Request $request)
    {
        $this -> validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password'  => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ],
            'profile' => 'required|mimes:jpg,jpeg,png|max:5024',
        ]);
        if ($request -> has('profile')) {
            $file = $request -> profile;
            $file_name = time(). '_' .$file -> getClientOriginalName();
            $file -> move(public_path('profile'), $file_name);
        }
        if ($request -> password == $request -> confirmPassword) {
            User::create([
                'first_name' => $request -> first_name,
                'last_name' => $request -> last_name,
                'email' => $request -> email,
                'password' => Hash::make($request -> password),
                'profile' => $file_name,
            ]);
        }else {
            return redirect() -> route('blog.register') -> with('error', 'The password is incorrect');
        }
        return redirect() -> route('blog.register') -> with('success', 'Your account has been created successfully');
    }

    public function login(Request $request)
    {
        $this -> validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', '=', $request -> email) -> first();
        if ($user) {
            if (Hash::check($request -> password, $user -> password)) {
                $request -> session() -> put('loginId', $user -> id);
                return redirect() -> route('home');
            }else {
                return redirect() -> route('blog.login') -> with('error', 'The password is incorrect');
            }
        }else {
            return redirect() -> route('blog.login') -> with('error', 'Email not registered before');
        }
    }

    public function logout()
    {
        if (session() -> has('loginId')) {
            session() -> pull('loginId');
        }
        return redirect() -> route('blog.login');
    }
}

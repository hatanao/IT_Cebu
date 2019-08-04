<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blog;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $blogs = Auth::user()->blogs()->orderByDesc('created_at')->get();
        return view('home', compact('blogs'));

    }
    public function showUsers()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    
    public function showUser($id)
    {
        
        $user = User::find($id);
        $blogs = $user->blogs;
        // var_dump($user); 
        return view('users.userinfo', compact('blogs', 'user'));
    }
}       

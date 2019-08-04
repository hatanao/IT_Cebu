<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    
    
    public function follow($id){
        Auth::user()->following()->attach($id);
        
        return redirect()->back();
    }
    public function unfollow($id){
        Auth::user()->following()->detach($id);
        
        return redirect()->back();
    }
    public function edit($id)
    {   
        $user = Auth::user();
        return view('users.editprofile', compact('user'));
    }

    public function update($id)
    {
        $user = Auth::user()->update([
            'name' => request()->new_name,
            'email' => request()->new_email,
        ]);
        if(request()->password){
            //validation rule
            request()->validate([
                'password' => ['required', 'min:6', 'confirmed']
            ]);
            if(Hash::check(request()->current_password, Auth::user()->password)){
                Auth::user()->update([
                    'password' => Hash::make(request()->password)
                ]);
            } else {
                return "incorrect password";
            }
            
        }
        return redirect('home');
    }

    public function showFollowing(){
        $users = Auth::user()->following()->get();
        return view('users.followinglist', compact('users'));
    }
    public function showFollowers(){
        $users = Auth::user()->followers()->get();
        return view('users.followerslist', compact('users'));
    }

}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Auth;

class BlogController extends Controller
{
    public function store(){
        $blog = Blog::create([
            'user_id' => Auth::user()->id,
            'content' => request()->blog_content
        ]);
        return redirect()->back();
    }

    public function edit($id){
        $blog = Blog::whereid($id)->first(); 
        return view('edit', compact('blog'));
    }

    public function update($id){
        $blog = Blog::find($id);
        $blog->content = request()->content;
        $blog->save();
        
        $blogs = Auth::user()->blogs()->orderByDesc('created_at')->get();
        return view('home', compact('blogs'));

    }

    public function delete($id){
        Blog::where('id',$id)->delete(); 
        return redirect()->back();
    }
}

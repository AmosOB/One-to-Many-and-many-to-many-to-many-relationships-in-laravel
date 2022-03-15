<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $blog_posts = DB::table('blog_posts')->get();
         return view('home',['blog_posts'=>$blog_posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowCar($id){
        $blog_posts = Blog::with('cars')->findOrFail($id);
        return view('show', compact('blog_posts'));

        
    }
    
    public function AddPost()
    {
        return view('addpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SavePost(Request $request)
    {
        // Saves the posts posted at the UI tot he DB 
      DB::table('blog_posts')->insert([
        'name'=>$request->name,
        'description'=>$request->description
      ]);

      return redirect('home')->with('post_add','Post Added Successfully!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function UpdatePost($id)
    {
      $blog_post = DB::table('blog_posts')->where('id', $id)->first();
       return view('updatepost', ['blog_post'=>$blog_post]);

    }
    public function SaveUpdate(Request $request){
          // Saves the posts posted at the UI tot he DB 
      DB::table('blog_posts')->where('id', $request->id)->update([
        'name'=>$request->name,
        'description'=>$request->description
      ]);
      return redirect('home')->with('post_add','Post Updated Successfully!');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
 
    public function DeletePost($id)
    {
       DB::table('blog_posts')->where('id', $id)->delete();
       return redirect('home')->with('post_add','Post Deleted Successfully!');
    }
}

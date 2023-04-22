<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
        
        $posts = Post::where('status','0')->take(2)->latest()->get();
        
        $mainPost = Post::where('status','0')->latest()->paginate(9);
            
        return view('frontend.index',compact('posts','mainPost'));
        
    }

    public function viewcategory(string $category_slug){

        $category = Category::where('slug',$category_slug)->where('status','0')->first();
        if($category){
            $post = Post::where('category_id',$category->id)->where('status','0')->paginate(9);

            return view('frontend.post.index',compact('category','post'));

        }else{
            return redirect('/');
        }
        
    }

    public function showsinglepost(string $category_slug,string $post_slug){

        $category = Category::where('slug',$category_slug)->where('status','0')->first();
        if($category){
            $post = Post::where('category_id',$category->id)->where('slug',$post_slug)->where('status','0')->first();

            return view('frontend.post.singlepost',compact('category','post'));

        }else{
            return redirect('/');
        }
    }

    public function viewtag(string $category_slug,string $post_slug, $id){

        $category = Category::where('slug',$category_slug)->where('status','0')->first();
        if($category){
            $post = Post::where('category_id',$category->id)->where('status','0')->paginate(2);

            $tags = Tag::find($id);
            
            return view('frontend.tags.index',compact('category','post','tags'));

        }else{
            return redirect('/');
        }
    }

    public function about(){

        return view('frontend.about.about');
    }

    public function privacy(){

        return view('frontend.privacy.privacy');
    }

    public function terms(){

        return view('frontend.terms.terms');
    }

    
    public function contact(){

        return view('frontend.contact.contact');
    }

    public function search(){
        if(request()->query('search')){
            dd(request()->query('query'));
        }
    }
}

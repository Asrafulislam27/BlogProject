<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\PostFormRequest;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }

    public function create(){

        $category = Category::where('status','0')->get();
        $tags = Tag::all();
        return view('admin.post.create',compact('category','tags'));
    }

    public function store(PostFormRequest $request){

      
        $data = $request->validated();

        $post = new Post;

        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];

        if($request->hasfile('post_image')){

            $destination = 'Upload/Post/'.$post->post_image;

                if(File::exists($destination)){
                    File::delete($destination);
                }

            $file = $request->file('post_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            //$file->move('Upload/Post/',$filename);
            $new_img = Image::make($file->getRealPath())->resize(640, 400);

            $new_img->save('Upload/Post/'. $filename, 80);

            $post->post_image = $filename;
        }

        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1':'0';
        $post->created_by = Auth::user()->id;
        $post->save();

        $post->tags()->attach($request->tags);

        $notification = array(
            'message' => 'Post Create Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/posts')->with($notification);
        
    }

    public function edit($post_id){

        $posts = Post::find($post_id);
        $category = Category::where('status','0')->get();
        $tags = Tag::all();

        return view('admin.post.edit',compact('category','posts','tags'));
    }

    public function update(PostFormRequest $request,$post_id){
        $data = $request->validated();

        $post = Post::find($post_id);

        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];

        if($request->hasfile('post_image')){

            $destination = 'Upload/Post/'.$post->post_image;

                if(File::exists($destination)){
                    File::delete($destination);
                }

            $file = $request->file('post_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            //$file->move('Upload/Post/',$filename);
            $new_img = Image::make($file->getRealPath())->resize(400, 300);

            $new_img->save('Upload/Post/'. $filename, 80);

            $post->post_image = $filename;
        }

        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1':'0';
        $post->created_by = Auth::user()->id;
        $post->update();

        $post->tags()->sync($request->tags);

        $notification = array(
            'message' => 'Post Update Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/posts')->with($notification);

    }

    public function destroy($post_id){
        $posts = Post::find($post_id);
        if($posts){
            $posts->delete();

            $notification = array(
                'message' => 'Post Deleted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect('admin/posts')->with($notification);
        }else{
            $notification = array(
                'message' => 'No Post Id Found',
                'alert-type' => 'success'
            );
    
            return redirect('admin/posts')->with($notification);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagFormRequest;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();
        return view('admin.tag.index',compact('tags'));
    }

    public function create(){
        return view('admin.tag.create');
    }

    public function store(TagFormRequest  $request){
        $data = $request->validated();
        $tags = new Tag;

        $tags->tag = $data['tag'];

        $tags->save();

        $notification = array(
            'message' => 'Tag Create Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/tag')->with($notification);
    }

    public function edit($tag_id){
        $tags = Tag::find($tag_id);
        return view('admin.tag.edit',compact('tags'));
    }

    public function update(TagFormRequest  $request,$tag_id){
        $data = $request->validated();
        $tags = Tag::find($tag_id);

        $tags->tag = $data['tag'];

        $tags->update();

        $notification = array(
            'message' => 'Tag Update Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/tag')->with($notification);
    }

    public function destory($tag_id){
        $tags = Tag::find($tag_id);
        if($tags){
            $tags->delete();

            $notification = array(
                'message' => 'Tag Deleted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect('admin/tag')->with($notification);
        }else{
            $notification = array(
                'message' => 'No Tag Id Found',
                'alert-type' => 'success'
            );
    
            return redirect('admin/tag')->with($notification);
        }
    }
}

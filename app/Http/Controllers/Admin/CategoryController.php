<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\Admin\CategoryFormRequest;


class CategoryController extends Controller
{
    public function index(){

        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create(){

        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request){
  

        $data = $request->validated();
        $category = new Category;

        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1':'0';
        $category->status = $request->status  == true ? '1':'0';
        $category->save();

        $notification = array(
            'message' => 'Category Create Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/category')->with($notification);
    }

    public function edit($category_id){

        $category = Category::find($category_id);

        return view('admin.category.edit',compact('category'));
    }

    public function update(CategoryFormRequest $request,$category_id){

        $data = $request->validated();
        $category = Category::find($category_id);

        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1':'0';
        $category->status = $request->status  == true ? '1':'0';
        $category->update();

        $notification = array(
            'message' => 'Category Update Successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/category')->with($notification);

    }

    public function destroy($category_id){
        $category = Category::find($category_id);
        if($category){
            $category->delete();

            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect('admin/category')->with($notification);
        }else{
            $notification = array(
                'message' => 'No Category Id Found',
                'alert-type' => 'success'
            );
    
            return redirect('admin/category')->with($notification);
        }
    }
}

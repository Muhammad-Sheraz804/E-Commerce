<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function categories(){
        return view('admin.category.index',[
            'categories' => Categories::all()
        ]);
    }
    public function add_category(){
        return view('admin.category.add');
    }
    public function insert(Request $req){
        $category = new Categories;
        if($req->hasFile('image')){
            $file = $req->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('assets/uploads/category/', $filename);
            $category->image = $filename;
        }
        $category->name = $req->input('name');
        $category->slug = $req->input('slug');
        $category->description = $req->input('description');
        $category->status = $req->input('status') == TRUE ? '1' : '0';
        $category->popular = $req->input('popular') == TRUE ? '1' : '0';
        $category->meta_title = $req->input('meta_title');
        $category->meta_keywords = $req->input('meta_keywords');
        $category->meta_descrip = $req->input('meta_descrip');
        $category->save();

        return redirect('/categories')->with('status', 'Category Added Successfully');


    }

    public function edit_category(Categories $categories){
        $categories = Categories::find($categories->id);
        return view('admin.category.edit',[
            'category' => $categories
        ]);
    }

    public function update_category(Request $req, Categories $categories){
        $category = Categories::find($categories->id);
        if($req->hasFile('image')){
            $path = 'assets/uploads/category'. $category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $req->file('image');
            $ext = $file->getClientOriginalName();
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        }
        $category->name = $req->input('name');
        $category->slug = $req->input('slug');
        $category->description = $req->input('description');
        $category->status = $req->input('status') == TRUE ? '1' : '0';
        $category->popular = $req->input('popular') == TRUE ? '1' : '0';
        $category->meta_title = $req->input('meta_title');
        $category->meta_keywords = $req->input('meta_keywords');
        $category->meta_descrip = $req->input('meta_descrip');
        $category->update();

        return redirect('/categories')->with('status', 'Category Updated Successfully');

    }

    public function delete_category(Categories $categories){
        if($categories->image){
            $path = 'assets/uploads/category' . $categories->image;
            if(File::exists($path)){
                File::delete();
            }
        }
        $categories->delete();
        return redirect('/categories')->with('status', 'Categories Deleted Successfully');
    }
}

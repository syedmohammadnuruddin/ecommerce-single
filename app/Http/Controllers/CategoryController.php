<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory(){
        $categories = category::latest()->get();
        return view('admin.allcategory',compact('categories'));
    }
    public function addCategory(){
        return view('admin.addcategory');
    }
    public function storeCategory(){
        $this->validate(request(),[
            'category_name'=>'required|unique:categories'
        ]);
        category::create([
           'category_name' => \request('category_name'),
            'slug' => strtolower(str_replace(' ','-',\request('category_name'))),

        ]);
        return redirect()->route('allCategory')->with('message','Category Added Successfully');
    }
    public function editCategory($id){
        $category_info = category::findOrFail($id);
        return view('admin.editcategory',compact('category_info'));
    }
    public function updateCategory(Request $request){
        $category_id = $request->category_id;
        $request->validate([
           'category_name'=>'required|unique:categories'
        ]);
        category::findOrFail($category_id)->update([
            'category_name' => \request('category_name'),
            'slug' => strtolower(str_replace(' ','-',\request('category_name'))),
        ]);
        return redirect()->route('allCategory')->with('message','Category Updated Successfully');
    }
    public function deleteCategory($id){
        category::findOrFail($id)->delete();

        return redirect()->route('allCategory')->with('message', 'Category Deleted Successfully');
    }
}

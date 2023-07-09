<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function allSubCategory(){
        $allsubcategories = subcategory::latest()->get();
        return view('admin.allsubcategory',compact('allsubcategories'));
    }
    public function addSubCategory(){
        $categories = category::latest()->get();
        return view('admin.addsubcategory',compact('categories'));
    }
    public function storeSubCategory(Request $request){
        $request->validate([
           'subcategory_name'=>'required|unique:subcategories',
            'category_id'=>'required'
        ]);
        $category_id = $request->category_id;
        $category_name = category::where('id',$category_id)->value('category_name');

        subcategory::insert([
           'subcategory_name'=>$request->subcategory_name,
            'slug'=>strtolower(str_replace(' ','-',$request->subcategory_name)),
            'category_id'=>$category_id,
            'category_name'=>$category_name
        ]);
        category::where('id',$category_id)->increment('subcategory_count',1);

        return redirect()->route('allSubCategory')->with('message','Sub Category Added Successfully');
    }
    public function editSubCat($id){
        $subcatinfo = subcategory::findOrFail($id);
        return view('admin.editsubcategory',compact('subcatinfo'));
    }
    public function updateSubCat(Request $request){
        $request->validate([
           'subcategory_name'=>'required|unique:subcategories'
        ]);
        $subcatid = $request->subcatid;
        subcategory::findOrFail($subcatid)->update([
            'subcategory_name'=>$request->subcategory_name,
            'slug'=>strtolower(str_replace(' ','-',$request->subcategory_name))
        ]);
        return redirect()->route('allSubCategory')->with('message','Sub Category Updated Successfully');
    }
    public function deleteSubCat($id){
        $cat_id = subcategory::where('id', $id)->value('category_id');
        subcategory::findOrFail($id)->delete();
        category::where('id', $cat_id)->decrement('subcategory_count',1);
        return redirect()->route('allSubCategory')->with('message','Sub Category Deleted Successfully');
    }
}

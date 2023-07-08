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

        return redirect()->route('allSubCategory')->with('message','Sub Category Updated Successfully');
    }
}

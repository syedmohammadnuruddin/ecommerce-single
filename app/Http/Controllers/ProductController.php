<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use App\Models\subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProduct(){
        $products = Product::latest()->get();
        return view('admin.allproduct',compact('products'));
    }
    public function addProduct(){
        $categories = category::latest()->get();
        $subcategories = subcategory::latest()->get();
        return view('admin.addproduct',compact('categories','subcategories'));
    }
    public function storeProduct(Request $request){
        $request->validate([
           'product_name'=>'required|unique:products',
            'price'=>'required',
            'quantity'=>'required',
            'product_short_des'=>'required',
            'product_long_des'=>'required',
            'product_category_id'=>'required',
            'product_subcategory_id'=>'required',
            'product_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url = 'upload/'.$img_name;

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name = category::where('id',$category_id)->value('category_name');
        $subcategory_name = subcategory::where('id',$subcategory_id)->value('subcategory_name');

        Product::insert([
           'product_name'=>$request->product_name,
           'product_short_des'=>$request->product_short_des,
           'product_long_des'=>$request->product_long_des,
           'price'=>$request->price,
           'quantity'=>$request->quantity,
           'product_category_name'=>$category_name,
           'product_subcategory_name'=>$subcategory_name,
           'product_category_id'=>$request->product_category_id,
           'product_subcategory_id'=>$request->product_subcategory_id,
           'product_img'=>$img_url,
            'slug'=>strtolower(str_replace(' ','-',$request->product_name))
        ]);

        category::where('id',$category_id)->increment('product_count',1);
        subcategory::where('id',$subcategory_id)->increment('product_count',1);

        return redirect()->route('allProduct')->with('message','Product Added Successfully');
    }
    public function editProductImage($id){
        $product_info = Product::findOrFail($id);
        return view('admin.editproductimage',compact('product_info'));
    }
    public function updateProductImage(Request $request){
        $request->validate([
             'product_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);

         $id = $request->id;
         $image = $request->file('product_img');
         $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         $request->product_img->move(public_path('upload'),$img_name);
         $img_url = 'upload/'.$img_name;

         Product::findOrFail($id)->update([
            'product_img'=>$img_url,
         ]);
         return redirect()->route('allProduct')->with('message','Image Updated Successfully');
    }
    public function editProduct($id){
        $product_info = Product::findOrFail($id);
        return view('admin.editproduct',compact('product_info'));
    }
    public function updateProduct(Request $request){
        $product_id = $request->id;

        $request->validate([
            'product_name'=>'required',
             'price'=>'required',
             'quantity'=>'required',
             'product_short_des'=>'required',
             'product_long_des'=>'required',
         ]);

         Product::findOrFail($product_id)->update([
            'product_name'=>$request->product_name,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'product_short_des'=>$request->product_short_des,
            'product_long_des'=>$request->product_long_des,
            'slug'=>strtolower(str_replace(' ','-',$request->product_name))
         ]);

         return redirect()->route('allProduct')->with('message','Product Updated Successfully');

    }
    public function deleteProduct($id){
        
        $cat_id = Product::Where('id',$id)->value('product_category_id');
        $subcat_id = Product::Where('id',$id)->value('product_subcategory_id');

        Product::findOrFail($id)->delete();
        
        category::Where('id',$cat_id)->decrement('product_count',1);
        subcategory::Where('id',$subcat_id)->decrement('product_count',1);

        return redirect()->route('allProduct')->with('message','Product Deleted Successfully');
    }
}

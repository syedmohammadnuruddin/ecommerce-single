<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProduct(){
        return view('admin.allproduct');
    }
    public function addProduct(){
        return view('admin.addproduct');
    }
}

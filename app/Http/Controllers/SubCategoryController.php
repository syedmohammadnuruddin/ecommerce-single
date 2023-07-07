<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function allSubCategory(){
        return view('admin.allsubcategory');
    }
    public function addSubCategory(){
        return view('admin.addsubcategory');
    }
}

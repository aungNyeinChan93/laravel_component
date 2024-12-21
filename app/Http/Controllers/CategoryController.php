<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //index
    public function index(){
        $categories = Category::latest()->paginate(8);
        return view('categories.index',compact('categories'));
    }
}

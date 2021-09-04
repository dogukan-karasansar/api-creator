<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function getCategory($id) {
       $category = Category::find($id);

       return response()->json([$category]);
   }

   public function store(Request $request) {
       $request->validate([
           'category_name' => "required",
       ]);

       Category::create($request->all());

       return response()->json(['success' => "succcess created"]);
   }
}

<?php

namespace App\Http\Controllers\Ecommerce;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
       $categories=Category::all();
        return view('Admin.category',compact('categories'));
    }

    //saving the new category and redirect  to the view product
    public function store(Request $request)
    {

        $category =new Category;

        $category->name=$request->input('name');

        //saving the category
        $category->save();
        //save($product);

        return redirect('/category')->with('status','Category have been added with success');
    }

     public function update(Request $request,$id)
    {

 $category=Category::findOrFail($id);

     //  $imagePath = request('image')->store('uploads','public');

            if($category){
         $category->name=$request->input('name');

        //$eleve->image=$imagePath;
         $category->save();

            }

       return redirect('/category');
    }

    public function delete($id)
    {

        $category=Category::findORFail($id);
        $category->delete();
        return redirect('/category');

    }
}

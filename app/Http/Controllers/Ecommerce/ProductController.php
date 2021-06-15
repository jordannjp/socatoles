<?php

namespace App\Http\Controllers\Ecommerce;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Image;

class ProductController extends Controller
{
    public function index()
   {
       $products=Product::all();
      $categories=Category::all();

       return view('Admin.product',compact('products','categories'))->with('status','Product have been added with success');
   }

    //saving the new product and redirect  to the view product
    public function store(Request $request)
    {

       /* $data = request()->validate([

            'name' => ['required', 'string',  'max:255'],
            'price' => ['required', 'string',],
            'description' => ['required', 'text'],
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);*/

        $category=Category::findOrFail($request->category_id);

        $image=$request->file('file');
        $imageName=time().'.'.$image->extension();
      //  $image_resize=Image::make($image->getRealpath());
        //$image_resize->resize(300,300);
      $image->move(public_path('images'),$imageName);
        $product =new Product;
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->image=$imageName;
        $product->description=$request->input('description');
        //saving the product with the category_id
        $category->product()->save($product);

        return redirect('/product');
    }

     public function update(Request $request,$id)
    {

 $product=Product::findOrFail($id);

     //  $imagePath = request('image')->store('uploads','public');

            if($product){
         $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->image=$request->input('image');
        $product->description=$request->input('description');
        //$eleve->image=$imagePath;
         $product->save();

            }

       return redirect('/product');
    }

    public function delete($id)
    {

        $product=Product::findORFail($id);
        $product->delete();
        return redirect('/product');

    }
}
/*
$this->validate($request, [
            'name' => 'required',
            'imgFile' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $image = $request->file('imgFile');
        $input['imagename'] = time().'.'.$image->extension();

        $filePath = public_path('/thumbnails');

        $img = Image::make($image->path());
        $img->resize(110, 110, function ($const) {
            $const->aspectRatio();
        })->save($filePath.'/'.$input['imagename']);

        $filePath = public_path('/images');
        $image->move($filePath, $input['imagename']);

        return back()
            ->with('success','Image uploaded')
            ->with('fileName',$input['imagename']);
*/

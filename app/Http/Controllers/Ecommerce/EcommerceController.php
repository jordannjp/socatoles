<?php

namespace App\Http\Controllers\Ecommerce;

use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\DB;


class EcommerceController extends Controller
{

   public function index()

    {
      $products=Product::all();
      $categories=Category::all();
      $category_tole='1';
      $products_tole=Product::with('category')->where('category_id',$category_tole)->orderBy('id','desc')->get();

       $category_charpente='2';
      $products_charpente=Product::with('category')->where('category_id',$category_charpente)->orderBy('id','desc')->get();
      // dd($products);

      return view("ecommerce.index",compact('products','products_tole','products_charpente'));
    }

    public function shop()
    {
      //$products=Product::simplepaginate(10);
      $category_tole='1';
      $products=Product::with('category')->where('category_id',$category_tole)->orderBy('id','desc')->simplePaginate(4);
      $categories=Category::all();
      return view("ecommerce.shop",compact('products','categories'));
    }

     public function chapentre()
    {
      //$products=Product::simplepaginate(10);
       $category_charpente='2';
      $products=Product::with('category')->where('category_id',$category_charpente)->orderBy('id','desc')->simplePaginate(3);

      $categories=Category::all();
      return view("ecommerce.chapentre",compact('products','category_charpente'));
    }

    public function shop_single($id)
    {
if (Auth::user()) {
   $product=Product::findOrFail($id);
      $user_id=Auth::user()->id;
      $cart=Cart::where('user_id',$user_id);
      $count=$cart->count();
     // dd($count);
      return view("ecommerce.shop-single",compact('product','count'));
} else {
   $product=Product::findOrFail($id);

      return view("ecommerce.shop-single",compact('product'));
}
    }

    public function add_to_cart(Request $request)
    {
       $products=Product::all();
       //dd($product);
      //if($request->session()->has('user'))
      if(Auth::user())
       {
        // dd($product);
        $product_quentity=$request->quentity;
        $product_id=$request->product_id;
        if($product_quentity==0)
        {
          return redirect('/shop-single/'.$product_id)->with('status','You cannot add 0 item in the cart');
        }
        $product=Product::findOrFail($product_id);
        $product_price=$product->price;

        $total_price=$product_quentity*$product_price;

         $user_id=Auth::user()->id;
         $cart=new Cart;
         $cart->user_id=$user_id;
         $cart->product_id=$product_id;
         $cart->product_quentity=$request->quentity;
         $cart->total_price=$total_price;
         $cart->save();
        // return redirect('/');
      return redirect('/cartlist');
       }
       else {
          return redirect('/login');
      }
    }

//counting the number of product in a cart  calling it to the user nave bar
static function cartitem()
{
if(Auth::user())
{
  $userId=Auth::user()->id;
return Cart::where('user_id',$userId)->count();
}
else {
  return (0);
}
}

 public function cartlist()
 {
   if(Auth::user())
   {
   $userId=Auth::user()->id;
$products =DB::table('carts')
->join('products','carts.product_id','=','products.id')
->where('carts.user_id',$userId)
->select('products.*','carts.id as cart_id','product_quentity','total_price')
->get();
$count=$products->count();
return view("ecommerce.cart",compact('products','count'));
   }
   else {
     return redirect('/shop')->with('status','Select an Item');
   }
 }

 public function updateitem(Request $request, $cart_id)
 {
     $quentity=$request->input('quentity');

   if($quentity==0)
        {
          return redirect('/cartlist/'.$product_id)->with('status','You cannot modify to 0 item');
        }

   $id=Cart::findOrFail($cart_id);
  // dd($id);
   if($id){
         $id->product_quentity=$quentity;
         $id->save();

            }
   return redirect('cartlist');
 }

 public function removeitem($cart_id)
 {
   Cart::destroy($cart_id);
   return redirect('cartlist');
 }


    public function search(Request $request)
    {

      $data=Product::where('name',$request->input('search'))->get();
      return view('Ecommerce.search',['products'=>$data]);
    }

    public function ordernow()
    {
      if(Auth::user())
      {
      $userId=Auth::user()->id;
$sum_total_price = $products =DB::table('carts')
->join('products','carts.product_id','=','products.id')
->where('carts.user_id',$userId)
->select('products.*','carts.id as cart_id')
->sum('total_price');

$products =DB::table('carts')
->join('products','carts.product_id','=','products.id')
->where('carts.user_id',$userId)
->select('products.*','carts.id as cart_id','product_quentity','total_price')
->get();
      return view("ecommerce.checkout",compact('sum_total_price','products'));
      }
      else {
     return redirect('/shop')->with('status','Select an Item');
   }
    }

 public function orderplace(Request $request,$address,$tel)
 {
   if(Auth::user())
      {
      $userId=Auth::user()->id;
       $userName=Auth::user()->name;
   $allcart=Cart::where('user_id',$userId)->get();

   foreach ($allcart as $cart) {
     $order=new Order;
     $order->user_id=$cart['user_id'];
     $order->product_id=$cart['product_id'];
     $order->product_quentity=$cart['product_quentity'];
     $order->total_price=$cart['total_price'];
     $order->status='pending';
     $order->username=$userName;
     $order->address=$address;
     $order->save();
     Cart::where('user_id',$userId)->delete();

   }
      return redirect('/')->with('status','La Commande a ete effectuee Avec Succes');
      }
 }

 public function orders_show()
 {
   if(Auth::user())
      {
      $userId=Auth::user()->id;

$orders =DB::table('orders')
->join('products','orders.product_id','=','products.id')
->where('orders.user_id',$userId)
->get();
      return view("ecommerce.orders_show",compact('orders'));
      }
      else {
     return redirect('/')->with('status','Select an Item');
   }
 }

    public function thankyou()
    {

      return view("ecommerce.thankyou");
    }
    public function contact()
    {

      return view("ecommerce.contact");
    }

    public function about()
    {

      return view("ecommerce.about");
    }
}



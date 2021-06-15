<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
   public function index()
   {
$orders =DB::table('orders')
->join('products','orders.product_id','=','products.id')
//->where('orders.user_id',$userId)
->get();
       //$orders=Order::all();
       return view("Admin.order",compact('orders'));
   }
}

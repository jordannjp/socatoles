<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\user;
use App\Models\Order;
use Auth;

class AdminController extends Controller
{
	
    public function index()
    {
		
$products=Product::all();
$pcount=$products->count();//pcount=product count


$categories=Category::all();
$ccount=$categories->count(); //ccount=category count

$users=User::all();
$ucount=$users->count();//ucount=user count

$orders=Order::all();
$ocount=$orders->count();//ocount=order count

        return view('Admin.dashboard',compact('pcount','ccount','ucount','ocount'));
    }
	
		
		
}

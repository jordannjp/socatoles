<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Illuminate\Support\Facades\DB;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
public function sendEmail(Request $request)
{
    
    $username=Auth::user()->name;
    $address=$request->input('address');
    $phone=$request->input('tel');
    $product_name=$request->input('pname');
    $product_quentity=$request->input('pquentity');
    $unique_price=$request->input('puniqueprice');
    $total_price=$request->input('ptotalprice');
   // dd($unique_price);
    $details=[
//'Id'=>$user_id,

'Nom'=>$username,
'Tel'=>$phone,
'Email'=>$address,
'Produit'=>$product_name,
'Quantiter'=>$product_quentity,
'Unique_Price'=>$unique_price,
'Prix_Total'=>$total_price
];

Mail::to("takembougguy@gmail.com")->send(new SendMail($details));
//return redirect()->route('orderplace',[$address],[$phone]);
return redirect('/orderplace/'.$address.'/'.$phone);

}

}

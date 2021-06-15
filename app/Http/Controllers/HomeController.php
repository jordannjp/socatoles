<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index()
	{
		$usertype=Auth::user()->usertype;
		//dd($usertype);
		if($usertype == "admin")
		{
			return redirect('/admin/dashboard');
		}
		else
		{
			return redirect('user/dashboard');
		}
	}
}

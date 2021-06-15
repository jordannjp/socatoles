<?php

//use App\Http\Controllers\EcommerceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Ecommerce\EcommerceController;
use App\Http\Controllers\Ecommerce\AdminController;
use App\Http\Controllers\Ecommerce\CategoryController;
use App\Http\Controllers\Ecommerce\ProductController;
use App\Http\Controllers\Ecommerce\OrderController;
use App\Http\Controllers\Ecommerce\UserController;
use App\Http\Controllers\MailController;
//use App\Http\Controllers\Ecommerce\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//*****************************************************************************************************************

Route::get('/redirects',[HomeController::class,'index']);
//start admin soctoles route
 
Route::group(['middleware' =>['auth:sanctum', 'verified']], function(){
  Route::get('/admin/dashboard',[AdminController::class,'index'])->name('Admin.dashboard');
  Route::get('/category',[CategoryController::class,'index']);
  Route::post('/save_category',[CategoryController::class,'store']);
  Route::patch('/update_category/{id}',[CategoryController::class,'update']);
  Route::delete('/delete_category/{id}',[CategoryController::class,'delete']);

  Route::get('/product',[ProductController::class,'index']);
  Route::post('/product_save',[ProductController::class,'store']);
  Route::patch('/update_product/{id}',[ProductController::class,'update']);
  Route::delete('/delete_product/{id}',[ProductController::class,'delete']);

  Route::get('/admin_order',[OrderController::class,'index']);

  Route::get('/user',[UserController::class,'index']);

  Route::get('/scategory/{id}',[CategoryController::class,'serch']);


});
 //end admin socatoles route
//*****************************************************************************************************************

//start user socatole route

Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard', [EcommerceController::class,'index'])
->name('userdashboard');

Route::get('/', [EcommerceController::class,'index']);

Route::get('/shop', [EcommerceController::class,'shop']);

Route::get('/chap', [EcommerceController::class,'chapentre']);

Route::get('/shop-single/{id}',[EcommerceController::class,'shop_single']);

Route::post('/add_to_cart',[EcommerceController::class,'add_to_cart']);

Route::get('/cartlist',[EcommerceController::class,'cartlist']);

Route::patch('/updateitem/{cart_id}',[EcommerceController::class,'updateitem']);

Route::get('/removeitem/{cart_id}',[EcommerceController::class,'removeitem']);

Route::get('/ordernow',[EcommerceController::class,'ordernow']);

Route::get('/orderplace/{address}/{tel}',[EcommerceController::class,'orderplace']);

Route::get('/orders_show/{user_id}',[EcommerceController::class,'orders_show']);

Route::get('/search',[EcommerceController::class,'search']);

Route::get('/checkout',[EcommerceController::class,'checkout']);

Route::post('/send-email',[MailController::class,'sendEmail']);

//end user socatole route



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\trangchucontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\InvoiceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/trangchu', function () {
//     return view('trangchu');
// });

Route::get('/',[trangchucontroller::class,'show'])->name('trangchu');
Route::get('/trangchu',[trangchucontroller::class,'show']);

// Route::get('/product/{id}',[trangchucontroller::class,'go'] );
Route::get('detail/{id}', [trangchucontroller::class, 'detail']);
Route::get('dangky', [trangchucontroller::class, 'dangky']);
Route::post('submitdangky', [trangchucontroller::class,'submit'])->name('submit');
Route::get('home/product', [trangchucontroller::class,'list'])->name('product');
Route::get('home/product/{id}', [trangchucontroller::class,'listcate']);
Route::get('home/location/', [trangchucontroller::class,'location'])->name('location');
Route::get('home/location/{id}', [trangchucontroller::class,'location2']);

Route::get('home/login', [trangchucontroller::class,'login'])->name('login');

Route::post('search', [trangchucontroller::class,'search'])->name('search');


Route::get('admin', [AdminController::class,'show'])->name('admin');
Route::get('delete/{id}', [AdminController::class, 'delete']);
Route::get('deletecate/{id}', [AdminController::class, 'deletecate']);

Route::post('insert', [AdminController::class,'insert'])->name('insert');
Route::get('products', [AdminController::class, 'products']);
Route::get('edit-product/{id}', [AdminController::class, 'editproduct']);
Route::post('update-product', [AdminController::class, 'update'])->name('update');
Route::get('addproduct', [AdminController::class,'addproduct']);
Route::post('add-product', [AdminController::class, 'add'])->name('add.submit');

Route::get('edit-category/{id}', [AdminController::class, 'editcategory']);
Route::post('update-category', [AdminController::class, 'updatecate'])->name('updatecate');
Route::get('/searchp', [AdminController::class,'searchp'])->name('searchp');


Route::get('accounts', [UserController::class, 'index'])->name('user');
Route::get('edit-account/{id}', [UserController::class, 'editaccount']);
Route::post('update-account', [UserController::class, 'update'])->name('updateaccount');
Route::get('addaccount', [UserController::class, 'addaccount']);
Route::post('add-account', [UserController::class, 'add'])->name('addaccount');
Route::get('deleteuser/{id}', [UserController::class, 'delete'])->name('deleteuser');


//user
Route::get('account/{id}', [UserController::class, 'customer']);
Route::get('account/edit/{id}', [UserController::class, 'editcustomer']);
Route::get('/account/order/{id}', [UserController::class,'detailordercustomer']);
Route::post('update-account', [UserController::class, 'updateuser'])->name('updateuser');
Route::get('account/fav/{id}', [AdminController::class, 'listFav']);



Route::get('/search', [UserController::class,'search'])->name('search');
Route::get('/searchhomee', [trangchucontroller::class,'search'])->name('searchhome');

//giohang
Route::get('/cart', [CartController::class,'showCart'])->name('cart');
Route::get('/add-to-cart/{product}', [CartController::class,'addToCart'])->name('addToCart');
Route::post('/add-to-cart/{product}', [CartController::class,'addToCart'])->name('addToCart');

// Trong file routes/web.php
Route::get('/cart-count', [CartController::class,'getCartCount']);
Route::get('/remove-item-from-cart/{productId}', [CartController::class,'removeItemFromCart'])->name('removeItemFromCart');
Route::get('/increase-quantity/{productId}', [CartController::class,'increaseQuantity'])->name('increaseQuantity');
Route::get('/decrease-quantity/{productId}',[CartController::class,'decreaseQuantity'])->name('decreaseQuantity');


Route::get('/orders/create', [OrderController::class,'create'])->name('orders.create');
Route::post('/orders',  [OrderController::class,'store'])->name('orders.store');
Route::get('/showorder', [OrderController::class,'show'])->name('orders.show');
Route::post('/orders', [OrderController::class, 'search'])->name('orders.search');
Route::post('/orders/status', [OrderController::class, 'status'])->name('orders.status');

Route::post('/orders-admin', [AdminController::class, 'search_admin'])->name('orders.searchad');
Route::post('/orders-admin/status', [AdminController::class, 'status_admin'])->name('orders.statusad');



Route::get('/login', [UserController::class,'showLoginForm']);
Route::post('/login',[UserController::class, 'login'])->name('loginform');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
route::get('/register',[UserController::class,'register'])->name('register');
route::post('/register',[UserController::class,'registerform'])->name('registerform');


Route::post('/checkout', [CartController::class,'checkout'])->name('checkout');
Route::get('/san-pham/findcategory', [trangchucontroller::class,'findByCategory'])->name('sanpham.findcate');
Route::get('/useraccount', [UserController::class,'useraccount'])->name('useraccount');
Route::get('/admin/order/{id}', [UserController::class,'detailorder'])->name('accountorder');
Route::get('order/cancel/{id}',[OrderController::class,'cancel'])->name('cancel')  ;
Route::get('order/delivery/{id}',[OrderController::class,'delivery'])->name('delivery')  ;
Route::get('order/pay/{id}',[OrderController::class,'pay'])->name('pay')  ;
Route::get('order/confirm/{id}',[OrderController::class,'confirm'])->name('confirm')  ;
Route::get('order/delivering/{id}',[OrderController::class,'delivering'])->name('delivering')  ;
Route::get('order/delivered/{id}',[OrderController::class,'delivered'])->name('deliverd')  ;

Route::post('/reviews', [ReviewController::class,'create'])->name('reviews.create');

//routes của voucher
Route::get('/voucher', [VoucherController::class,'index'])->name('voucher.index');
Route::get('/voucher/create',  [VoucherController::class,'create'])->name('voucher.create');
Route::post('/voucher',  [VoucherController::class,'store'])->name('voucher.store');
Route::get('/voucher/{voucher}', [VoucherController::class, 'edit'])->name('voucher.edit');
Route::put('/voucher/{voucher}', [VoucherController::class, 'update'])->name('voucher.update');
Route::get('/voucher/delete/{voucher}', [VoucherController::class, 'destroy'])->name('voucher.destroy');
//review
Route::post('/reviews', [ReviewController::class,'create'])->name('reviews.create');
Route::delete('/reviews/{review}/delete', [ReviewController::class, 'destroy'])->name('Review.destroy');
Route::get('/reviews/show', [ReviewController::class, 'index'])->name('reviews.index');
//check voucher to apply
Route::post('checkvoucher', [CartController::class, 'showCart'])->name('cart.checkVoucher');


//newa
Route::get('news', [NewsController::class, 'show'])->name('news');
Route::get('admin/news', [NewsController::class, 'index'])->name('newsadmin');
Route::get('admin/news/post', [NewsController::class, 'post'])->name('postnews');
Route::post('admin/post', [NewsController::class, 'add'])->name('postnew');
Route::get('admin/post/{id}/delete', [NewsController::class, 'delete'])->name('news.delete');

Route::get('admin/post/{id}/edit', [NewsController::class, 'showedit'])->name('news.showedit');
Route::put('admin/post/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');


//tao branch
Route::get('/branch/', [AdminController::class, 'showbranchs'])->name('showbranchs');
Route::get('/branch/list/', [AdminController::class, 'listbranchs'])->name('listbranchs');
Route::get('/branch/delete/{id}', [AdminController::class, 'destroybranch'])->name('branch.destroy');
Route::post('/branch',[AdminController::class, 'createbranch'])->name('createbranch');
Route::get('/branch/{branch}', [AdminController::class, 'editbranch'])->name('branch.edit');
Route::put('/branch/{branch}', [AdminController::class, 'updatebranch'])->name('branch.update');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//sanpham yeu thich
Route::get('/like/{id}', [trangchucontroller::class, 'fav']);

Route::get('/dellike/{id}', [AdminController::class, 'dellike']);


//thong ke
Route::get('/revenue-statistics', [AdminController::class, 'revenueStatistics'])->name('thongke');
Route::get('/invoice', [InvoiceController::class,'generateInvoice']);


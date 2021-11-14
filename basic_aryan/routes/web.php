<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortFolioController;
use App\Http\Controllers\ServiceController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

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
//home page pass data
Route::get('/', function () {
    $brands=DB::table('brands')->get();
    $home_about=DB::table('home_about')->first();
    $services=DB::table('services')->get();
    $images=DB::table('multipics')->get();
    // dd($images);
    return view('home',compact('brands','home_about','services','images'));
});
//home page pass data

Route::get('/home', function () {
    return "this is home";
});
Route::get('/about', function () {
    return view('about');
})->middleware('check');;
// Route::get('/contact', function () {
//     return view('contact');
// });
Route::get('/contact', [ContactController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    $users =User::all();
//    $users =DB::all();
    return view('admin.index');
})->name('dashboard');

//category controller

Route::get('/category/all', [CategoryController::class, 'Allcat'])->name("all.category");

Route::post('/category/add', [CategoryController::class, 'AddCat']);

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);

Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);

Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);
//brand

Route::get('/brand/all/', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'storebrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

// multi image Route
Route::get('/multi/image/', [BrandController::class, 'multipic'])->name('multi.image');
Route::post('/multi/image/', [BrandController::class, 'storeImg'])->name('store.image');


Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');

//admin all route
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');

Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [HomeController::class, 'Edit'])->name('slider.edit');
Route::post('/slider/update/{id}', [HomeController::class, 'Update'])->name('update.slider');
Route::get('/slider/delete/{id}', [HomeController::class, 'Delete'])->name('slider.delete');

// Home About 
Route::get('/home/about', [AboutController::class, 'AboutAll'])->name('home.about');
Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout'])->name('about.edit');
Route::post('/about/update/{id}', [AboutController::class, 'UpdateAbout'])->name('update.about');
Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout'])->name('delete.about');

//service section
Route::get('/home/service', [ServiceController::class, 'ServiceAll'])->name('home.service');
Route::get('/add/service', [ServiceController::class, 'AddService'])->name('add.service');
Route::post('/store/service', [ServiceController::class, 'StoreService'])->name('store.service');
Route::get('/service/edit/{id}', [ServiceController::class, 'Editservice'])->name('service.edit');
Route::post('/service/update/{id}', [ServiceController::class, 'UpdateService'])->name('update.service');
Route::get('/service/delete/{id}', [ServiceController::class, 'Deleteservice'])->name('delete.service');

//portfoilo route
Route::get('/portfolio', [PortFolioController::class, 'portfolio'])->name('portfolio');
// admin contact  page
Route::get('/admin/contact/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/admin/contact/add', [ContactController::class, 'AddContact'])->name('add.contact');
Route::post('/admin/contact/store', [ContactController::class, 'StoreContact'])->name('store.contact');
Route::get('/admin/contact/edit/{id}', [ContactController::class, 'EditContact'])->name('contact.edit');
Route::post('/admin/contact/update/{id}', [ContactController::class, 'UpdateContact'])->name('update.contact');
Route::get('/admin/contact/delete/{id}', [ContactController::class, 'DeleteContact'])->name('delete.contact');
//msg
Route::get('/admin/contact/message', [ContactController::class, 'FontMsg'])->name('admin.message');
Route::get('/admin/message/delete/{id}', [ContactController::class, 'Deletemsg'])->name('delete.message');

// contact transfar in clint side
Route::get('/home/contact', [ContactController::class, 'HomeContact'])->name('contact');
Route::post('/home/form', [ContactController::class, 'ContactForm'])->name('home.ContactForm');



// change password and user profile route 
Route::get('/admin/changepassword', [ChangePasswordController::class, 'Cpassword'])->name('change.password');
Route::post('/password/update', [ChangePasswordController::class, 'PasswordUpdate'])->name('user.profile.update');
//profile update
Route::get('/admin/profile', [ChangePasswordController::class, 'ProfileUpdate'])->name('profile.update');
Route::post('/user/profile/update', [ChangePasswordController::class, 'userProfileUpdate'])->name('user.profile.update');

//menu
Route::get('/admin/menu', [ContactController::class, 'menu'])->name('admin.menu');

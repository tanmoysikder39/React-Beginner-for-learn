<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
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
    return view('home',compact('brands','home_about','services'));
});

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
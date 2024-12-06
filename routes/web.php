<?php

use App\Http\Controllers\BackendController\AccessoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BackendController\CategoryController;
use App\Http\Controllers\BackendController\DiscountCodeController;
use App\Http\Controllers\BackendController\FooterController;
use App\Http\Controllers\BackendController\MenuController;
use App\Http\Controllers\BackendController\ProductController;
use App\Http\Controllers\BackendController\SocialMediaController;
use App\Http\Controllers\BackendController\SpinWheelController;
use App\Models\DiscountCode;
use App\Http\Controllers\Frontend\SpinnerController;

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

Route::get('/', function () {
    return view('Frontend.index');
});


Route::prefix('spine')->name('spine.')->controller(SpinnerController::class)->group(function(){
    route::get('/', 'view')->name('view');
});








Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


// */ Category route */
Route::prefix('category')->name('category.')->controller(CategoryController::class)->group(function(){
    route::get('/', 'view')->name('view');
    route::post('/add', 'insertCategory')->name('store');
    route::get('/all', 'allCategory')->name('all');
    route::get('/edit{categories:id}', 'editCategory')->name('edit');
    route::put('/update{categories:id}', 'updateCategory')->name('update');
    route::delete('/delete{categories:id}', 'deleteCategory')->name('delete');
    route::get('status-update/{categories:id}', 'statusUpdate')->name('status.update');
});

Route::prefix('menu')->name('menu.')->controller(MenuController::class)->group(function(){
    route::get('/', 'view')->name('view');
    route::post('/add', 'insertNav')->name('store');
    route::get('/all', 'allNav')->name('all');
    route::get('/edit{menus:id}', 'editMenu')->name('edit');
    route::put('/update{menus:id}', 'updateNav')->name('update');
    route::delete('/delete{menus:id}', 'deleteNav')->name('delete');
});
Route::prefix('logo')->name('logo.')->controller(MenuController::class)->group(function(){
    route::get('/', 'viewlogo')->name('view');
    route::post('/add', 'storelogo')->name('store');
    route::put('/update{logo:id}', 'updatelogo')->name('update');
});

Route::prefix('social')->name('social.')->controller(SocialMediaController::class)->group(function(){
    route::get('/', 'view')->name('view');
    route::post('/add', 'insert')->name('store');
    route::put('/update{socials:id}', 'update')->name('update');
});
Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function(){
    route::get('/', 'view')->name('view');
    route::post('/add', 'insert')->name('store');
    route::get('/all', 'allProduct')->name('all');
    route::get('/edit/{cars:id}', 'editProduct')->name('edit');
    route::put('/update/{cars:id}', 'updateProduct')->name('update');
    route::get('status-update/{cars:id}', 'statusUpdate')->name('status.update');
    route::delete('/delete{cars:id}', 'deleteCar')->name('delete');
    route::get('/gallary-image-delete/{images:id}', 'GallarydeleteImage')->name('gallary.image.delete');
});

Route::prefix('accessory')->name('accessory.')->controller(AccessoryController::class)->group(function(){
    route::get('/', 'view')->name('view');
    route::post('/add', 'insert')->name('store');
    route::get('/all', 'allAccessory')->name('all');
    route::get('status-update/{accessories:id}', 'statusUpdate')->name('status.update');
    route::get('/edit/{accessories:id}', 'editAccessory')->name('edit');
    route::put('/update/{accessories:id}', 'updateAccessory')->name('update');
    route::delete('/delete{accessories:id}', 'deleteAccessory')->name('delete');

});
Route::prefix('discount-code')->name('discount.code.')->controller(DiscountCodeController::class)->group(function(){
    route::get('/', 'view')->name('view');
    route::post('/add', 'insert')->name('store');
    route::get('/all', 'allDiscountCode')->name('all');

    route::get('status-update/{discounts:id}', 'statusUpdate')->name('status.update');
    route::get('/edit/{discounts:id}', 'editdiscountCode')->name('edit');
    route::put('/update/{discounts:id}', 'updateDiscountCode')->name('update');
    route::delete('/delete{discounts:id}', 'deleteDiscountCode')->name('delete');
});














Route::prefix('footer')->name('footer.')->controller(FooterController::class)->group(function(){
    route::get('/', 'view')->name('view');
    route::post('/add', 'insert')->name('store');
    route::put('/update{footer:id}', 'update')->name('update');
});


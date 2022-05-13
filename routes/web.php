<?php

use App\Http\Livewire\AccesoriesShop;
use App\Http\Livewire\Account;
use App\Http\Livewire\AccountRegister;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\FemaleShop;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\KidShop;
use App\Http\Livewire\MaleShop;
use App\Http\Livewire\NewsShop;
use App\Http\Livewire\User\UserDashboardComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeComponent::class);

//----------------LOGIN/REGISTER---------------

/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/

// For User/Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});

//For Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
});

//--------------------------------------

//-----------------Shop Pages------------   

Route::get('/news', NewsShop::class);

Route::get('/men',MaleShop::class);

Route::get('/women', FemaleShop::class);

Route::get('/kid',KidShop::class);

Route::get('/accessories',AccesoriesShop::class);

Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');

//--------------------------------------


//Detail Product
Route::get('product/{slug}',DetailsComponent::class)->name('product.details');

//Cart
Route::get('/cart', CartComponent::class)->name('product.cart');
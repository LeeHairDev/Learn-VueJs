<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Contracts\Container\ BindingResolutionException; 
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return redirect('products');
    return view('welcome');
});


// Route::get('products', [ProductController::class, 'index']);
// Route::post('/products', [ProductController::class, 'store']);
// Route::get('/products/{product}', [ProductController::class, 'show']);
// Route::put('/products/{product}', [ProductController::class, 'update']);
// Route::delete('/products/{product}', [ProductController::class, 'destroy']);



// Route::get('/categories', function () {
//     $categories = Category::orderBy('name')->get();
//     return CategoryResource::collection($categories);
// });
<?php

use App\Http\Controllers\ProfileController;
use Faker\Provider\Lorem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\product;


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

Route::resource("products",ProductController::class);


Route::get('/', function () {
    return view('welcome');


   // return \App\Models\Product::paginate(1);

   // dd($product[1]->name);

   // return $product;

    /*$product = new \App\Models\product();
    $product->name = 'Produit 3';
    $product->price = 10;
    $product->description = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis eaque, cumque cum,
     nam sequi a nisi laudantium reiciendis debitis obcaecati id eligendi blanditiis explicabo autem saepe placeat repellat
     magnam assumenda.';
     $product->quantity = 200;
     $product->save();

     return $product;
     */
    //return view('tp\index')
    //   ->with ('id', 1)
    //    ->with ('name', 'Produit 1')
    //    ->with ('description', 'Lorem ipsum dolor sit amet')
    //    ->with ('price', 10)
    //    ->with ('quantity', 200);
        //->with $product

});

Route::get('/tp/{id}', function (string $id,) {
    $product = \App\Models\product::find($id);
    return $product;
})->name('show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

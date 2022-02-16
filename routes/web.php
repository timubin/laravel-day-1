<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
// use Illuminate\Support\Facades\DB;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    echo "<h1>Sorry you are adult</h1> <a href='/'>Back to home</a>";
});

Route::get('/about',[AboutController::class, 'aboutus']);


//Category Controller

Route::get('/all/category', [CategoryController::class, 'allCat'])->name('all.category');

Route::post('/add/category', [CategoryController::class, 'addCat'])->name('add.category');

Route::get('edit/category/{id}', [CategoryController::class, 'editCat']);
Route::post('update/category/{id}', [CategoryController::class, 'updateCat']);
Route::get('softdelete/category/{id}', [CategoryController::class, 'softDeleteCat']);
Route::get('pdelete/category/{id}', [CategoryController::class, 'softDeleteCat']);
Route::get('/blog', function () {
    return '<h1>This is blog page</h1> <a href="/">Back to home</a>';
});

Route::get('/contact', function () {
    return '<h1>This is contact page</h1> <a href="/">Back to home</a>';
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/user', [UserController::class, 'index'])->middleware('age');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
   $users = User::all();
   /* $users = DB::table('user')->get(); */
    return view('dashboard', compact('users'));
})->name('dashboard');

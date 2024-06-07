<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


// Contact route
Route::get('/contact', function () {
    return 'Username : Akshit Mehta';
});


// heading route
Route::get('/heading', function () {
    return 'Laravel makes it easy to develop websites!';
});


// ID route
Route::get('/uid/{id}', function ($id) {
    return 'ID: ' . $id;
})->where('id', '[0-9]+');

// Route Group
Route::group(['prefix' => '/', 'middleware' => [], 'as' => ''], function () {

    // Route from Step 8
    Route::get('/users/{name?}', function ($name = 'batman') {
        $Name = urldecode($name);
        if (ctype_alpha(str_replace(' ', '', $Name))) {
            return 'Name: ' . $Name;
        } else {
            return 'Invalid name format';
        }
    })->where('name', '[A-Za-z ]*')->name('users.show');

    // users route
    Route::get('/users/{name?}/images/{image}', function ($name = 'batman', $image) {
        $Name = urldecode($name);
        if (ctype_digit($image)) {
            return 'Name: ' . $Name . ' Image: ' . $image;
        } else {
            return 'Invalid image format';
        }
    })->where(['name' => '[A-Za-z ]*', 'image' => '[0-9]+'])->name('users.images.show');

});

//Week 2 Routes
Route::get('aboutme', function (){
    $name =['fullName' => 'Akshit Mehta'];
    return view('pages.about')->with($name);
})->name('aboutme.show');

Route::get('aboutme', function (){
    $fullName = "Akshit Mehta";
    return view('pages.about', compact("fullName"));
})->name('aboutme.show');



Route::get('thingsiknow', function (){
    $languages = ['Machine Learning','Python','JavaScript','c#','PHP','C++'];
    return view('pages.langs', compact('languages'));
})->name('thingsiknow.show');

Route::get('contact', function (){
    $email = ['email'=> 'AM323@myscc.ca'];
    return view('pages/contact')->with ($email);
})->name('contact');


// Week 3

/*
Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');

Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');

Route::get('articles', [ArticleController::class,'index'])->name('articles.index');

Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// week 5

Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');

Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');


//week 4

Route::get('categories', [CategoryController::class,'index'])->name('categories.index');

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

Route::patch('categories/{category}/', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
*/

Route::get('categories/manage', [CategoryController::class, 'manage'])->name('categories.manage');

Route::get('categories/{category}/forcedelete', [CategoryController::class, 'forcedelete'])->name('categories.forcedelete');

Route::get('categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');

Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\BackOfficeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/', function () {
    return view('welcome');
});

Route::get(('about'), function () {
    $title = 'About Us';
    return view('about', compact('title'));
});

Route::get('/contact', function () {
    $name = "Contact";
    $age = 20;
    $salary = 1000;
    return view('contact', compact('name', 'age', 'salary'));
});

Route::get('/profile', function () {
    return view('profile', ['name' => 'John Doe', 'age' => 30, 'salary' => 5000]);
});

Route::get('/params/{name}/{age}/{salary}', function ($name, $age, $salary) {
    return view('params', compact('name', 'age', 'salary'));
});

Route::get('/post', function () {
    return view('post');
});

Route::post('/post', function (Request $request) {
    $name = $request->name;
    return json_encode(['name' => $name]);
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/response', function () {
    return response()->json(['name' => 'John Doe']);
});

Route::get(('/products'), function () {
    $products = [
        ['id' => 1, 'name' => 'Product 1', 'price' => 100],
        ['id' => 2, 'name' => 'Product 2', 'price' => 200],
        ['id' => 3, 'name' => 'Product 3', 'price' => 300],
    ];

    return response()->json($products);
});

Route::get('/response-type', function () {

    // 401 = Unauthorized
    // 403 = Forbidden
    // 404 = Not Found
    // 500 = Internal Server Error
    // 200 = OK
    // 201 = Created
    // 202 = Accepted
    // 204 = No Content

    return response('Unauthorized', 401);
});


Route::get('/redirect', function () {
    return response()->json(['message' => 'Target']);
});

$customerController = CustomerController::class;

Route::get('/customers', [$customerController, 'list']);
Route::get('/customers/{id}', [$customerController, 'detail']);
Route::post('/customers', [$customerController, 'create']);
Route::put('/customers/{id}', [$customerController, 'update']);
Route::delete('/customers/{id}', [$customerController, 'delete']);

// Route with controller User
$userController = new UserController();

Route::get('/users/list', [UserController::class, 'list']);
Route::get('/users/form', [UserController::class, 'form']);
Route::post('/users', [UserController::class, 'create']);
Route::get('users/{id}', [UserController::class, 'edit']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/remove/{id}', [UserController::class, 'remove']);

// user sign in
Route::get('/user/signIn', [UserController::class, 'signIn']);
Route::post('/user/signInProcess', [UserController::class, 'signInProcess']);
Route::get('/user/signOut', [UserController::class, 'signOut'])->middleware(EnsureTokenIsValid::class);
Route::get('/user/info', [UserController::class, 'info'])->middleware(EnsureTokenIsValid::class);


// back Office
Route::get('/backoffice', [BackOfficeController::class, 'index'])->middleware(EnsureTokenIsValid::class);


// Product
Route::get('/product/list', [ProductController::class, 'list']);
Route::get('/product/form', [ProductController::class, 'form']);
Route::post('/product', [ProductController::class, 'save']);
Route::get('/product/{id}', [ProductController::class, 'edit']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::get('/product/remove/{id}', [ProductController::class, 'remove']);

Route::post('/product/search', [ProductController::class, 'search']);
Route::get('/product-sort', [ProductController::class, 'sort']);
Route::get('/product-price-more-than', [ProductController::class, 'priceMoreThan']);
Route::get('/product-price-less-than', [ProductController::class, 'priceLessThan']);
Route::get('/product-price-between', [ProductController::class, 'priceBetween']);
Route::get('/product-price-not-between', [ProductController::class, 'priceNotBetween']);
Route::get('/product-price-in', [ProductController::class, 'priceIn']);
Route::get('/product-price-max-min-count-avg', [ProductController::class, 'priceMaxMinCountAvg']);

Route::get('/product-type-list', [ProductController::class, 'productTypeList']);
route::get('/list-by-product-type/{productTypeId}', [ProductController::class, 'listByProductType']);


// Livewire
Route::get('/product-type/list', [ProductTypeController::class,'index']);

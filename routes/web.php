<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\ItemController;

use App\Models\Category;
use App\Models\Storage;
use App\Models\Item;


// Main layout route
Route::get('/', function () {
    return view('app'); // main page with sidebar and empty content
});

// Dynamic page loading with optional data injection
Route::get('/load-content/{page}', function ($page) {
    $allowedPages = ['home', 'storage', 'item', 'category', 'category-add', 'storage-add', 'item-add'];

    if (!in_array($page, $allowedPages)) {
        abort(404);
    }

    $viewPath = "partials.$page";

    if (!view()->exists($viewPath)) {
        abort(404);
    }

    switch ($page) {
        case 'category':
            $categories = \App\Models\Category::paginate(5);
            return view($viewPath, compact('categories'));

        case 'storage':
            $storages = \App\Models\Storage::paginate(5);
            return view($viewPath, compact('storages'));

        case 'item':
            $items = \App\Models\Item::paginate(5);
            return view($viewPath, compact('items'));

        case 'item-add':
            $categories = \App\Models\Category::all();
            $storages = \App\Models\Storage::all();
            return view($viewPath, compact('categories', 'storages'));

        default:
            return view($viewPath);
    }
});





// CATEGORY CRUD
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category/store', [CategoryController::class, 'store']);
Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);
Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy']);

// STORAGE CRUD
Route::get('/storage', [StorageController::class, 'index']);
Route::post('/storage/store', [StorageController::class, 'store']);
Route::get('/storage/edit/{id}', [StorageController::class, 'edit']);
Route::post('/storage/update/{id}', [StorageController::class, 'update']);
Route::get('/storage/destroy/{id}', [StorageController::class, 'destroy']);

// ITEM CRUD
Route::get('/item', [ItemController::class, 'index']);
Route::post('/item/store', [ItemController::class, 'store']);
Route::get('/item/edit/{id}', [ItemController::class, 'edit']);
Route::post('/item/update/{id}', [ItemController::class, 'update']);
Route::get('/item/destroy/{id}', [ItemController::class, 'destroy']);
 
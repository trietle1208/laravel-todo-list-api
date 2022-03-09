<?php

use App\Http\Controllers\API\ProductController;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TodoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/index', [TodoController::class, 'index']);
// Route::post('/addTask', [TodoController::class, 'addTask']);
// Route::post('/deleteTask', [TodoController::class, 'deleteTask']);
// Route::post('/deleteAllTask', [TodoController::class, 'deleteAllTask']);
// Route::post('/checkAll', [TodoController::class, 'checkAll']);
// Route::post('/doneAllTask', [TodoController::class, 'doneAllTask']);

Route::prefix('todo')->group(function () {
    Route::get('/index', [TodoController::class, 'index']);
    Route::post('/addTask', [TodoController::class, 'addTask']);
    Route::post('/deleteTask', [TodoController::class, 'deleteTask']);
    Route::post('/deleteAllTask', [TodoController::class, 'deleteAllTask']);
    Route::post('/checkAll', [TodoController::class, 'checkAll']);
    Route::post('/doneAllTask', [TodoController::class, 'doneAllTask']);
});

Route::prefix('product')->group(function () {
    Route::get('/index', [ProductController::class, 'index']);
    Route::post('/addProduct', [ProductController::class, 'addProduct']);
    Route::delete('/deleteProduct/{id}', [ProductController::class, 'deleteProduct']);
    Route::get('/getProduct/{id}', [ProductController::class, 'getProduct']);
    Route::put('/updateProduct/{id}', [ProductController::class, 'updateProduct']);
});

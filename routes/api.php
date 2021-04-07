<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\AuthorController;
use \App\Http\Controllers\GenreController;
use \App\Http\Controllers\PublisherController;
use \App\Http\Controllers\ReaderController;
use \App\Http\Controllers\BookController;
use \App\Http\Controllers\BorrowedController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'authors'           => AuthorController::class,
    'genres'            => GenreController::class,
    'publishers'        => PublisherController::class,
    'readers'           => ReaderController::class,
    'books'             => BookController::class,
    'borrowed'          => BorrowedController::class,
]);


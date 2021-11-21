<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('members', MemberController::class);
Route::get('members/search/{person}', [MemberController::class, 'search']);

Route::resource('books', BookController::class);
Route::get('books/search/{item}', [BookController::class, 'searchBooks']);

Route::resource('loans', LoanController::class);
Route::get('loans/search/{search}', [LoanController::class, 'searchLoans']);

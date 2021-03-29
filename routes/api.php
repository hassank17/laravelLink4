<?php

// use App\Models\Post;
// use App\Models\Company;
use App\Http\Controllers\PostsApiController;
use App\Http\Controllers\CompaniesApiController;
use App\Http\Controllers\Auth\ApiAuthController;


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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
    //     return $request->user();
    // });
    
    
    Route::get('/posts', [PostsApiController::class, 'index']);
    Route::post('/posts', [PostsApiController::class, 'store']);
    Route::put('/posts/{post}', [PostsApiController::class, 'update']);
    Route::delete('/posts/{post}', [PostsApiController::class, 'destroy']);
    
    
    Route::get('/companies', [CompaniesApiController::class, 'index']);
    Route::post('/companies', [CompaniesApiController::class, 'store']);
    Route::put('/companies/{company}', [CompaniesApiController::class, 'update']);
    Route::delete('/companies/{company}', [CompaniesApiController::class, 'destroy']);
    
    Route::group(['middleware' => ['cors', 'json.response']], function () {
        // Public Route
        Route::post('/login', 'App\Http\Controllers\Auth\ApiAuthController@login')->name('login.api');
        Route::post('/register','App\Http\Controllers\Auth\ApiAuthController@register')->name('register.api');
        //Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');
    });
    
    Route::middleware('auth:api')->group(function () {
        // our routes to be protected will go in here
        Route::get('/me', 'App\Http\Controllers\Auth\ApiAuthController@me')->name('me.api');
        Route::post('/logout', 'App\Http\Controllers\Auth\ApiAuthController@logout')->name('logout.api');
    });
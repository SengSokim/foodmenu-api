<?php

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');

    /**
     * Forget Password
     */
    Route::group(['prefix' => 'forgot_password'], function () {
        Route::post('/', 'AuthController@forgotPassword');
        Route::post('/verify', 'AuthController@verify');
        Route::post('/reset', 'AuthController@forgotPasswordReset');
    });
});

Route::group(['middleware' => ['auth.multi:users']], function () {
    /**
     * Profile and Updates
     */
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'ProfileController@get');
        Route::post('/', 'ProfileController@update');
        Route::post('/password', 'ProfileController@updatePassword');
    });

    /**
     * Dashboard
     */
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/dashboard_count', 'DashboardController@index');
        Route::get('/daily_order/{year}/{month}', 'ChartController@dailyOrder');
        Route::get('/monthly_order/{year}', 'ChartController@monthlyOrder');
    });

    /**
     * Users
     */
    Route::group(['prefix' => 'users'], function () {
        Route::get('/list/all', 'UserController@list_all');
        Route::get('/list', 'UserController@list');
        Route::get('/show/{id}', 'UserController@show');
        Route::post('/create', 'UserController@create');
        Route::post('/update/{id}', 'UserController@update');
        Route::post('/update_password/{id}', 'UserController@updatePassword');
        Route::post('/delete/{id}', 'UserController@delete');
    });

    /**
     * Role
     */
    Route::group(['prefix' => 'role'], function () {
        Route::get('/list/all', 'RoleController@listAll');
        Route::get('/list', 'RoleController@list');
        Route::post('/create', 'RoleController@create');
        Route::get('/show/{id}', 'RoleController@show');
        Route::post('/update/{id}', 'RoleController@update');
        Route::post('/delete/{id}', 'RoleController@delete');
    });

    /**
     * Order
     */

    Route::group(['prefix' => 'order'], function () {
        Route::get('/list', 'OrderController@list');
        Route::get('/show/{id}', 'OrderController@show');
        Route::post('/update/{id}', 'OrderController@update');
        Route::post('/delete/{id}', 'OrderController@delete');
        Route::post('/remove_product/{id}', 'OrderController@removeProduct');
        Route::post('/update_status/{id}', 'OrderController@updateStatus');

    });

    /**
     * Product
     */
    Route::group(['prefix' => 'product', 'middleware' => ['auth.multi:users']], function () {
        Route::get('/list/all', 'ProductController@listAll');
        Route::get('/list', 'ProductController@list');
        Route::post('/create', 'ProductController@create');
        Route::get('/show/{id}', 'ProductController@show');
        Route::post('/update/{id}', 'ProductController@update');
        Route::post('/delete/{id}', 'ProductController@delete');
        Route::post('/status/{id}', 'ProductController@status');

    });
    /**
     * Category
     */
    Route::group(['prefix' => 'category', 'middleware' => ['auth.multi:users']], function () {
        Route::get('/list/all', 'CategoryController@listAll');
        Route::get('/list', 'CategoryController@list');
        Route::post('/create', 'CategoryController@create');
        Route::get('/show/{id}', 'CategoryController@show');
        Route::post('/update/{id}', 'CategoryController@update');
        Route::post('/delete/{id}', 'CategoryController@delete');
        Route::post('/status/{id}', 'CategoryController@status');
    });
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/list/web', 'CategoryController@listWeb');

});
Route::group(['prefix' => 'order'], function () {
    Route::post('/create', 'OrderController@create');
});

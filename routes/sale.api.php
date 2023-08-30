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

Route::group(['middleware' => ['auth.multi:sales']], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/count', 'DashboardController@DashboardCount');
    });

    /**
     * Sale
     */
    Route::group(['prefix' => 'sale'], function () {
        Route::get('/list/all', 'SaleController@listAll');
    });

    /**
     * Customer
     */
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/list/all', 'CustomerController@listAll');
        Route::get('/list', 'CustomerController@list');
        Route::post('/create', 'CustomerController@create');
        Route::get('/show/{id}', 'CustomerController@show');
        Route::post('/update/{id}', 'CustomerController@update');
        Route::post('/delete/{id}', 'CustomerController@delete');
        Route::post('/status/{id}', 'CustomerController@status');
        Route::get('/view_detail/{id}', 'CustomerController@viewDetail');
        Route::get('/list/status_history/{id}', 'CustomerController@listStatusHistory');
    });

    Route::group(['prefix' => 'customer_document'], function () {
        Route::get('/list/{id}', 'CustomerDocumentController@list');
        Route::post('/create/{id}', 'CustomerDocumentController@create');
        Route::post('/update/{id}', 'CustomerDocumentController@update');
        Route::post('/delete/{id}', 'CustomerDocumentController@delete');
    });

    Route::group(['prefix' => 'customer_note'], function () {
        Route::get('/list/{id}', 'CustomerNoteController@list');
        Route::post('/create/{id}', 'CustomerNoteController@create');
        Route::post('/update/{id}', 'CustomerNoteController@update');
        Route::post('/delete/{id}', 'CustomerNoteController@delete');
    });
    /**
     * Order
     */
    Route::group(['prefix' => 'order'], function () {
        Route::get('/list', 'OrderController@list');
        Route::post('/create', 'OrderController@create');
        Route::get('/show/{id}', 'OrderController@show');
        Route::post('/update/{id}', 'OrderController@update');
        Route::post('/delete/{id}', 'OrderController@delete');
        Route::post('/status/{id}', 'OrderController@status');
        Route::get('/view_detail/{id}', 'OrderController@viewDetail');
        Route::get('/list/status_history/{id}', 'OrderController@listStatusHistory');
        Route::post('/update_total/{id}', 'OrderController@updateTotalOrder');
        Route::get('/list/total_order/{id}', 'OrderController@listOrdePricerHistory');
        Route::post('/upload/new_file/{id}', 'OrderController@uploadNewFile');
    });

    Route::group(['prefix' => 'order_document'], function () {
        Route::get('/list/{id}', 'OrderDocumentController@list');
        Route::post('/create/{id}', 'OrderDocumentController@create');
        Route::post('/update/{id}', 'OrderDocumentController@update');
        Route::post('/delete/{id}', 'OrderDocumentController@delete');
    });

    Route::group(['prefix' => 'order_note'], function () {
        Route::get('/list/{id}', 'OrderNoteController@list');
        Route::post('/create/{id}', 'OrderNoteController@create');
    });
});

<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'Api/v1',
    'middleware' => 'auth:api'
    ], function () {
        Route::post('order_one', 'OrderController@postOrderOne');
        Route::post('order_two', 'OrderController@postOrderTwo');
        Route::post('order_tree', 'OrderController@postOrderTree');
});

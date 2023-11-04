<?php

use Illuminate\Http\Request;

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
    return view('welcome');
//    return $request->user();
});
// all meeting API
// 会议室列表 -
Route::get('/room/lists', 'ApiController@getRoomLists');
// 会议室详情
Route::get('/room/getRoom/{id}', 'ApiController@getRoom');
// 预定会议室
Route::post('/room/orderroom/{id}', 'ApiController@orderRoom');
// 退订会议室
Route::post('/room/unsubscribroom/{id}', 'ApiController@unsubscribRoom');

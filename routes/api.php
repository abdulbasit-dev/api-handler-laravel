<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post("/login", "Api\AuthController@login");

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::get("/my_posts", "Api\UserController@index");
    Route::get("/logout", "Api\AuthController@logout");
});

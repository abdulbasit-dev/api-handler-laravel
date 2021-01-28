<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post("/login", "Api\AuthController@login");

Route::resource('users', 'Api\UserController');





Route::group(['middleware' => ['jwt.auth']], function () {
    Route::get("/my_posts", "Api\UserPostController@index");
    Route::get("/logout", "Api\AuthController@logout");
});

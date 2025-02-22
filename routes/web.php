<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//service Container
Route::get('test-container', function (Request $request){
    $input = $request->input(('key'));
    return $input;
});

//service Providers
Route::get('/test-provider', function(UserService $userService){
    dd($userService->ListUsers());
});

//service Provider
Route::get('/test-users', [UserController::class, 'index']);

//service facades
Route::get('/test-facades', function (UserService $userService){
     dd(Response::json($userService->ListUsers()));
});
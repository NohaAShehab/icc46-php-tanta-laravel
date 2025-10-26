<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// create new controller --> will add the functionalities I need to
// postman to test apis

// php artisan make:controller API/CourseController --model=Course --api
use App\Http\Controllers\API\CourseController;
Route::apiResource('courses',CourseController::class );

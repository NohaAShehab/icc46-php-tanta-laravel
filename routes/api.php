<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Validation\ValidationException;

// if there is logged in user --> return with current user ?
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// create new controller --> will add the functionalities I need to
// postman to test apis

// php artisan make:controller API/CourseController --model=Course --api
use App\Http\Controllers\API\CourseController;
Route::apiResource('courses',CourseController::class );

/**
// create new route for login
Route::post("/login", function (Request $request) {
   # take from the request, email, password
    $email =  $request->input('email');
    $password =  $request->input('password');
//    return ["email" => $email, "password" => $password];

    $user = User::where("email", $email)->first();
    // then compare user password with input password
    if(! $user || ! Hash::check($password, $user->password)) {
        throw ValidationException::withMessages([
            "email" => ["The provided credentials are incorrect."],
        ]);
    }

    // if exists ??
    // create new token --> saving in the db, return with it to the user
    #
    return $user->createToken("iphone")->plainTextToken;
});



Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});
**/

Route::post("/login", [AuthController::class , 'login']);
Route::post("/logout", [AuthController::class , 'logout'])->middleware('auth:sanctum');
Route::post("/logoutFromAll", [AuthController::class , 'logoutFromAll'])->middleware('auth:sanctum');

// define maxi. number of tokens
// I need logout -->

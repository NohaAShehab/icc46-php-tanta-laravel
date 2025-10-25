<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\ValiDMinThreeCharString;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/***
 *
 * http requests --> use request methods
 * -> get
 * -> post
 * -> put
 * -> delete
 */

/**
 * define new route ??
 *
 */

Route::get("/hello", function () {
    return "Hello world ya PHP ";
});

# restrict the type of the url parameter ?
Route::get("num/{num}", function ($num) {
    $num += 10;
    return "<h1 style='color: blue; text-align: center;'> You entered {$num} </h1>";

})->where("num", "[0-9]+");

use App\Http\Controllers\ITIController;




Route::get("/test/test", [ITIController::class, "getTest"]);





# adding names to the url ?
Route::get("/students", [StudentController::class, "index"])->name("students.index");
Route::get("/students/create", [StudentController::class, "create"])->name("students.create");
Route::get("/students/{id}", [StudentController::class, "show"])
    ->where("id", "[0-9]+")->name("students.show");
Route::delete('/students/{id}', [StudentController::class, "destroy"])->whereNumber("id")
    ->name("students.destroy");

# save new data to the server ?? create new object

Route::post("/students", [StudentController::class, "store"])->middleware(ValiDMinThreeCharString::class)
    ->name('students.store');

Route::resource("/courses", CourseController::class);
# generate routes for the controller functions ??
//php artisan route:list

















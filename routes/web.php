<?php

use Illuminate\Support\Facades\Route;

Route::get('/',
// this is the controller function ??
    function () {
        return view('welcome');
    }

);


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

Route::get("/hello", function(){
    return "Hello world ya PHP ";
});
// php is interpreted language -> when you try to invoke page --> interpreter scan line by line web.php

// What do you mean by validation ?

// take parament from url , url --> changeable part.?


# restrict the type of the url parameter ?
Route::get("num/{num}", function($num){
    $num += 10;
    return "<h1 style='color: blue; text-align: center;'> You entered {$num} </h1>";

})->where("num", "[0-9]+");


// Route::get("/{var}", function($var){

//     return "<h1 style='color: red; text-align: center;'> You entered {$var} </h1>";
// });


// I need to organize this file
// we need to move to the controller folder and create controller class

/**
 * to create controller class
 * option 1: 1- make file --> extend from controller class
 * option 2: 2- use php artisan make:controller NameController
 *
 * php artisan make:controller ITIController
 * --> you should make controllername singular and capital letter at the beginning
 *
 * --> StudentController
 */

// I need to call the printVariable function from the ITIController class
use App\Http\Controllers\ITIController;

// Route::get("/{var}", [ITIController::class, 'printVariable']);
# scope binding  ==> I need printvariable function


Route::get("/test/test", [ITIController::class, "getTest"]);

//

// create 3 pages index, create student, show student ?
// create controller --> group functions students
// php artisan make:controller StudentController

use App\Http\Controllers\StudentController;
# adding names to the url ?
Route::get("/students", [StudentController::class, "index"])->name("students.index");
Route::get("/students/create", [StudentController::class, "create"])->name("students.create");
Route::get("/students/{id}", [StudentController::class, "show"])
    ->where("id", "[0-9]+")->name("students.show");

# delete operation mustn't be executed with get request >>> You need more complex operation
//Route::get('/students/{id}/delete', [StudentController::class, "destroy"])->whereNumber("id")
//    ->name("students.destroy");
# delete , post ?
# you must use form to use these methods ?
Route::delete('/students/{id}', [StudentController::class, "destroy"])->whereNumber("id")
    ->name("students.destroy");

# save new data to the server ?? create new object
Route::post("/students", [StudentController::class, "store"])->name('students.store');



/// if you are using resource controller , you can generate all the required routes
/// in one line ?
///
use App\Http\Controllers\CourseController;
Route::resource("/courses", CourseController::class);
# generate routes for the controller functions ??
//php artisan route:list


















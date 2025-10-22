<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    //
    private $students = [
        ["id"=>1, "name"=> "Ahmed", "age"=> 22, "image"=> "ahmed.jpg"],
        ["id"=>2, "name"=> "Sara", "age"=> 21, "image"=> "sara.jpg"],
        ["id"=>3, "name"=> "Omar", "age"=> 23, "image"=> "omar.jpg"],
        ["id"=>4, "name"=> "Mona", "age"=> 20, "image"=> "mona.jpg"],
        ["id"=>5, "name"=> "Youssef", "age"=> 24, "image"=> "youssef.jpg"]
    ];

    function index(){
        /**
         * using query builder return array of objects --> so you need to changes views to deal with student
         * as object not an array
         * $students = DB::table('students')->get();  # return with array of std objects
        */

        // method2 --> get data using Model ??
        $students = Student::all(); # select * from students;
        # views can deal with model object either as an array or object ?
//        dd($students); # array of objects  from type StudentModel  -->
        # get data from db ?
        return view('students.index', ["students"=> $students]);
    }
    function create(){
        // return "create student";
        return view("students.create");
    }

    function show($id){
        $student = Student::findOrFail($id);
        return view('students.show', ['student' => $student]);
    }

    // delete object --> get object orm will do the task ?
    function destroy($id){
        $student = Student::findOrFail($id);

        if ($student-> image){
            $this->deleteImage($student->image);
        }
        $student->delete();
        return to_route('students.index');
    }

    function store(){

        // before you store object we need to validate data ???

        $request_data= request();  # prepare data to the db >> trim extra spaces, convert empty string to null
       // you can validate request data before completeting to the next step ?
        request()->validate(
            // rules
            [
            "name"=>"min:2|max:10",
            "email"=>"email|unique:students",
            "grade"=>"max:100"
        ],
            // customize error message ?
            [
            "name.min"=> "Student name must be at least 2 chars",
                "email.unique"=> "Student with this email already exist",
        ]);


        // you access the body of the request >? via calling request
        $name = request('name');
        $date_of_birth = request('date_of_birth');
        $email = request('email');
        $grade = request('grade');
        $gender = request('gender');

        // save image in server --> external storage
        // I need to check if image is uploaded or not ??
        ## $_FILES
        $image=  request('image');
        $image_name = null;
        if($image){
            $image_name=$this->uploadImage($image);
        }

        # create new object form model --> can be used to save new record in db ?

        $student = new Student();
        $student->name = $name;
        $student->email = $email;
        $student->image = $image_name;
        $student->date_of_birth = $date_of_birth;
        $student->grade = $grade;
        $student->gender = $gender;
        # save object to the db ?
        $student->save();
//        return to_route('students.index');
        return to_route("students.show", $student->id);


    }

    // we need create link for storage
    // php artisan storage:link
    private  function uploadImage( $imageObject){
        $image_name= now()->format('Ymd_His') . '.' . $imageObject->getClientOriginalExtension();
        $imageObject->
        storeAs('students', $image_name, 'public');
        return "students/{$image_name}";
    }

    private function deleteImage($imageName){
        Storage::disk('public')-> delete($imageName);
    }
}

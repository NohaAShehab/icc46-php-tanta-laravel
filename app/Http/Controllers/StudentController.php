<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;

class StudentController extends Controller
{
    //
    function index(){

        $students = Student::all(); # select * from students;
        return view('students.index', ["students"=> $students]);
    }
    function create(){
        // return "create student";
        $courses = Course::all();
        return view("students.create", ["courses"=>$courses]);
    }

    function show($id){
        $student = Student::findOrFail($id);
        /// get course name -->and send it to the view ??
        $course=  Course::find($student->course_id);

        return view('students.show', ['student' => $student, 'course'=>$course]);
    }

    function edit($id){
        $student = Student::findOrFail($id);
        $courses = Course::all();
        return view('students.edit', ['student' => $student, 'courses' => $courses]);
    }

    function update(StudentUpdateRequest $request, $id){
        $student = Student::findOrFail($id);

        $request_data = $request->validated();
        $image=  request('image');
        // Handle image upload if new image is provided
        $image_name = null;
        if($image){
            $image_name=$this->uploadImage($image);
        }
        $request_data["image"]=$image_name;
        $student->update($request_data);

        return to_route("students.show", $student->id)
            ->with('success', 'Student updated successfully!');
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

    function store(StudentStoreRequest $request ){
        // apply some login on data
        // dd($request->all(), $_POST);

//        dd($request->user());
        // save image in server --> external storage
        // I need to check if image is uploaded or not ??
        ## $_FILES
        $image=  request('image');
        $image_name = null;
        if($image){
            $image_name=$this->uploadImage($image);
        }

        # create new object form model --> can be used to save new record in db ?
        $request_data = $request->validated(); # return with validated data
        $request_data['image']= $image_name;
//        $owner_id = $request->user()->id;
        $owner_id = Auth::id();
        $request_data['owner_id']= $owner_id;
        $student =Student::create($request_data);

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

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use http\Env\Response;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Course::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        //
        $request_data = $request->all();
        $request_data['image']= $this->uploadImage($request);
        $course = Course::create($request_data);
//        return $request->all();
        return response()->json($course, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
        return $course;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
        $course->update($request->all());
        return $course;
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
        $course->delete();
        return response('deleted', 204)
            ->header('Content-Type', 'text/plain');

    }

    private function uploadImage($request){
        if($request->hasFile("image")){
            $image = $request->file("image");
            $extension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image->storeAs("courses", $imageName, 'coursesImages');
            return "courses/{$imageName}";

        }
        return null;
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Resources\CourseResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //return Course::all();
        // return with collection of objects ?
        return CourseResource::collection(Course::all());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        return $request->url();
        //
        $request_data = $request->all();
        $request_data['image']= $this->uploadImage($request);
        $course = Course::create($request_data);
//        return $request->all();
//        return response()->json($course, 201);
        return new CourseResource($course);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
//        return $course;
        # use the resource class ?
        return new CourseResource($course); # bind data to the resource class ?
        /**
         * if object hasn't image not send key
         * if($course->image){
         *     // send resource A
         * }elsE{
         *     /// send resource B
         * }
         */

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {

        $request_data = $request->all();
        //
        if($request->image){
            $request_data['image']= $this->uploadImage($request);
            $this->deleteImage($course->image);

        }
        $course->update($request_data);
        return new CourseResource($course);
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
    private function deleteImage($imageName){
        Storage::disk('public')-> delete($imageName);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCourseRequest;


class CourseController extends Controller implements  HasMiddleware
{
    // here you can assign the middlewares you need to the routes
    public static function middleware(): array
    {
        return [
            new Middleware('validString', only: ['store']),
            new Middleware('auth', only: ['update', 'destroy', "store"]),
        ];
    }
//
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::all();
        return view("courses.index", compact("courses"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("courses.create");
    }


    /**
     *
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {

        $request_data = $request->all();
        $request_data['image']= $this->uploadImage($request);
        $request_data["created_by"]= Auth::id();
        $course = Course::create($request_data);
        return to_route("courses.show", $course->id);
    }

    /**
     * Display the specified resource.
     * Get object associated with id
     */
    public function show(Course $course)
    {
        return $course;
        return view("courses.show", ["course"=>$course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view("courses.edit", compact("course"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        Gate::authorize('update', $course);

        // The action is authorized...
        $request->validate([
            "name" => "required|unique:courses,name," . $course->id,
            "description" => "min:3"
        ]);

        $request_data = $request->all();

        // Handle image upload if new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($course->image) {
                $this->deleteImage($course->image);
            }
            $request_data['image'] = $this->uploadImage($request);
        } else {
            // Keep existing image if no new image uploaded
            $request_data['image'] = $course->image;
        }

        $course->update($request_data);

        return to_route("courses.show", $course->id)
            ->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if (! Gate::allows('destroy-course', $course)) {
            abort(403);
        }
        // delete image
        if ($course-> image){
            $this->deleteImage($course->image);
        }
        $course->delete();
        return to_route('courses.index');
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

    public function apiIndex(){
        return Course::all(); // array of course model object
        // laravel serialization for the data ---> stream ...
    }
}

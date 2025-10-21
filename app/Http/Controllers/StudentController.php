<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // seprate logic from presentation
         // I want to replace this  page with html page ?
        // return $this->students;
        # you can send parameters to the view
        return view('students.index', ["students"=> $this->students]);
    }
    function create(){
        // return "create student";
        return view("students.create");
    }

    function show($id){
        // return $this->students[$id];
       $res =  array_filter($this->students, function($student) use($id){
            return $student["id"] == $id;
        });
        dd($res);
        if ($res){
            return array_values($res)[0];
        }
        return abort(404);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    # I need to allow mass assignment here
    # Add [name] to fillable property to allow mass assignment on [App\Models\Course].
    protected $fillable = ["name", "price", "description", "image", 'created_by'];

    # define the relation in Courses ?
    # this course has many students ?
    function students(){
        return $this->hasMany(Student::class);
    }

    function creator(){
        return $this->belongsTo(User::class, "created_by");
    }

}

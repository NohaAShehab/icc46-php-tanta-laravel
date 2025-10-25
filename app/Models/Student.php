<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected  $fillable=['name', "email", 'grade', "image", "course_id", "date_of_birth", "gender"];
    //
    /// student has only one course
    // define relation
    function course(){
      return $this->belongsTo(Course::class);
    }
}

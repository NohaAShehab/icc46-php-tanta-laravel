<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    /// student has only one course
    // define relation
    function course(){
      return $this->belongsTo(Course::class);
    }
}

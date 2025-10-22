<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    # I need to allow mass assignment here
    # Add [name] to fillable property to allow mass assignment on [App\Models\Course].
    protected $fillable = ["name", "price", "description", "image"];


}

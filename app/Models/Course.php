<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;


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
    // access attribute of object
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }

    // model contain the full info about resource -->  full image poth of the image
    protected function image(): Attribute{

        return Attribute::make(
            get: fn ($value) => $value? Storage::url($value) : null,
        );

    }
    // accessor --> created_at (4 days age )

}

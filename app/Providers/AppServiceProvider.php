<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Course;

use App\Policies\CoursePolicy;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::define('destroy-course', function (User $user, Course $course) {
            return $user->id === $course->created_by || $user->role == 'admin';
        });

        Gate::define("show-course-students", function (User $user, Course $course) {
            return $user->id === $course->created_by || $user->role == 'admin';
        });

        // register policies

        Gate::policy(Course::class, CoursePolicy::class);



    }
}

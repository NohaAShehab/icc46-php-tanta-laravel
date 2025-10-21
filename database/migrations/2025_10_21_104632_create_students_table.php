<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate
     * when you use create_students_table as name of the migration
     * laravel automatically detects that you will use this file to create table
     * students -->
     */
    public function up(): void
    {
        // id , name , grade, image, email, age, gender
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email")->nullable();
            $table->string("image")->nullable();
            $table->date("date_of_birth")->default(now());
            $table->float("grade")->default(0);
            $table->enum("gender", ["Male", "Female"])->nullable();
            $table->timestamps();  # created_at column and updated_at column
        });
    }

    /**
     * Reverse the migrations.
     * php artisan migrate:rollback
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

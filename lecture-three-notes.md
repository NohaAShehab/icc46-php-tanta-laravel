# Lecture Three - Backend Integration & Resource Controllers

## 🎯 **What We Accomplished Today**

### **1. Database Migration Creation**
- Created `create_courses_table` migration with fields: id, name (unique), description, image, price, timestamps

### **2. Resource Controller Implementation**
- Created CourseController with CRUD methods: index, create, store, show, edit, update, destroy
- Implemented route model binding for automatic model resolution

### **3. File Storage Integration**
- Set up Laravel file storage system for image uploads
- Implemented file validation and storage in controllers

### **4. URL Naming & Routing**
- Implemented named routes for better maintainability
- Used RESTful resource routes with automatic naming

### **5. Model Relationships**
- Implemented relationships between models
- Set up foreign key constraints
- Created relationship methods in models

---

## 🗄️ **Database Migration**

```php
Schema::create('courses', function (Blueprint $table) {
    $table->id();
    $table->string("name")->unique();
    $table->text("description")->nullable();
    $table->string("image")->nullable();
    $table->integer("price")->default(10);
    $table->timestamps();
});
```

---

## 🎛️ **Resource Controller**

```php
class CourseController extends Controller
{
    public function index() { /* List courses */ }
    public function create() { /* Show create form */ }
    public function store(Request $request) { /* Save new course */ }
    public function show(Course $course) { /* Show course details */ }
    public function edit(Course $course) { /* Show edit form */ }
    public function update(Request $request, Course $course) { /* Update course */ }
    public function destroy(Course $course) { /* Delete course */ }
}
```

---

## 📁 **File Storage Implementation**

### **File Upload in Controller**
```php
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|unique:courses',
        'price' => 'required|integer|min:0',
        'image' => 'nullable|image|max:2048'
    ]);

    $data = $request->all();
    
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('courses', 'public');
    }

    Course::create($data);
    return redirect()->route('courses.index');
}
```

### **File Storage Features**
- Storage in `storage/app/public/courses/`
- Automatic unique filename generation
- File validation (image types, size limits)
- File cleanup on delete/update

---

## 🛣️ **URL Naming & Routing**

### **Resource Routes**
```php
Route::resource('courses', CourseController::class);
```

### **Generated Route Names**
- `courses.index` - GET /courses
- `courses.create` - GET /courses/create
- `courses.store` - POST /courses
- `courses.show` - GET /courses/{course}
- `courses.edit` - GET /courses/{course}/edit
- `courses.update` - PUT /courses/{course}
- `courses.destroy` - DELETE /courses/{course}

### **Using Named Routes**
```php
{{ route('courses.index') }}
{{ route('courses.show', $course) }}
{{ route('courses.edit', $course) }}
```

---

## 🔗 **Model Relationships**

### **Many-to-Many Relationship**
```php
// Course Model
public function students()
{
    return $this->belongsToMany(Student::class);
}

// Student Model  
public function courses()
{
    return $this->belongsToMany(Course::class);
}
```

### **Foreign Key Column Added**
- Created pivot table `course_student` with `course_id` and `student_id` foreign keys
- Added foreign key constraints in migration
- Students can enroll in multiple courses

---

## 🔧 **Key Features Implemented**

### **Route Model Binding**
- Automatic model resolution using `Course $course`
- 404 handling if model not found
- Clean controller method signatures

### **File Management**
- Image upload with validation
- File storage in organized directories
- Old file cleanup on updates
- Proper file deletion on model delete

### **Form Request Validation**
- Server-side validation rules
- Custom error messages
- File type and size validation
- Unique constraint handling

### **Error Handling**
- Blade error display with `@error` directive
- Flash messages for success/error feedback
- Form data preservation on validation errors

---

## 📚 **Laravel Concepts Covered**

- **Resource Controllers**: RESTful controller design
- **Route Model Binding**: Automatic model resolution
- **File Storage**: Laravel storage system
- **Named Routes**: Route naming conventions
- **Form Validation**: Server-side validation
- **HTTP Methods**: Proper method usage
- **Model Relationships**: Eloquent relationship methods
- **Database Relationships**: Foreign keys and pivot tables

---

*This lecture focused on implementing backend functionality with resource controllers, file storage, and URL naming for maintainable Laravel applications.*
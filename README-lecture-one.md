## Lecture One - Laravel Basics with Students Module

### What we built
- `StudentController` with an in-memory list of 5 students: `id`, `name`, `age`, `image`.
- Routes for listing, creating (placeholder), and showing a single student.
- Tailwind-powered index view that renders responsive student cards with search.

### Key Files
- Controller: `app/Http/Controllers/StudentController.php`
- Routes: `routes/web.php`
- Views:
  - Index: `resources/views/index.blade.php` (Tailwind cards + search)
  - Welcome: `resources/views/welcome.blade.php`

### Routes added
```text
GET /students            -> StudentController@index
GET /students/create     -> StudentController@create
GET /students/{id}       -> StudentController@show   (id numeric)
```

### Tailwind & Vite
- Tailwind is loaded via Vite in Blade views using:
```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```
- Tailwind sources are defined in `resources/css/app.css`.

### How to run
```bash
php artisan serve
# In another terminal (for Vite dev server if needed)
npm run dev
```

### StudentController overview (what it returns)
- `index()` returns `view('index', ['students' => $this->students])`.
- `create()` returns a placeholder string.
- `show($id)` filters the in-memory array and returns a single student or 404.

### Index view highlights
- Responsive card grid with image, name, and age.
- Client-side search input filtering by name.
- Links to “Create Student” and “View details”.

### Lab assignment
See `lab01.md` for the hands-on lab: create a new project `onlinestore` and implement a `ProductsController` with Tailwind views (index/show/create) and client-side search.



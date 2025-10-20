## Lab 01: OnlineStore - Products Module with Tailwind and Blade

### Objective
Create a new Laravel project named `onlinestore` and implement a Products feature similar to the lecture’s Students module: an index page (cards + search), a show page, and a create page, all wired with routes and a controller. Use Tailwind for styling via Vite.

### Task
- Create a new Laravel project:
  - `composer create-project laravel/laravel onlinestore`
  - `cd onlinestore && php artisan serve`
- **Create a `ProductsController`** with an in-memory array of 8 products. Each product should have: `id`, `name`, `price`, `category`, and `image` (filename only).
- **Routes**
  - `GET /products` → `ProductsController@index`
  - `GET /products/create` → `ProductsController@create`
  - `GET /products/{id}` → `ProductsController@show` (id numeric)
- **Views**
  - `resources/views/products/index.blade.php`:
    - Tailwind card grid.
    - Show image, name, category, and price.
    - Include a client-side search input that filters by product name.
    - Links: “Create Product” and “View details”.
  - `resources/views/products/show.blade.php`:
    - Detailed view with larger image, name, category, price, and a back link.
  - `resources/views/products/create.blade.php`:
    - Simple form (name, category, price, image filename text input).
    - No database needed; on submit show a success message or `dd()` submitted data.
- **Styling**
  - Use `@vite(['resources/css/app.css', 'resources/js/app.js'])` in all views.
  - Card layout should be responsive and polished (hover states, spacing, shadows).

### Hints
- Use the Students example as a reference for structure, Tailwind classes, and images (fallback placeholder if missing).
- Keep the controller’s data in a private array (no DB).
- Use `asset('images/…')` for images; put sample files under `public/images` or use a placeholder URL fallback.
- For `show`, filter the array by `id` and return 404 when not found.

### Acceptance Criteria
- Visiting `/products` shows a responsive grid of 8 product cards with image, name, category, and price.
- Search input filters visible cards by product name without page reload.
- Clicking a card link goes to `/products/{id}` and shows full details.
- `/products/create` displays a Tailwind-styled form; submitting shows the entered data (no persistence required).
- Views load Tailwind via Vite and render without errors.

### Bonus (optional)
- Extract a reusable Blade partial/component for a “ProductCard”.
- Add sorting by price and category filters on the index page (client-side).



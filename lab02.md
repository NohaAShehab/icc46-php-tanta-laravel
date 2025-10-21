# Lab 02: Products CRUD with Database, Factories & File Storage

## 🎯 **Objective**
Build a complete Products management system using Laravel's database features, factories, seeders, and file storage for image uploads.

---

## 📋 **Task Requirements**

### **1. Database Setup**
- Create a `products` table with the following fields:
  - `id` (primary key)
  - `name` (string, required)
  - `description` (text, nullable)
  - `price` (decimal, required)
  - `category` (string, required)
  - `image` (string, nullable) - for storing image filename
  - `stock_quantity` (integer, default 0)
  - `is_active` (boolean, default true)
  - `timestamps` (created_at, updated_at)

### **2. Model & Controller**
- Create `Product` model with proper fillable fields
- Create `ProductController` with full CRUD operations:
  - `index()` - List all products with search
  - `create()` - Show create form
  - `store()` - Save new product
  - `show()` - Display single product
  - `edit()` - Show edit form
  - `update()` - Update existing product
  - `destroy()` - Delete product

### **3. Views & Routes**
- Create beautiful Tailwind-powered views:
  - `products/index.blade.php` - Product grid with search
  - `products/show.blade.php` - Product details
  - `products/create.blade.php` - Add new product form
  - `products/edit.blade.php` - Edit product form
- 

### **4. Factory & Seeder**
- Create `ProductFactory` to generate fake product data
- Create `ProductSeeder` to seed 100 products
- Research and document Laravel factories and seeders

### **5. File Storage**
- Implement image upload functionality
- Research Laravel file storage system
- Handle image validation and storage

---

## 🗄️ **Database Migration**

Create the products migration:

```bash
php artisan make:migration create_products_table
```

**Migration Structure:**
```php
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description')->nullable();
    $table->decimal('price', 10, 2);
    $table->string('category');
    $table->string('image')->nullable();
    $table->integer('stock_quantity')->default(0);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

---

## 🏭 **Factory & Seeder Implementation**

### **Research Documentation**
- **Laravel Factories**: [Official Documentation](https://laravel.com/docs/10.x/eloquent-factories)
- **Database Seeders**: [Official Documentation](https://laravel.com/docs/10.x/seeding)
- **Faker Library**: [Faker Documentation](https://fakerphp.github.io/)

### **ProductFactory Requirements**
```php
// Create factory
php artisan make:factory ProductFactory

// Factory should generate:
- name: Random product names
- description: Lorem ipsum descriptions
- price: Random prices (10.00 - 999.99)
- category: Random categories (Electronics, Clothing, Books, etc.)
- image: Random image filenames
- stock_quantity: Random stock (0-100)
- is_active: Random boolean (mostly true)
```

### **ProductSeeder Requirements**
```php
// Create seeder
php artisan make:seeder ProductSeeder

// Seeder should:
- Use ProductFactory to create 100 products
- Run: php artisan db:seed --class=ProductSeeder
```

---

## 📁 **File Storage Research & Implementation**

### **Research Documentation**
- **Laravel File Storage**: [Official Documentation](https://laravel.com/docs/10.x/filesystem)
- **File Uploads**: [Laravel File Uploads](https://laravel.com/docs/10.x/requests#files)
- **Image Validation**: [Laravel Validation Rules](https://laravel.com/docs/10.x/validation#rule-image)

### **File Storage Requirements**
- **Storage Configuration**: Use `public` disk for images
- **Image Validation**: 
  - File type: jpg, jpeg, png, gif
  - Max size: 2MB
  - Dimensions: max 2000x2000px
- **File Naming**: Use unique filenames to prevent conflicts
- **Storage Path**: Store in `storage/app/public/products/`

### **Implementation Steps**
1. **Configure Storage**: Set up public disk and symlink
2. **Image Upload**: Handle file uploads in controller
3. **File Validation**: Validate image files
4. **Storage**: Save files with unique names
5. **Display**: Show images in views

---

## 🎨 **UI/UX Requirements**

### **Design Standards**
- **Layout**: Extend from `layouts/app.blade.php`
- **Styling**: Use Tailwind CSS for modern design
- **Responsive**: Mobile-first approach
- **Consistency**: Match the students module design

### **Index Page Features**
- **Product Grid**: Responsive card layout
- **Search Bar**: Real-time product search
- **Filter Options**: Category filtering
- **Pagination**: Handle large datasets
- **Product Cards**: Image, name, price, category

### **Product Form Features**
- **Image Upload**: Drag-and-drop file upload
- **Image Preview**: Live preview of selected images
- **Form Validation**: Client and server-side validation
- **Category Selection**: Dropdown with predefined categories

---

## 🔧 **Technical Implementation**

### **Model Setup**
```php
// Product.php
class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'category', 
        'image', 'stock_quantity', 'is_active'
    ];
    
    // Add any relationships or accessors here
}
```

### **Controller Methods**
```php
// ProductController.php
public function index() {
    // List products with search and pagination
}

public function store(Request $request) {
    // Validate and store new product
    // Handle image upload
}

public function update(Request $request, Product $product) {
    // Update existing product
    // Handle image replacement
}
```

### **Routes Setup**
```php
// web.php
Route::resource('products', ProductController::class);
```

---

## 📚 **Research Tasks**

### **1. Laravel Factories**
- **What are Factories?**: Model factories for generating fake data
- **Faker Library**: Understanding faker methods
- **Factory States**: Creating different product variations
- **Relationships**: Factories with model relationships

**Documentation Sources:**
- [Laravel Factories](https://laravel.com/docs/10.x/eloquent-factories)
- [Faker Library](https://fakerphp.github.io/)
- [Factory States](https://laravel.com/docs/10.x/eloquent-factories#factory-states)

### **2. Database Seeders**
- **What are Seeders?**: Classes for populating database
- **Seeder Classes**: Creating and running seeders
- **Database Seeding**: Mass data insertion
- **Seeder Relationships**: Seeding related data

**Documentation Sources:**
- [Laravel Seeders](https://laravel.com/docs/10.x/seeding)
- [Database Seeding](https://laravel.com/docs/10.x/seeding#running-seeders)
- [Model Factories in Seeders](https://laravel.com/docs/10.x/seeding#using-model-factories)

### **3. File Storage**
- **Storage Disks**: Understanding different storage options
- **File Uploads**: Handling file uploads in Laravel
- **Image Processing**: Resizing and optimizing images
- **File Validation**: Validating uploaded files

**Documentation Sources:**
- [Laravel File Storage](https://laravel.com/docs/10.x/filesystem)
- [File Uploads](https://laravel.com/docs/10.x/requests#files)
- [Image Validation](https://laravel.com/docs/10.x/validation#rule-image)
- [Storage Links](https://laravel.com/docs/10.x/filesystem#the-public-disk)

---

## ✅ **Acceptance Criteria**

### **Database & Models**
- [ ] Products migration created and run
- [ ] Product model with proper fillable fields
- [ ] ProductFactory generates realistic fake data
- [ ] ProductSeeder creates 100 products
- [ ] Database seeded successfully

### **CRUD Operations**
- [ ] ProductController with all CRUD methods
- [ ] All views created and functional
- [ ] Image upload functionality

### **File Storage**
- [ ] Image upload working
- [ ] Images stored in correct location
- [ ] Images displayed in views
- [ ] Storage symlink created



---

## 🚀 **Bonus Tasks**

### **Advanced Features**
1. **Image Optimization**: Resize images on upload
2. **Bulk Operations**: Select multiple products
3. **Advanced Search**: Filter by price range, category
5. **Product Reviews**: Add review system

### **Performance**
1. **Pagination**: Implement pagination for large datasets
2. **Image Lazy Loading**: Optimize image loading

---

## 📖 **Learning Resources**

### **Laravel Documentation**
- [Eloquent ORM](https://laravel.com/docs/10.x/eloquent)
- [Model Factories](https://laravel.com/docs/10.x/eloquent-factories)
- [Database Seeders](https://laravel.com/docs/10.x/seeding)
- [File Storage](https://laravel.com/docs/10.x/filesystem)
- [Form Validation](https://laravel.com/docs/10.x/validation)

### **External Resources**
- [Laravel Best Practices](https://github.com/alexeymezenin/laravel-best-practices)
- [Tailwind CSS](https://tailwindcss.com/docs)
- [Faker Library](https://fakerphp.github.io/)

---

## 🎯 **Deliverables**

1. **Complete Products CRUD** with database integration
2. **ProductFactory** with realistic fake data generation
3. **ProductSeeder** that creates 100 products
4. **Image upload functionality** with proper validation
5. **Research documentation** on factories, seeders, and file storage
6. **Modern UI** matching the students module design

---

*This lab focuses on advanced Laravel features including database operations, data generation, and file handling while maintaining modern UI/UX standards.*

# Lab 03 - Categories CRUD with Resource Controllers & Relationships

## 🎯 **Objective**
Implement a complete Categories management system using Laravel resource controllers, resource routes, and establish proper relationships between Products and Categories.

---


## 🗄️ **Part 1: Database Setup**

### **1.1 Categories Migration**
Create a `categories` table with:
- `id` (primary key)
- `name` (string, required, unique)
- `description` (text, nullable)
- `image` (string, nullable)
- `is_active` (boolean, default true)
- `timestamps` (created_at, updated_at)

### **1.2 Update Products Table**
Add foreign key to existing products table:
- Add `category_id` foreign key
- Set as nullable with foreign key constraint
- On delete set to null

---

## 🎛️ **Part 2: Models & Relationships**

### **2.1 Category Model**
- Fillable fields: name, description, image, is_active
- Relationship: hasMany(Product::class)

### **2.2 Product Model Update**
- Add category_id to fillable fields
- Relationship: belongsTo(Category::class)

### **2.3 Relationship Implementation**
- **One-to-Many**: Category has many Products
- **Belongs-to**: Product belongs to one Category
- Implement relationship methods in both models

---

## 🛣️ **Part 3: Resource Controller & Routes**

### **3.1 CategoryController Implementation**
Create controller with all CRUD methods:
- `index()` - List all categories
- `create()` - Show create form
- `store()` - Save new category
- `show()` - Show category with products
- `edit()` - Show edit form
- `update()` - Update category
- `destroy()` - Delete category

### **3.2 Resource Routes**
- Set up RESTful resource routes for categories
- Use CategoryController for all CRUD operations
- Implement route model binding
---

## 📁 **Part 4: File Storage Implementation**

### **4.1 File Upload Features**
- Handle category image uploads
- Validate image files (type, size)
- Store images in `storage/app/public/categories/`
- Delete old images when updating/deleting

### **4.2 File Management**
- Image upload functionality
- File validation (image types and sizes)
- Storage organization
- File cleanup on update/delete
- Fallback images for missing category images

---

## 🎨 **Part 5: Views Implementation**

### **5.1 Category Index View**
- Display all categories in a grid layout
- Show category name, description, and image
- Include product count for each category
- Add search functionality
- Links to view, edit, and delete categories

### **5.2 Category Show View**
- Display category details (name, description, image)
- **Show all products in this category**
- Display product count
- Links to edit category and view products

### **5.3 Category Create View**
- Form to create new category
- Fields: name, description, image upload, is_active
- Image preview functionality
- Form validation with error display

### **5.4 Category Edit View**
- Form to edit existing category
- Pre-filled with current category data
- Current image display with replacement option
- Form validation with error display

---

## 🔧 **Part 6: Advanced Features**

### **6.1 Advanced Features**
- Display products in category show view
- Show product count per category
- Implement form validation with error handling

---

## ✅ **Part 7: Acceptance Criteria**

### **7.1 Database & Models**
- [ ] Categories migration created and run
- [ ] Products table updated with category_id foreign key
- [ ] Category model with products relationship
- [ ] Product model updated with category relationship
- [ ] Foreign key constraints working

### **7.2 Resource Controller**
- [ ] CategoryController with all CRUD methods
- [ ] Route model binding implemented
- [ ] File upload functionality
- [ ] File validation working
- [ ] File cleanup on delete/update

### **7.3 Views & Routes**
- [ ] All category views created (index, show, create, edit)
- [ ] RESTful routes configured
- [ ] Named routes used in views
- [ ] Products displayed in category show view

### **7.4 Relationships**
- [ ] Category has many products working
- [ ] Product belongs to category working
- [ ] Product count displayed in category index
- [ ] Products listed in category show page

---

## 🎁 **Bonus: Polymorphic Relationships (Comments System)**

### **Bonus Objective**
Implement a comments system for products using Laravel's polymorphic relationships, allowing products to have multiple comments while keeping the system flexible for future expansion.

### **Bonus Requirements**

#### **B.1 Comments Database Setup**
Create comments table with:
- `id` (primary key)
- `content` (text)
- `author_name` (string)
- `author_email` (string)
- `commentable_id` (morphs column)
- `commentable_type` (morphs column)
- `timestamps` (created_at, updated_at)

#### **B.2 Comment Model**
- Fillable fields: content, author_name, author_email, commentable_id, commentable_type
- Relationship: morphTo() for polymorphic relationship

#### **B.3 Update Product Model**
- Add comments() relationship using morphMany
- Implement polymorphic relationship method

#### **B.4 Comment Controller**
- store() method for creating new comments
- destroy() method for deleting comments
- Validation for comment data
- Proper error handling

#### **B.5 Comments Views**
- Add comment form to product show page
- Display all comments for the product
- Show comment count
- Comment deletion functionality

#### **B.6 Advanced Features**
- Eager loading comments for performance
- Comment count in product index
- Recent comments dashboard
- Comment statistics

### **Bonus Acceptance Criteria**
- [ ] Comments migration created with morphs columns
- [ ] Comment model with morphTo relationship
- [ ] Product model updated with morphMany relationship
- [ ] Comment controller with store/destroy methods
- [ ] Comment form added to product show page
- [ ] Comments displayed in product show page
- [ ] Comment count shown in product index
- [ ] Comment deletion functionality

---

## 📚 **Learning Resources**

### **Laravel Documentation**
- [Resource Controllers](https://laravel.com/docs/12.x/controllers#resource-controllers)
- [Route Model Binding](https://laravel.com/docs/12.x/routing#route-model-binding)
- [Eloquent Relationships](https://laravel.com/docs/12.x/eloquent-relationships)
- [File Storage](https://laravel.com/docs/12.x/filesystem)
- [Form Request Validation](https://laravel.com/docs/12.x/validation#form-request-validation)
- [Polymorphic Relationships](https://laravel.com/docs/12.x/eloquent-relationships#polymorphic-relationships)

### **Additional Resources**
- [Laravel Best Practices](https://github.com/alexeymezenin/laravel-best-practices)
- [Eloquent ORM](https://laravel.com/docs/12.x/eloquent)

---

## 🎯 **Deliverables**

1. **Complete Categories CRUD** with resource controller
2. **Resource Routes** with proper URL naming
3. **Model Relationships** between Products and Categories
4. **Category Views** with all CRUD operations
5. **Product Display** in category show page
6. **File Storage** for category images
7. **Comments System** (Bonus) with polymorphic relationships

---

*This lab focuses on implementing categories management with resource controllers, relationships, and displaying products within each category.*
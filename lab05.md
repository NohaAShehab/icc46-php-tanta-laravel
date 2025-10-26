# Lab 05 - Advanced Laravel Features

## 🎯 **Lab Objectives**

In this lab, you will implement advanced Laravel features including soft deletes, policies, API development, and component-based architecture.

---

## 📋 **Tasks to Complete**

### **Task 1: Soft Delete Implementation**
- Implement soft delete functionality on products and categories
- Add `deleted_at` column to both tables
- Update models to use `SoftDeletes` trait
- Modify controllers to handle soft deletes

### **Task 2: Restore Deleted Items**
- Create functionality to restore soft-deleted items
- Add restore routes and controller methods
- Create restore buttons in the admin interface
- Display deleted items in a separate section

### **Task 3: Reusable Button Component**
- Create a Blade component for buttons
- Accept URL and styling parameters
- Use the component throughout the application
- Support different button types (primary, secondary, danger)

### **Task 4: User Roles System**
- Modify users table to include role column
- Support roles: Admin, Manager, Client
- Create migration for the role column
- Update user model and registration process

### **Task 5: Policy Implementation**
- Create policies for product and category management
- Ensure only Admin can delete categories
- Implement authorization checks in controllers
- Create middleware for role-based access

### **Task 6: API Development**
- Run `php artisan install:api` command
- Create API routes for products
- Implement API controllers with proper responses
- Add API authentication and rate limiting

---

## 🛠️ **Implementation Steps**

### **Step 1: Soft Delete Setup**

#### **1.1 Create Migration for Soft Deletes**
Create migrations to add soft delete functionality to products and categories tables.

#### **1.2 Migration Content**
Add `softDeletes()` method to both products and categories tables.

#### **1.3 Update Models**
Update Product and Category models to use the `SoftDeletes` trait and add `deleted_at` to the dates array.

### **Step 2: Restore Functionality**

#### **2.1 Add Restore Routes**
Add PATCH routes for restoring soft-deleted products and categories.

#### **2.2 Controller Methods**
Implement restore methods in controllers that use `withTrashed()` to find deleted items and restore them.

### **Step 3: Button Component**

#### **3.1 Create Component**
Use `php artisan make:component Button` to create a reusable button component.

#### **3.2 Component Class**
Create a component class that accepts URL, type, size, and icon parameters.

#### **3.3 Component View**
Create a Blade view that renders different button styles based on the type parameter.

### **Step 4: User Roles**

#### **4.1 Create Migration**
Create a migration to add role column to users table.

#### **4.2 Migration Content**
Add an enum column for roles with values: admin, manager, client (default: client).

#### **4.3 Update User Model**
Add 'role' to the fillable array in the User model.

### **Step 5: Policy Implementation**

#### **5.1 Create Policies**
Create ProductPolicy and CategoryPolicy using artisan commands.

#### **5.2 Policy Content**
Implement authorization methods for create, update, delete, and restore operations based on user roles.

#### **5.3 Register Policies**
Register the policies in AuthServiceProvider and define any additional gates.

### **Step 6: API Development**

#### **6.1 Install API Package**
Run `php artisan install:api` to set up Laravel Sanctum for API authentication.

#### **6.2 Create API Routes**
Create API routes for products and categories with proper middleware.

#### **6.3 API Controller**
Create API controllers that return JSON responses for CRUD operations.

---

## 📝 **Deliverables**

### **Required Files to Submit:**
1. **Migration files** for soft deletes and user roles
2. **Updated models** with SoftDeletes trait
3. **Button component** (class and view)
4. **Policy files** for products and categories
5. **API controllers** for products and categories
6. **Updated routes** (web.php and api.php)
7. **Screenshots** of the working functionality

### **Code Quality Requirements:**
- ✅ Proper error handling
- ✅ Validation rules
- ✅ Authorization checks
- ✅ Clean, readable code
- ✅ Proper documentation
- ✅ Responsive design

---

## 🎯 **Bonus Tasks**

### **Extra Credit:**
1. **Implement bulk restore** for multiple deleted items
2. **Add role-based middleware** for different user types
3. **Create API documentation** using Swagger/OpenAPI
4. **Implement API rate limiting** per user role
5. **Add soft delete to users** with admin restore functionality

---

## 📚 **Resources**

### **Documentation:**
- [Laravel Soft Deletes](https://laravel.com/docs/eloquent#soft-deleting)
- [Laravel Policies](https://laravel.com/docs/authorization#creating-policies)
- [Laravel API Resources](https://laravel.com/docs/eloquent-resources)
- [Blade Components](https://laravel.com/docs/blade#components)

### **Commands Reference:**
- Create migrations: `php artisan make:migration add_soft_deletes_to_products_table`
- Create policies: `php artisan make:policy ProductPolicy`
- Create components: `php artisan make:component Button`
- Install API: `php artisan install:api`
- Run migrations: `php artisan migrate`
- Clear cache: `php artisan config:clear` and `php artisan route:clear`

---

## ⚠️ **Important Notes**

1. **Backup your database** before running migrations
2. **Test thoroughly** before submitting
3. **Follow Laravel conventions** for naming and structure
4. **Use proper validation** for all inputs
5. **Implement proper error handling** throughout
6. **Document your code** with meaningful comments

---

## 🏆 **Success Criteria**

- [ ] Soft delete works for products and categories
- [ ] Restore functionality works properly
- [ ] Button component is reusable and styled
- [ ] User roles are implemented correctly
- [ ] Policies prevent unauthorized actions
- [ ] API endpoints return proper JSON responses
- [ ] All functionality is tested and working
- [ ] Code follows Laravel best practices

**Good luck with your implementation!** 🚀

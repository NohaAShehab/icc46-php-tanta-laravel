# Lab 04 - Form Requests, Authentication & Middleware

## 🎯 **Objective**
Implement form request validation, Laravel Breeze authentication, user profile pictures, and custom middleware to restrict product creation based on user authentication and limits.

---

## 📋 **Lab Overview**

### **What You'll Build**
- Form request classes for products and categories
- Laravel Breeze authentication system
- User profile picture functionality
- Custom middleware for product creation limits
- Authentication-based access control

### **Skills You'll Learn**
- Form request validation
- Laravel Breeze installation and customization
- File upload for user profiles
- Custom middleware creation
- Authentication and authorization
- User interface modifications

---

## 🗄️ **Part 1: Form Request Classes**

### **1.1 Product Form Requests**
Create dedicated form request classes for product validation:

#### **ProductStoreRequest**
- Validate product creation data
- Custom validation rules for product fields
- Custom error messages
- File validation for product images

#### **ProductUpdateRequest**
- Validate product update data
- Handle unique validation with model exclusion
- File validation for updated images
- Custom error messages

### **1.2 Category Form Requests**
Create dedicated form request classes for category validation:

#### **CategoryStoreRequest**
- Validate category creation data
- Custom validation rules for category fields
- File validation for category images
- Custom error messages

#### **CategoryUpdateRequest**
- Validate category update data
- Handle unique validation with model exclusion
- File validation for updated images
- Custom error messages

### **1.3 Controller Updates**
- Update ProductController to use form request classes
- Update CategoryController to use form request classes
- Remove inline validation from controllers
- Implement proper error handling

---

## 🔐 **Part 2: Laravel Breeze Installation**

### **2.1 Install Laravel Breeze**
- Install Laravel Breeze package
- Configure authentication scaffolding
- Set up authentication routes
- Configure authentication views

### **2.2 Authentication Setup**
- Run Breeze installation commands
- Configure authentication middleware
- Set up user model relationships
- Configure authentication guards

### **2.3 Database Migration**
- Run authentication migrations
- Set up user table with additional fields
- Configure foreign key relationships
- Set up authentication tables

---

## 👤 **Part 3: User Profile Pictures**

### **3.1 Database Migration**
Add profile picture field to users table:
- `profile_picture` (string, nullable)
- Update user migration
- Run migration

### **3.2 User Model Updates**
- Add profile_picture to fillable fields
- Create accessor for profile picture URL
- Add profile picture validation

### **3.3 Profile Picture Upload**
- Modify registration form to include file upload
- Implement profile picture storage
- Add image validation rules
- Handle file upload in registration process

### **3.4 Display Profile Pictures**
- Show profile picture in navigation bar
- Display profile picture in dashboard
- Add fallback for users without profile pictures
- Implement responsive profile picture display

---

## 🛡️ **Part 4: Custom Middleware**

### **4.1 Create Product Limit Middleware**
Create middleware to restrict product creation:
- Maximum 5 products per user
- Check user's product count
- Redirect with error message if limit exceeded
- Apply middleware to product store route

### **4.2 Middleware Implementation**
- Create `CheckProductLimit` middleware
- Register middleware in kernel
- Apply to product creation routes
- Implement proper error handling

### **4.3 Middleware Logic**
- Count user's existing products
- Check against maximum limit (5 products)
- Return appropriate responses
- Handle edge cases and errors

---

## 🔒 **Part 5: Authentication-Based Access Control**

### **5.1 Route Protection**
- Protect product CRUD routes with authentication
- Protect category CRUD routes with authentication
- Redirect unauthenticated users to login
- Implement proper route middleware

### **5.2 Controller Authorization**
- Add authentication checks to controllers
- Implement user-based data filtering

### **5.3 View Modifications**
- Hide create/edit/delete buttons for guests
- Show user-specific content only
- Implement proper access control in views
- Add authentication status indicators

---

## 🎨 **Part 6: UI/UX Enhancements**

### **6.1 Navigation Bar Updates**
- Display user profile picture in navbar
- Show user name and authentication status
- Add logout functionality
- Implement responsive navigation

### **6.2 Dashboard Modifications**
- Create user dashboard with profile picture
- Show user's products and categories

### **6.3 Registration Page Updates**
- Add profile picture upload field
- Implement image preview functionality
- Add form validation for profile picture
- Style the registration form

---

## ✅ **Part 7: Acceptance Criteria**

### **7.1 Form Request Classes**
- [ ] ProductStoreRequest created with validation rules
- [ ] ProductUpdateRequest created with validation rules
- [ ] CategoryStoreRequest created with validation rules
- [ ] CategoryUpdateRequest created with validation rules
- [ ] Controllers updated to use form request classes
- [ ] Custom error messages implemented

### **7.2 Laravel Breeze**
- [ ] Breeze installed and configured
- [ ] Authentication routes working
- [ ] Login/register functionality working
- [ ] User model properly configured

### **7.3 Profile Pictures**
- [ ] Profile picture field added to users table
- [ ] Registration form includes profile picture upload
- [ ] Profile pictures displayed in navbar
- [ ] Profile pictures displayed in dashboard
- [ ] Fallback images for users without pictures

### **7.4 Custom Middleware**
- [ ] CheckProductLimit middleware created
- [ ] Middleware registered and applied to routes
- [ ] Product limit (5) enforced
- [ ] Proper error messages displayed

### **7.5 Authentication & Authorization**
- [ ] Product routes protected with authentication
- [ ] Category routes protected with authentication
- [ ] Users can only see their own data
- [ ] Guest users redirected to login

---

## 🚀 **Extended Features (Bonus)**

### **Advanced Authentication**
1. **Email Verification**: Implement email verification for new users

---

## 📚 **Learning Resources**

### **Laravel Documentation**
- [Form Request Validation](https://laravel.com/docs/12.x/validation#form-request-validation)
- [Laravel Breeze](https://laravel.com/docs/12.x/starter-kits#laravel-breeze)
- [Middleware](https://laravel.com/docs/12.x/middleware)
- [Authentication](https://laravel.com/docs/12.x/authentication)
- [File Storage](https://laravel.com/docs/12.x/filesystem)

### **Additional Resources**
- [Laravel Breeze Documentation](https://github.com/laravel/breeze)
- [Custom Middleware](https://laravel.com/docs/12.x/middleware#defining-middleware)
- [User Authentication](https://laravel.com/docs/12.x/authentication#introduction)

---

## 🎯 **Deliverables**

1. **Form Request Classes** for products and categories
2. **Laravel Breeze** authentication system
3. **User Profile Pictures** with upload and display
4. **Custom Middleware** for product creation limits
5. **Authentication-Based Access Control** for all CRUD operations
6. **Enhanced UI/UX** with profile pictures in navbar and dashboard
7. **Protected Routes** requiring authentication

---

## 🔧 **Technical Requirements**

### **Form Request Validation**
- Custom validation rules
- Unique validation with model exclusion
- File validation for images
- Custom error messages

### **Authentication System**
- Laravel Breeze installation
- User registration with profile pictures
- Login/logout functionality
- Route protection

### **Middleware Implementation**
- Custom middleware creation
- Product limit enforcement (5 products max)
- Proper error handling
- Route middleware application

### **File Management**
- Profile picture upload
- Image validation and storage
- Fallback images
- Responsive display

---

*This lab focuses on implementing form request validation, authentication with Laravel Breeze, user profile management, and custom middleware for access control and business logic enforcement.*

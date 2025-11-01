# Laravel ITI Training Project

A comprehensive Laravel web application for managing students, courses, products, and categories with authentication and API support.

## 📋 Overview

This project is a full-stack Laravel application that provides:
- **Student Management System** - CRUD operations for student records
- **Course Management System** - Resource-based course management with file uploads
- **Product & Category Management** - E-commerce-style product catalog with categories
- **Authentication System** - Laravel Breeze authentication with GitHub OAuth integration
- **RESTful API** - Sanctum-based API endpoints for external integrations
- **Role-Based Access Control** - User roles and authorization policies

---

## 🚀 Features

### Authentication & Authorization
- ✅ Laravel Breeze authentication (login, register, password reset)
- ✅ GitHub OAuth login integration
- ✅ Role-based user system
- ✅ User profile management
- ✅ Authorization policies (Category, Course, Product) with role-based access control

### Student Management
- ✅ Full CRUD operations for students
- ✅ Student-course relationships
- ✅ Student ownership tracking
- ✅ Image upload support
- ✅ Student details: name, email, grade, date of birth, gender

### Course Management
- ✅ Resource controller with RESTful routes
- ✅ Course creation with image uploads
- ✅ Course-student relationships (one-to-many)
- ✅ Course creator tracking
- ✅ File storage integration
- ✅ Course attributes: name, price, description, image

### Product & Category Management
- ✅ Product catalog with categories
- ✅ Soft deletes for data recovery
- ✅ Category-product relationships
- ✅ Stock quantity tracking
- ✅ Active/inactive status management

### API Endpoints
- ✅ Sanctum token authentication
- ✅ API resource controllers
- ✅ Protected API routes
- ✅ User token management

---

## 🛠️ Technical Stack

- **Framework:** Laravel 12+
- **PHP Version:** ^8.2
- **Authentication:** Laravel Breeze 2.3+
- **OAuth:** Laravel Socialite 5.23+ (GitHub)
- **API Authentication:** Laravel Sanctum 4.0+
- **Frontend:** Blade Templates with Tailwind CSS
- **Database:** SQLite (development) / MySQL/PostgreSQL (production)

---

## 📦 Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js and NPM
- Git

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd iti
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure GitHub OAuth** (in `.env`)
   ```env
   GITHUB_CLIENT_ID=your_client_id
   GITHUB_CLIENT_SECRET=your_client_secret
   GITHUB_REDIRECT_URI=http://localhost:8000/github-callback
   ```

6. **Run migrations**
   ```bash
   php artisan migrate
   ```

7. **Build assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

---

## 🔧 Configuration

### GitHub OAuth Setup

1. Go to [GitHub Developer Settings](https://github.com/settings/developers)
2. Create a new OAuth App
3. Set Authorization callback URL: `http://localhost:8000/github-callback`
4. Copy Client ID and Client Secret to `.env`

### Database Configuration

Update `.env` with your database credentials:
```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

Or for MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

---

## 📁 Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Auth/          # Authentication controllers
│   │   ├── API/           # API controllers
│   │   ├── CourseController.php
│   │   └── StudentController.php
│   ├── Middleware/
│   ├── Requests/          # Form request validation
│   └── Resources/
├── Models/
│   ├── Category.php
│   ├── Course.php
│   ├── Product.php
│   ├── Student.php
│   └── User.php
└── Policies/              # Authorization policies

routes/
├── web.php                # Web routes
├── api.php                # API routes
└── auth.php               # Authentication routes

database/
├── migrations/            # Database migrations
└── seeders/              # Database seeders

resources/
└── views/                # Blade templates
    ├── auth/             # Authentication views
    ├── courses/          # Course views
    ├── students/         # Student views
    └── layouts/          # Layout components
```

---

## 🗄️ Database Schema

### Key Tables

- **users** - User accounts with roles and GitHub integration
- **students** - Student records with course and owner relationships
- **courses** - Course information with creator tracking
- **products** - Product catalog
- **categories** - Product categories
- **personal_access_tokens** - Sanctum API tokens

### Relationships

- User → Students (owner)
- User → Courses (creator)
- Course → Students (one-to-many)
- Category → Products (one-to-many)

---

## 🔐 Authentication Routes

- `GET /login` - Login page
- `POST /login` - Process login
- `GET /register` - Registration page
- `POST /register` - Process registration
- `GET /login-github` - Redirect to GitHub OAuth
- `GET /github-callback` - Handle GitHub OAuth callback
- `POST /logout` - Logout user

---

## 📚 Resource Routes

### Students
- `GET /students` - List all students
- `GET /students/create` - Create student form
- `POST /students` - Store new student
- `GET /students/{id}` - Show student details
- `GET /students/{id}/edit` - Edit student form
- `PUT /students/{id}` - Update student
- `DELETE /students/{id}` - Delete student

### Courses
- `GET /courses` - List all courses
- `GET /courses/create` - Create course form
- `POST /courses` - Store new course
- `GET /courses/{id}` - Show course details
- `GET /courses/{id}/edit` - Edit course form
- `PUT /courses/{id}` - Update course
- `DELETE /courses/{id}` - Delete course

---

## 🔌 API Endpoints

All API routes are prefixed with `/api` and require Sanctum authentication.

### Authentication
```bash
POST /api/login
```

### Courses API
```bash
GET    /api/courses
POST   /api/courses
GET    /api/courses/{id}
PUT    /api/courses/{id}
DELETE /api/courses/{id}
```

**Authentication:** Bearer token via Sanctum

---

## 🎨 Frontend

- **Framework:** Laravel Blade with Tailwind CSS
- **Components:** Reusable Blade components
- **Styling:** Tailwind CSS utility classes
- **Dark Mode:** Supported via Tailwind dark mode

---

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run with coverage
php artisan test --coverage
```

---

## 📝 Available Commands

```bash
# Development server
php artisan serve

# Queue worker
php artisan queue:work

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Run migrations
php artisan migrate
php artisan migrate:fresh
php artisan migrate:rollback

# Generate resources
php artisan make:controller ControllerName
php artisan make:model ModelName -m
php artisan make:policy PolicyName
```

---

## 🔒 Security Features

- CSRF protection on all forms
- Password hashing (bcrypt)
- SQL injection prevention (Eloquent ORM)
- XSS protection (Blade escaping)
- Authorization policies for resource access
- Sanctum token authentication for API
- Rate limiting on authentication routes

---

## 📄 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 👥 Contributing

This is an educational project for ITI training. For contributions, please follow Laravel coding standards and best practices.

---

## 📞 Support

For issues and questions, please refer to the project documentation or Laravel official documentation:
- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Breeze](https://laravel.com/docs/breeze)
- [Laravel Sanctum](https://laravel.com/docs/sanctum)
- [Laravel Socialite](https://laravel.com/docs/socialite)

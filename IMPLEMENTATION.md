# E-Commerce Laravel - Implementation Guide

## Project Overview

This is a simple Laravel e-commerce application focusing on routing (routing) and views (Blade templates). The project demonstrates fundamental Laravel concepts.

## Completed Implementation

### 1. Routes Configuration (`routes/web.php`)

Two main routes have been implemented:

#### Route 1: Home Page
```php
Route::get('/', function () {
    return view('Home');
});
```
- **URL**: `/`
- **View**: `resources/views/Home.blade.php`
- **Description**: Displays the main landing page with category links

#### Route 2: Dynamic Products Page
```php
Route::get('/produits/{cat}', function ($cat) {
    // Product data based on category
    // Categories: 'hiking', 'electromenager'
});
```
- **URL**: `/produits/{category}`
- **View**: `resources/views/Produits.blade.php`
- **Description**: Displays products filtered by category

### 2. Views Created

#### Master_page.blade.php
- **Location**: `resources/views/Master_page.blade.php`
- **Purpose**: Main layout template
- **Includes**:
  - Bootstrap 5 CSS framework
  - Navigation menu via `@include('Menu')`
  - Footer via `@include('Footer')`
  - Content section with `@yield('content')`
  - Custom styling for product cards

#### Menu.blade.php
- **Location**: `resources/views/Menu.blade.php`
- **Purpose**: Navigation bar
- **Features**:
  - Bootstrap navbar
  - Logo/Brand link to home
  - Category dropdown menu
  - Responsive design

#### Footer.blade.php
- **Location**: `resources/views/Footer.blade.php`
- **Purpose**: Footer section
- **Includes**:
  - About information
  - Category links
  - Contact details
  - Copyright notice

#### Home.blade.php
- **Location**: `resources/views/Home.blade.php`
- **Purpose**: Landing page
- **Sections**:
  - Welcome jumbotron
  - Category preview cards
  - Value proposition points

#### Produits.blade.php
- **Location**: `resources/views/Produits.blade.php`
- **Purpose**: Product listing page
- **Features**:
  - Grid view of products with images
  - Detailed table view
  - Product information (name, price, image)
  - "Add to cart" buttons (placeholder)
  - Empty state handling

### 3. Error Handling

#### 404 Error Page
- **Location**: `resources/views/errors/404.blade.php`
- **Purpose**: Custom 404 error page
- **Features**:
  - User-friendly error message
  - Links to home and products pages

#### Exception Handler
- **Location**: `app/Exceptions/Handler.php`
- **Configuration**:
  - Catches `NotFoundHttpException`
  - Renders custom `errors.404` view
  - Proper Laravel exception handling structure

### 4. Directory Structure

```
resources/views/
├── Master_page.blade.php
├── Menu.blade.php
├── Footer.blade.php
├── Home.blade.php
├── Produits.blade.php
└── errors/
    └── 404.blade.php

public/
└── imgs/  (Create product images here)
    ├── sac_do.jfif
    ├── tent.jfif
    ├── watch_gps.jfif
    ├── machine_lav.jfif
    ├── four.jfif
    └── micro_onde.jfif
```

## Product Categories

### Hiking
- Sac à dos (Backpack) - 200 DH
- Tente (Tent) - 300 DH
- Montre GPS (GPS Watch) - 150 DH

### Électroménager (Appliances)
- Machine à laver (Washing Machine) - 3000 DH
- Four (Oven) - 1500 DH
- Micro-onde (Microwave) - 1000 DH

## How to Run

1. **Install dependencies**:
   ```bash
   composer install
   npm install
   ```

2. **Setup environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Run the development server**:
   ```bash
   php artisan serve
   ```

4. **Access the application**:
   - Home: `http://localhost:8000/`
   - Hiking products: `http://localhost:8000/produits/hiking`
   - Appliances: `http://localhost:8000/produits/electromenager`
   - 404 test: `http://localhost:8000/non-existent-page`

## Adding Product Images

Place product images in the `public/imgs/` directory:
- `sac_do.jfif` - Backpack image
- `tent.jfif` - Tent image
- `watch_gps.jfif` - GPS Watch image
- `machine_lav.jfif` - Washing Machine image
- `four.jfif` - Oven image
- `micro_onde.jfif` - Microwave image

## Blade Template Features Used

- `@extends()` - Extending master layout
- `@section()` - Defining content sections
- `@include()` - Including partials
- `@foreach` - Looping through products
- `{{ }}` - Displaying variables
- `@yield()` - Rendering sections
- `@if()` - Conditional rendering

## Next Steps (Future Development)

1. **Controllers**: Move product logic to `ProductController`
2. **Models**: Create `Product` and `Category` models
3. **Database**: Add database migrations for products
4. **Shopping Cart**: Implement cart functionality
5. **User Authentication**: Add login/registration
6. **Order Management**: Process and track orders
7. **Admin Panel**: Manage products and categories

## Key Concepts Demonstrated

✅ **Routing**: Static and dynamic route parameters
✅ **Views**: Blade template engine
✅ **Layout Inheritance**: Master page with sections
✅ **Component Inclusion**: Menu and Footer partials
✅ **Error Handling**: Custom 404 page
✅ **Responsive Design**: Bootstrap integration
✅ **Data Passing**: Passing arrays to views
✅ **Iteration**: @foreach loops in templates

---

**Created**: January 2026
**Framework**: Laravel 11
**Template Engine**: Blade

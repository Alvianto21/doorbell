<?php

use App\Http\Controllers\AdminDashboardCategoryController;
use App\Http\Controllers\DashboardUsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Middleware\isAdmin;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//rute url
Route::get('/', [HomeController::class, 'home']); 

Route::get('/about', [HomeController::class, 'about']); 

Route::get('/contact', [HomeController::class, 'contact']); 

Route::get('/posts', [PostController::class, 'index']);

Route::get('/register', [LoginController::class, 'register'])->middleware('guest');

Route::get('/login',[LoginController::class, 'login'])->name('login')->middleware('guest');

//rute data
Route::get('/posts/{post:slug}', [PostController::class, 'show']); 

Route::get('/categories', [CategoryController::class, 'index']); 

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/register', [LoginController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminDashboardCategoryController::class, 'checkSlug'])->middleware('auth');

Route::get('/dashboard/users/{user}', [DashboardUsersController::class, 'show'])->name('dashboard.users.show')->middleware('auth');

Route::get('/dashboard/admins/users', [DashboardUsersController::class,'Allusers'])->name('dashboard.admins.users.index')->middleware('admin');

Route::get('/dashboard/admins/users/{user:username}', [DashboardUsersController::class, 'Adminedituser'])->middleware('admin');

Route::put('/dashboard/admins/users/{user:username}', [DashboardUsersController::class, 'Adminupdateuser'])->middleware('admin');

//rute resource
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminDashboardCategoryController::class)->except('show')->middleware(isAdmin::class);

Route::resource('/dashboard/authors', DashboardUsersController::class)->except('index', 'create', 'store')->middleware('auth');
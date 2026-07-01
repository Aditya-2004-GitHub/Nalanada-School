<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::view('/', 'pages.home')->name('Home');
Route::view('/about', 'pages.about')->name('About');
Route::view('/academics', 'pages.academics')->name('Academics');
Route::view('/admissions', 'pages.admissions')->name('Admissions');
Route::view('/campus-facilities', 'pages.campusFacilities')->name('CampusFacilities');
Route::view('/student-life', 'pages.studentLife')->name('StudentLife');
Route::view('/faculty-staff', 'pages.facultyStaff')->name('FacultyStaff');
Route::view('/cbse-corner', 'pages.cbseCorner')->name('CBSECorner');
Route::view('/book-lists', 'pages.bookLists')->name('BookLists');
Route::view('/contact', 'pages.contact')->name('Contact');


// Guest routes - only accessible when NOT logged in
Route::middleware('guest')->group(function () {
    Route::get('/administrator/login', [UserController::class, 'login'])->name('login');
    Route::get('/administrator/register', [UserController::class, 'register'])->name('register');
    Route::post('login', [UserController::class, 'logincheck'])->name('logincheck');
    Route::post('register', [UserController::class, 'registercheck'])->name('registercheck');
});

Route::get('/not-authorized', [UserController::class, 'notAuthorized'])->name('notAuthorized');

// Logout route - requires authentication
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

// Admin routes - protected by admin middleware (auth + admin role)
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/dashboard/student', [AdminController::class, 'store'])->name('admin.storeStudent');
    Route::get('/admin/dashboard/student/delete/{id}', [AdminController::class, 'delete'])->name('admin.deleteStudent');
});


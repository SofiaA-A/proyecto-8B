<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MachineryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SaleController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('editoriales', App\Http\Controllers\EditorialController::class)->middleware('auth');

//Machinery

Route::get('/machinery', [MachineryController::class, 'index'])->name('machinery.index');
Route::get('/machinery/dt', [MachineryController::class, 'cargarDT'])->name('machinery.dt');
Route::get('/machinery/create', [MachineryController::class, 'create'])->name('machinery.create');
Route::post('/machinery', [MachineryController::class, 'store'])->name('machinery.store');
Route::get('/machinery/{id}/edit', [MachineryController::class, 'edit'])->name('machinery.edit');
Route::put('/machinery/{id}', [MachineryController::class, 'update'])->name('machinery.update');
Route::delete('/machinery/{id}', [MachineryController::class, 'destroy'])->name('machinery.destroy');

//service

Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');

//user

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

//person

Route::get('/people/create', [PersonController::class, 'create'])->name('people.create');
Route::post('/people', [PersonController::class, 'store'])->name('people.store');

//courses

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/dt', [CourseController::class, 'cargarDT'])->name('courses.dt');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

//sales

Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');

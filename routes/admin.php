<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TerminateController;
use App\Http\Livewire\Admin\CreateRole;
use App\Http\Livewire\Admin\EditRole;
use App\Http\Livewire\Admin\RoleComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\CategoryComponent;
use App\Http\Livewire\AdminUsers;

Route::get('',[HomeController::class,'index'])->middleware('can:Ver Dashboard')->name('home');



Route::resource('roles', RoleController::class)->names('roles');

//Route::post('role/{role}',[RoleComponent::class,'store'])->name('role.store');
//Route::put('role/{role}',[RoleComponent::class,'update'])->name('role.update');



Route::resource('users', UserController::class)->only(['index','edit','update'])->names('users');


//pendientes de aprobacion
Route::get('courses',[CourseController::class,'index'])->name('courses.index')->middleware('can:Ver Dashboard');
Route::get('courses/{course}',[CourseController:: class,'show'])->name('courses.show')->middleware('can:Actualizar Cursos');

//cursos terminados
Route::get('CoursesTerminate',[TerminateController::class,'index'])->name('terminate.index');
//Route::post('CoursesTerminate',[TerminateController::class,'recibe'])->name('terminate.recibe');

//aprobar curso 
Route::post('courses/{course}/approved', [CourseController::class,'approved'])->name('courses.approved');

//observar cursos
Route::get('courses/{course}/observation', [CourseController::class,'observation'])->name('courses.observation');
Route::post('courses/{course}/reject', [CourseController::class,'reject'])->name('courses.reject');


Route::resource('categories', CategoryController::class)->names('categories')->middleware('can:Actualizar Categoria');
Route::resource('prices', PriceController::class)->names('prices')->middleware('can:Actualizar Precios');

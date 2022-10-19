<?php

use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\AprobarResource;
use App\Http\Livewire\Instructor\CourseResource;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CourseStudents;
use App\Http\Livewire\Instructor\Cupones;
use App\Http\Livewire\Instructor\Oferta;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'instructor/courses');

Route::resource('courses', CourseController::class)->names('courses')->middleware(['verified']);
Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:Actualizar Cursos','verified')->name('courses.curriculum');
Route::get('courses/{course}/goals',[CourseController::class,'goals'])->name('courses.goals')->middleware(['verified']);
Route::get('courses/{course}/students',CourseStudents::class)->middleware('can:Actualizar Cursos','verified')->name('courses.students');

Route::post('courses/{course}/status',[CourseController::class,'status'])->name('courses.status');


Route::get('courses/{course}/resour',CourseResource::class)->name('courses.complete')->middleware('can:Actualizar Cursos','verified');

Route::get('courses/{course}/observation',[CourseController::class,'observation'])->name('courses.observation');
//aprobar curso completado
Route::post('course/{course}',[AprobarResource::class,'aprobar'])->name('course.aproved');

//cupon
Route::get('courses/{course}/coupons',Cupones::class)->middleware('can:Actualizar Cursos','verified')->name('courses.coupon');
Route::get('courses/{course}/ofertas',Oferta::class)->middleware('can:Actualizar Cursos','verified')->name('courses.ofertas');
//Route::get('courses/{course}/coupons',Cupones::class)->middleware('can:Actualizar Cursos')->name('courses.coupon');





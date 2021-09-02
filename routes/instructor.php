<?php

use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CourseStudents;
use Illuminate\Support\Facades\Route;

Route::redirect('', 'instructor/courses');

Route::resource('courses', CourseController::class)->names('courses');
Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:Actualizar Cursos')->name('courses.curriculum');
Route::get('courses/{course}/goals',[CourseController::class,'goals'])->name('courses.goals');
Route::get('courses/{course}/students',CourseStudents::class)->middleware('can:Actualizar Cursos')->name('courses.students');

Route::post('courses/{course}/status',[CourseController::class,'status'])->name('courses.status');

Route::get('courses/{course}/observation',[CourseController::class,'observation'])->name('courses.observation');


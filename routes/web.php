<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\CourseStatus;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');





//route socialite/
Route::get('login/{driver}', [LoginController::class, 'redirectToProvider']);
Route::get('login/{driver}/callback', [LoginController::class, 'handleProviderCallback']);




Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('cursos',[CourseController::class,'index'])->name('courses.index');

Route::get('cursos/{course}',[CourseController::class,'show'])->name('courses.show');

Route::post('courses/{course}/enrolled',[CourseController::class,'enrolled'] )->middleware('auth')->name('courses.enrolled');
Route::post('courses/{course}/cupons',[CourseController::class,'applycupon'])->name('courses.applycupon');
Route::get('course-status/{course}',CourseStatus::class )->name('courses.status')->middleware('auth');

Route::post('courses/{course}', [CourseController::class,'complete'])->name('coursestatus.complete');
Route::get('courses/', [CourseController::class,'mecourse'])->name('courses.mecourses');



//paginas adicionales
//Route::get('terminos', [HomeController::class,'terms'])->name('termi.show');
//Route::get('contactanos', [HomeController::class,'contact'])->name('contact');
//Route::get('politicas', [HomeController::class,'policy'])->name('poli.show');


//contact
Route::get('/contact-us',[ContactController::class,'contact'])->name('contact');
Route::post('/sendmessage',[ContactController::class,'sendEmail'])->name('contact.send');


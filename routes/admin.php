<?php

use App\Http\Controllers\Admin\AsignarController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\admin\CuponController;
use App\Http\Controllers\Admin\CuponsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OfertaController;
use App\Http\Controllers\admin\OfertasController;
use App\Http\Controllers\Admin\PermisosController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\Roles as AdminRoles;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\TerminateController;
use App\Http\Livewire\Admin\CreateRole;
use App\Http\Livewire\Admin\EditRole;
use App\Http\Livewire\Admin\RoleComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\CategoryComponent;
use App\Http\Livewire\Admin\Prices\PriceComponent;
use App\Http\Livewire\AdminUsers;
use App\Http\Livewire\Roles;
use Illuminate\Http\Request;


Route::get('',[HomeController::class,'index'])->middleware('can:Ver Dashboard')->name('home');



/* Route::resource('roles', RoleController::class)->names('roles'); */

//Route::post('role/{role}',[RoleComponent::class,'store'])->name('role.store');
//Route::put('role/{role}',[RoleComponent::class,'update'])->name('role.update');



Route::resource('users', UserController::class)->only(['index','edit','update'])->names('users');


//pendientes de aprobacion
Route::get('courses',[CourseController::class,'index'])->name('courses.index')->middleware('can:Leer Cursos');
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


Route::resource('role', RolesController::class)->names('role')->middleware('can:Editar Usuarios');
Route::resource('permisos', PermisosController::class)->names('permisos')->middleware('can:Editar Usuarios');
Route::resource('asignar', AsignarController::class)->names('asignar')->middleware('can:Editar Usuarios');


/* Route::get('prices',PriceComponent::class)->name('prices'); */

Route::get('reporte', [ReportController::class,'index'])->name('reporte.index')->middleware('can:Actualizar Precios');
Route::get('reporte/{user}', [ReportController::class,'show'])->name('reporte.show')->middleware('can:Actualizar Precios');
Route::get('reporte/{course}/detalles', [ReportController::class,'detalles'])->name('reporte.detalles')->middleware('can:Actualizar Precios');
/* Route::get('{d1?}/{d2}/{d3}', [ReportController::class,'download'])->name('reporte.download')->middleware('can:Actualizar Precios'); */
/* Route::get('ofertas', [OfertasController::class,'index'])->name('oferta.index')->middleware('can:Actualizar Precios'); */
/* Route::get('cupon', [CuponController::class,'index'])->name('cupon.index')->middleware('can:Actualizar Precios');
Route::get('cupon/{course}', [CuponController::class,'show'])->name('cupon.show')->middleware('can:Actualizar Precios'); */
/* Route::resource('cupon',CuponController::class)->names('cupon')->middleware('can:Actualizar Precios'); */
Route::get('ofertas', [OfertaController::class,'index'])->name('oferta.index');
Route::resource('cupons', CuponsController::class)->names('cupons');



/* Route::post('download/', function (Request $request) {
    //
    $datos=$request->data;
    $title=$request->title;
    $suma=$request->suma;
    return dd($title);
    $pdf = PDF::loadView('livewire.admin.reporte.download',compact('title','suma'));
    return $pdf->stream('pruebapdf.pdf');
})->name('reporte.download');
 */
Route::post('exportExcel/',[ReportController::class,'exportExcel'])->name('exportexcel');








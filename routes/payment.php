<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::get('{course}/{coupon}/checkout',[PaymentController::class,'checkout'])->name('checkout')->middleware(['verified']);
Route::get('{course}/checkout',[PaymentController::class,'checkoutt'])->name('checkoutt')->middleware(['verified']);
Route::get('{course}/cupon/{coupon}/pay',[PaymentController::class,'pay'])->name('pay');
Route::get('{course}/pay',[PaymentController::class,'payy'])->name('payy');

Route::get('{course}/approved', [PaymentController::class,'approved'])->name('approved');
Route::get('{course}/{coupon}/approved', [PaymentController::class,'approvedb'])->name('approvedb');


Route::group(['prefix'=>'paypal'],function(){
    Route::post('/order/create', function ($id) {
        
    });
});

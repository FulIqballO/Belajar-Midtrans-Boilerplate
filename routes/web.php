<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orders/{order:invoice_number}', [OrderController::class, 'show'])->name('orders.show');

Route::get('/payment/success', function(){
    echo "Sukses Pembyaran, silahkan tunggu proses aktivasi";
});

Route::post('/payment/callback', [PaymentController::class, 'handleCallBack'])->name('payment.callback');
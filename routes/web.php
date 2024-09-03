<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/{customer}', [CustomerController::class, 'orders'])->name('customers.orders');
Route::get('items/{order}', [CustomerController::class, 'items'])->name('customers.order.items');

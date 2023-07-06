<?php
use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;


Route::get('/', [NavigationController::class, 'index'])->name('index');
Route::post('/', [NavigationController::class, 'SendMail'])->name('SendMail');



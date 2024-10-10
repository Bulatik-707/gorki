<?php
namespace App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Главная стр
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Брони пользователя. Доб бронь
Route::get('/ub', [UserController::class,'index'])->name('ub'); 
Route::post('/ub/create', [UserController::class,'create'])->name('create_ub'); 
// Поиск
Route::get('/ub/search', [UserController::class,'search'])->name('ub_search');

// Админ
// Все брони
Route::get('/admin/index', [BronController::class,'index'])->name('index'); 
// Доб броннь
Route::get('/admin/create', [BronController::class,'add'])->name('add'); 
Route::post('/admin/create', [BronController::class,'create'])->name('create'); 
// Редактировать бронь
Route::get('{id}/admin/edit', [BronController::class,'edit'])->name('edit'); 
Route::post('{id}/admin/edit/', [BronController::class,'update'])->name('update'); 
// Удалить бронь
Route::get('{id}/admin/index/', [BronController::class,'delete'])->name('delete'); 
// Поиск
Route::get('/admin/index/search', [BronController::class,'search'])->name('search');

Route::get('/home', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
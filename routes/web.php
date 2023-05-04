<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/employees', EmployeeController::class);
Route::resource('/companies', CompanyController::class)->middleware(['auth', 'role:admin']);
Route::get('/search',[CompanyController::class,'search'])->name('companies.search');
Route::post('/search',[CompanyController::class,'CompanySearch'])->name('companies.searching');

Route::resource('/projects', ProjectController::class)->middleware(['auth', 'role:admin']);


require __DIR__ . '/auth.php';

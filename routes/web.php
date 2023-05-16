<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FilterController;

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});


Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/employees', EmployeeController::class);
});


Route::group(['middleware' =>
['can:create companies, edit companies,  upadte companies, delete companies',]], function () {
    Route::resource('/companies', CompanyController::class)->middleware(['auth', 'role:admin']);
    Route::resource('/projects', ProjectController::class)->middleware(['auth', 'role:admin']);
    Route::get('/search', [CompanyController::class, 'search'])->name('companies.search');
    Route::get('search-company', [CompanyController::class, 'showSearch']);
    Route::get('company-search', [CompanyController::class, 'company']);
    Route::resource('/filter', FilterController::class);
});


require __DIR__ . '/auth.php';

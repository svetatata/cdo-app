<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\CallRequestController;
use App\Http\Controllers\ProgramController;

Route::get('/', function () {
    $randomPrograms = \App\Models\Program::where('is_active', true)
        ->inRandomOrder()
        ->take(3)
        ->get();
        
    $randomInstitutions = \App\Models\Institution::where('is_active', true)
        ->inRandomOrder()
        ->take(3)
        ->get();
        
    return view('home', [
        'randomPrograms' => $randomPrograms,
        'randomInstitutions' => $randomInstitutions
    ]);
});
Route::get('/how-to-apply', function () {
    return view('pages.how-to-apply');
})->name('how-to-apply');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{slug}', [ProgramController::class, 'show'])->name('programs.show');

Route::get('/contacts', function () {
    return view('pages.contacts');
})->name('contacts');
Route::get('/how-to-study', function () {
    return view('pages.how-to-study');
})->name('how-to-study');
Route::get('/payment', function () {
    return view('pages.payment');
})->name('payment');
Route::get('/search', function () {
    $query = request('query');

    return view('pages.search-results', [
        'query' => $query]);
})->name('search');

//Route::post('/application/submit', [ApplicationController::class, 'submit']);

Route::get('/profile', function () {
    return view('pages.profile');
});

// Маршруты для программ обучения
Route::get('/degree', function () {
    return view('pages.degree');
});

// Маршруты для учебных заведений
Route::get('/institutions', [InstitutionController::class, 'index'])->name('institutions.index');
Route::get('/institutions/{slug}', [InstitutionController::class, 'show'])->name('institutions.show');

Route::get('/application/create', [ApplicationController::class, 'create'])->name('application.create');
Route::post('/call-request', [CallRequestController::class, 'store'])->name('call-request.store');
Route::post('/application/submit', [ApplicationController::class, 'submit'])->name('application.submit');
Route::get('/application/programs', [ApplicationController::class, 'getPrograms'])->name('application.programs');
// Route::middleware('guest')->group(function () {
//     Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [UserController::class, 'login']);
//     Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
//     Route::post('/register', [UserController::class, 'register']);
// });

// Маршруты авторизации
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
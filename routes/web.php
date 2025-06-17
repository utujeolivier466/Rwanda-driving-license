<?php

use App\Http\Controllers\candidateController;
use App\Http\Controllers\gradeController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\reportController;
use App\Models\candidate;


// User Authontication Router
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

// Route for Candidate and Grade
Route::get('/candidate', function () {
    return view('candidate.index_candidate');
});
Route::get('/add_candidate', function () {
    return view('candidate.form_candidate');
});
Route::get('/grade', function () {
    return view('grade.index_grade');
});

Route::get('/add_grade', [gradeController::class, 'add_grade'])->name('grade.add_grade');

Route::get('/report', function () {
    return view('report');
});


// Route::get('/add_grade', function () {
//       $candidates=candidate::all();
//     return view('grade.form_grade',compact('candidates'));
// });


Route::get('/dashboard', [registerController::class, 'dashboard'])->name('dashboard')->middleware('App\Http\Middleware\user');


// AUthontication Rote
Route::post('/register_admin', [registerController::class, 'register_admin'])->name('register.store');
Route::post('/login_admin', [registerController::class, 'login_admin'])->name('register.login');
Route::get('/logout', [registerController::class, 'logout'])->name('logout');



// candidate Route with controller
Route::get('candidate', [candidateController::class, 'select_canditate'])->name('candidate');
Route::post('/candidate/insert', [candidateController::class, 'register_candidate'])->name('candidate.register_candidate');
Route::get('/edit_candidate/{id}', [candidateController::class, 'edit_candidate'])->name('candidate.edit_grade');
Route::put('/update_candidate/{id}', [candidateController::class, 'update_candidate'])->name('candidate.update_candidate');
Route::delete('/delete_candidate/{id}', [candidateController::class, 'delete_candidate'])->name('candidate.delete_candidate');

// Grade Route with controller
Route::get('grade', [gradeController::class, 'select_grade'])->name('grade');
Route::get('/select_candidate/{id}', [gradeController::class, 'select_candidate'])->name('grade.select_candidate');
Route::post('/grade/insert', [gradeController::class, 'register_grade'])->name('grade.register_grade');
Route::get('/edit_grade/{id}', [gradeController::class, 'edit_grade'])->name('grade.edit_grade');
Route::put('/update_grade/{id}', [gradeController::class, 'update_grade'])->name('grade.update_grade');
Route::delete('/delete_grade/{id}', [gradeController::class, 'delete_grade'])->name('grade.delete_grade');

// Report Route with controller
Route::get('/report', [reportController::class, 'index'])->name('report');

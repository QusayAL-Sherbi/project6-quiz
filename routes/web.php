<?php

use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/admin', function () {
//     return view('admin.manage_exam');
// });

Route::post('/exam', [ExamController::class, 'store'])->name('exam.store');

Route::get('/admin', [ExamController::class, 'index'])->name('admin');

Route::get('/delete/{id}', [ExamController::class, 'destroy'])->name('question_delete');

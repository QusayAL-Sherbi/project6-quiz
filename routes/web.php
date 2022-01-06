<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
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

Route::get('/question', [QuestionController::class, 'index'])->name('question');

Route::get('/delete/{id}', [ExamController::class, 'destroy'])->name('question_delete');

Route::get('/delete_question/{id}', [QuestionController::class, 'destroy'])->name('question.delete');

Route::get('/edit/{id}', [ExamController::class, 'edit'])->name('exam.edit');

Route::get('/edit_question/{id}', [QuestionController::class, 'edit'])->name('question.edit');

Route::post('/update/{id}', [ExamController::class, 'update'])->name('exam.update');

Route::post('/question_update/{id}', [QuestionController::class, 'update'])->name('question.update');

Route::post('/question_store', [QuestionController::class, 'store'])->name('question.store');

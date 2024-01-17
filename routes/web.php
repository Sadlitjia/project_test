<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\ItemQuestionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');


//Pengguna admin
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');
Route::get('/pengguna/edit/{pengguna}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
Route::put('/pengguna/edit/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
Route::delete('/pengguna/delete/{pengguna}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');


//OPD admin
Route::resource('admin/opd', OpdController::class)->names('admin.opd');
Route::get('/admin/opd', [OpdController::class, 'index'])->name('admin.opd');
Route::post('/admin/opd', [OpdController::class, 'store'])->name('admin.opd.store');
Route::get('/admin/opd/edit/{opd}', [OpdController::class, 'edit'])->name('admin.opd.edit');
Route::put('/admin/opd/edit/{opd}', [OpdController::class, 'update'])->name('admin.opd.update');
Route::delete('/admin/opd/delete/{opd}', [OpdController::class, 'destroy'])->name('admin.opd.destroy');


// Template_question admin
Route::get('/admin/template_question', [TemplateController::class, 'index'])->name('admin.template_question');
Route::post('/admin/template_question/store', [TemplateController::class, 'store'])->name('admin.template.store');
Route::get('/admin/template_question/edit/{template_question}', [TemplateController::class, 'edit'])->name('admin.template.edit');
Route::put('/admin/template_questions/{template_question}', [TemplateController::class, 'update'])->name('admin.template.update');
Route::delete('/admin/template_questions/{template_question}', [TemplateController::class, 'destroy'])->name('admin.template.destroy');


// Item_question admin
Route::get('/admin/item_question', [ItemQuestionController::class, 'index'])->name('admin.item_question');
Route::post('/admin/item_question/store', [ItemQuestionController::class, 'store'])->name('admin.item_question.store');
Route::get('/admin/item_question/edit/{item_question}', [ItemQuestionController::class, 'edit'])->name('admin.item_question.edit');
Route::put('/admin/item_question/{item_question}', [ItemQuestionController::class, 'update'])->name('admin.item_question.update');
Route::delete('/admin/item_question/{item_question}', [ItemQuestionController::class, 'destroy'])->name('admin.item_question.destroy');


// Answer admin
Route::get('/admin/answer_question/opd', [AnswerController::class, 'showOpdList'])->name('admin.opd_list');
Route::get('/admin/answer_question/opd/{opd}', [AnswerController::class, 'showAnswersByOpd'])->name('admin.answers');
// Route::get('/admin/answer', [AnswerController::class, 'index'])->name('admin.answer');



// Route User 
Route::get('/user', [UserController::class, 'index'])->name('user.index');
// user input form
Route::get('/user/form', [UserController::class, 'pertanyaan'])->name('user.form');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
// user history
Route::get('/user/history', [UserController::class, 'history'])->name('user.history');
Route::get('/user/history/{tanggal}', [UserController::class, 'showAnswersByDate'])->name('user.history.date');
Route::get('/user/answer/{template}', [UserController::class, 'joinAnswerQuestions'])->name('user.answer');


// Export pdf
Route::get('/admin/export/pdf/{opd}', [ExportController::class, 'exportToPDF'])->name('admin.export.pdf');
Route::get('/export/excel/{opd}', [ExportController::class, 'exportToExcel'])->name('export.excel');
Route::get('/export/print/{opd}', [ExportController::class, 'printPDF'])->name('export.print');
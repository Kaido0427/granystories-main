<?php

use App\Http\Controllers\AnecdoteController;
use App\Models\anecdote;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/anecdote/create', [AnecdoteController::class, 'create'])->name('anecdote.create');
Route::post('/anecdote/store', [AnecdoteController::class, 'store'])->name('anecdote.store');
Route::get('/anecdotes', [AnecdoteController::class, 'index'])->name('anecdotes');
Route::get('/anecdote/{id}', [AnecdoteController::class, 'show'])->name('anecdote.show');


Route::get('/', function () {

    $anecdotes = Anecdote::orderBy('created_at', 'asc')->get();

    return view('book', compact('anecdotes'));
})->name('book');

Route::get('/allAnecdotes', [anecdoteController::class, 'getAnecdotes']);

Route::post('/download-pdf', [anecdoteController::class, 'generatePdf']);


Route::get('/access', function () {
    return view('auth.login');
})->name('access');

Route::get('/generate-pdf', [App\Http\Controllers\HomeController::class, 'generatePDF'])->name('generate.pdf');


Route::get('/pdfbook', function () {

    $anecdotes = Anecdote::orderBy('created_at', 'asc')->get();

    return view('pdfbook', compact('anecdotes'));
})->name('pdfbook');
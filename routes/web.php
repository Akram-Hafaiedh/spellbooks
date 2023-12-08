<?php

use App\Http\Controllers\SpellBookController;
use App\Models\SpellBook;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::controller(SpellBookController::class)->group(function () {
    Route::get('/', 'index')->name('spellbooks.index');
    Route::post('/{spellbook}/update', 'update')->name('spellbooks.update');
    Route::get('/upload', 'upload')->name('spellbooks.upload');
    Route::get('/show/{spellBook}', 'show');
    Route::delete('/{spellbook}', 'destroy')->name('spellbooks.destroy');
});

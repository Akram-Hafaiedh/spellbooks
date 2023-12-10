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

Route::redirect('/', '/spellbooks');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::controller(SpellBookController::class)->group(function () {
    Route::get('spellbooks/', 'index')->name('spellbooks.index');
    Route::get('spellbooks/{spellBook}/show', 'show')->name('spellbooks.show');
    Route::post('spellbooks/{spellbook}/update', 'update')->name('spellbooks.update');
    Route::get('spellbooks/{id}/edit', 'edit')->name('spellbooks.edit');
    Route::post('spellbooks/upload', 'upload')->name('spellbooks.upload');
    Route::delete('spellbooks/{id}', 'destroy')->name('spellbooks.destroy');
});

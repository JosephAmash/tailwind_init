<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DiaryController;

Route::get('/', [DiaryController::class, 'index'])->name('diary.index');
Route::get('/create', [DiaryController::class, 'create'])->name('diary.create');
Route::post('/', [DiaryController::class, 'store'])->name('diary.store');
Route::get('/{id}', [DiaryController::class, 'show'])->name('diary.show');
Route::get('/{id}/edit', [DiaryController::class, 'edit'])->name('diary.edit');
Route::put('/{id}', [DiaryController::class, 'update'])->name('diary.update');
Route::delete('/{id}', [DiaryController::class, 'destroy'])->name('diary.destroy');
Route::get('/search', [DiaryController::class, 'search'])->name('diary.search');
Route::get('/diary/mood/{mood}', [DiaryController::class, 'filterByMood'])->name('diary.filterByMood');
Route::get('/diary/statistics', [DiaryController::class, 'statistics'])->name('diary.statistics');


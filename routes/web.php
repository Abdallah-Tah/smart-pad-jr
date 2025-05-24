<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\MathKids;
use App\Livewire\SketchBoard;

Route::get('/', Home::class);
Route::get('/math-kids', MathKids::class)->name('math-kids');
Route::get('/sketch-board', SketchBoard::class)->name('sketch-board');

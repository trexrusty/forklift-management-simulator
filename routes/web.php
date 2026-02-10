<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameState\LoaderController;
use App\Http\Middleware\SaveSelector;
use Native\Desktop\Facades\Window;
use Inertia\Inertia;
Route::get('/', [LoaderController::class, 'index'])->name('index');
Route::get('/selectSave/{save}', [LoaderController::class, 'selectSave'])->name('selectSave');

Route::get('/test', function () {
    return Inertia::render('test');
})->name('test')->middleware(SaveSelector::class);







/*Route::post('/settings', function () {
    Window::open('settings-window')
        ->url(route('1', ['windowId' => 'settings-window']))
        ->width(800)
        ->height(600)
        ->title('Settings')
        ->resizable();
})->name('settings');*/
<?php

 Route::middleware(['auth'])->group(function () {
    Route::get('/', \App\Livewire\Home::class)->name('home');
    Route::get('/data', \App\Livewire\AllData::class)->name('data');
});

require __DIR__.'/auth.php';

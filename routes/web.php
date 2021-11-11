<?php
 
 Route::get('/', \App\Livewire\Home::class);
 Route::get('/', \App\Livewire\Home::class);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

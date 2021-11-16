<?php
 
 Route::get('/', \App\Livewire\Home::class)->middleware(['auth'])->name('home');
 
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

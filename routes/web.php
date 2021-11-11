<?php
 
 Route::get('/', \App\Livewire\Home::class);
 Route::get('/', \App\Livewire\Home::class);


// form 
// Route::get('/form', function () {
//     return view('form', ['records' => \App\Models\SMSFlowBack::paginate(50)]);
// });

// // process and show data .. 
// Route::post('/data', function () {
 
//     request()->validate([
//         'file' => 'required',
//     ]);
 
//     Excel::import(new \App\Imports\SMSFlowBackImport, request()->file('file'));

//     return redirect('/')->with('success', 'Data imported successfully.');   
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';

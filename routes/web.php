<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// form 
Route::get('/form', function () {
    return view('form', ['records' => \App\Models\SMSFlowBack::paginate(50)]);
});

// process and show data .. 
Route::post('/data', function () {
 
    request()->validate([
        'file' => 'required',
    ]);
 
    Excel::import(new \App\Imports\SMSFlowBackImport, request()->file('file'));

    return redirect('/')->with('success', 'Data imported successfully.');   
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

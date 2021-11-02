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

use App\Models\SMSFlowBack;
use App\Imports\SMSFlowBackImport;
use Maatwebsite\Excel\Facades\Excel;

// form 
Route::get('/', function () {
    return view('form', ['records' => SMSFlowBack::paginate(50)]);
});

// process and show data .. 
Route::post('/data', function () {
 
    request()->validate([
        'file' => 'required',
    ]);
 
    Excel::import(new SMSFlowBackImport, request()->file('file'));

    return redirect('/')->with('success', 'Data imported successfully.');   
});

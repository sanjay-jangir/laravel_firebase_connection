<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('fire-base', [FirebaseController::class]);
Route::get('fire-base', [FirebaseController::class, 'index']);
Route::get('insert',function(){
    $data = app('firebase.firestore')
    ->database()
    ->collection('activities')
    ->documents();

    if ($data->isEmpty()) {
     return collect();
    }

    $activities = collect($data->rows());
    dd($activities);
});

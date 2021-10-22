<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AttendeeController;
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

Route::redirect('/', 'login');



require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth'], 'prefix'=> '/dashboard'], function (){
    Route::resource('attendees', \App\Http\Controllers\AttendeeController::class);
});

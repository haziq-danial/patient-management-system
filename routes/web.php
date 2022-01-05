<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageAccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagePatientController;
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

Route::get('/', [HomeController::class, 'index']);

// mange account
Route::group(['prefix' => 'account', 'as' => 'manage-account.'], function () {
    Route::get('/view', [ManageAccountController::class, 'index'])
        ->name('view');
    Route::get('/edit', [ManageAccountController::class, 'edit'])
        ->name('edit');
    Route::post('/update/{user_id}', [ManageAccountController::class, 'update'])
        ->name('update');
   Route::post('/delete/{user_id}', [ManageAccountController::class, 'destroy'])
        ->name('delete');
});

Route::group(['prefix' => 'patient', 'as' => 'mananage-patient.'], function (){
    Route::get('/view', [ManagePatientController::class, 'index'])
        ->name('view');
    Route::get('/view/{patient_id}', [ManagePatientController::class, 'show'])
        ->name('show');

    Route::post('/store', [ManagePatientController::class, 'store'])
        ->name('store');

    Route::get('/edit/{patient_id}', [ManagePatientController::class, 'edit'])
        ->name('edit');
    Route::post('/update/{patient_id}', [ManagePatientController::class, 'update'])
        ->name('update');

    Route::post('/delete/{patient_id}', [ManagePatientController::class, 'destroy'])
        ->name('destroy');
});



require __DIR__.'/auth.php';

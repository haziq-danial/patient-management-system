<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageAccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagePatientController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ReceiptController;
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

Route::group(['prefix' => 'patient', 'as' => 'manage-patient.'], function (){
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

    Route::get('/delete/{patient_id}', [ManagePatientController::class, 'destroy'])
        ->name('destroy');
});

// manage medication
Route::group(['prefix' => 'medication', 'as' => 'manage-medication.'], function () {
    Route::get('/view', [MedicationController::class, 'index'])
        ->name('view');

    Route::get('/view/{medication_id}', [MedicationController::class, 'show'])
        ->name('show');

    Route::post('/store', [MedicationController::class, 'store'])
        ->name('store');

    Route::get('/edit/{medication_id}', [MedicationController::class, 'edit'])
        ->name('edit');
    Route::post('/update/{medication_id}', [MedicationController::class, 'update'])
        ->name('update');

    Route::get('/delete/{medication_id}', [MedicationController::class, 'destroy'])
        ->name('destroy');
});

Route::group(['prefix' => 'prescription', 'as' => 'manage-prescription.'], function () {
    Route::get('/index/{patient_id}', [PrescriptionController::class, 'index'])
        ->name('index');

    Route::get('/show/{prescription_id}', [PrescriptionController::class, 'show'])
        ->name('show');
    Route::get('/create/{patient_id}', [PrescriptionController::class, 'create'])
        ->name('create');
    Route::get('/edit/{prescription_id}', [PrescriptionController::class, 'edit'])
        ->name('edit');

    Route::post('/store/{patient_id}', [PrescriptionController::class, 'store'])
        ->name('store');
    Route::post('/update/{prescription_id}', [PrescriptionController::class, 'update'])
        ->name('update');
    Route::get('/delete/{prescription_id}', [PrescriptionController::class, 'destroy'])
        ->name('destroy');
});


require __DIR__.'/auth.php';

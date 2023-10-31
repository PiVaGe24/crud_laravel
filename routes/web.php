<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MachineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

//Route::resource('employee', 'App\Http\Controllers\EmployeeController');
Route::get('/employee',[EmployeeController::class,'index'])->name('employeeIndex');

//Route::get('/employee',[EmployeeController::class,'index'])->name('employeeIndex');
Route::get('/employee/create',[EmployeeController::class,'create'])->name('employeeCreate');
Route::post('/employee/create', [EmployeeController::class, 'store'])->name('employeeStore');
Route::get('/employee/edit/{id}',[EmployeeController::class,'edit'])->name('employeeEdit');
Route::put('/employee/edit/{id}',[EmployeeController::class,'update'])->name('employeeUpdate');
Route::delete('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employeeDestroy');
Route::view('/employee/delete/{id}','employee.modals.delete')->name('employeeDeleteModal');

Route::resource('role', 'App\Http\Controllers\RoleController');

Route::get('/machine',[MachineController::class,'index'])->name('machineIndex');
Route::get('/machine/create',[MachineController::class,'create'])->name('machineCreate');
Route::post('/machine/create',[MachineController::class,'store']);
Route::get('/machine/edit/{id}',[MachineController::class,'edit'])->name('machineEdit');
Route::put('/machine/edit/{id}',[MachineController::class,'update'])->name('machineUpdate');
Route::delete('/machine/delete/{id}',[MachineController::class,'destroy'])->name('machineDestroy');
Route::view('/machine/delete/{id}','machine.modals.delete')->name('machineDeleteModal');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

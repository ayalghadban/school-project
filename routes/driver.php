<?php
use App\Http\Controllers\Driver\DriverController;
use App\Http\Controllers\Driver\InformationAboutDriverController;
use Illuminate\Support\Facades\Route;


Route::prefix('school')->group(function () {
    
    //driver with driver informations

    Route::prefix('/driver')->group(function () {
        Route::get('/',[DriverController::class,'get_all_drivers'])->name('get_all_drivers');
        Route::get('/{id}',[DriverController::class,'get_one_driver'])->name('get_one_driver');
        Route::post('/create',[DriverController::class,'create_driver'])->name('create_driver');
        Route::post('/update/{id}',[DriverController::class,'update_driver'])->name('update_driver');
        Route::delete('/delete/{id}',[DriverController::class,'delete_driver'])->name('delete_driver');
        Route::prefix('/informations')->group(function(){
            Route::get('/',[InformationAboutDriverController::class,'get_all_drivers_informations'])->name('get_all_drivers_informations');
            Route::get('/{id}',[InformationAboutDriverController::class,'get_one_driver_information'])->name('get_one_driver_information');
            Route::post('/create',[InformationAboutDriverController::class,'create_driver_information'])->name('create_driver_information');
            Route::post('/update/{id}',[InformationAboutDriverController::class,'update_driver_information'])->name('update_driver_information');
            Route::delete('/delete/{id}',[InformationAboutDriverController::class,'delete_driver_information'])->name('delete_driver_information');
        });
    });
});

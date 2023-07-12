<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bus\BusController;
use App\Http\Controllers\Bus\InformationAboutBusController;

Route::prefix('school')->group(function () {
    //bus and information about bus

    Route::prefix('/bus')->group(function () {
        Route::get('/',[BusController::class,'get_all_buses'])->name('get_all_buses');
        Route::get('/{id}',[BusController::class,'get_one_bus'])->name('get_one_bus');
        Route::post('/create',[BusController::class,'create_bus'])->name('create_bus');
        Route::post('/update/{id}',[BusController::class,'update_bus'])->name('update_bus');
        Route::delete('/delete/{id}',[BusController::class,'delete_bus'])->name('delete_bus');
        Route::prefix('/informations')->group(function(){
            Route::get('/',[InformationAboutBusController::class,'get_all_buses_informations'])->name('get_all_buses_informations');
            Route::get('/{id}',[InformationAboutBusController::class,'get_one_bus_information'])->name('get_one_bus_information');
            Route::post('/create',[InformationAboutBusController::class,'create_bus_information'])->name('create_bus_information');
            Route::post('/update/{id}',[InformationAboutBusController::class,'update_bus_information'])->name('update_bus_information');
            Route::delete('/delete/{id}',[InformationAboutBusController::class,'delete_bus_information'])->name('delete_bus_information');
        });
    });
});

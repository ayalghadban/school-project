<?php

use App\Http\Controllers\Teacher\InformationAboutTeacherController;
use App\Http\Controllers\Teacher\TeacherController;
use Illuminate\Support\Facades\Route;

Route::prefix('/school')->group( function () {

    Route::prefix('/teacher')->group( function () {
        Route::get('/',[TeacherController::class,'get_all_teachers'])->name('get_all_teachers');
        Route::get('/{id}',[TeacherController::class,'get_one_teacher'])->name('get_one_teacher');
        Route::post('/create',[TeacherController::class,'create_teacher'])->name('create_teacher');
        Route::post('/update/{id}',[TeacherController::class,'update_teacher'])->name('update_teacher');
        Route::delete('/delete/{id}',[TeacherController::class,'delete_teacher'])->name('delete_teacher');
        Route::prefix('/informations')->group(function () {
            Route::get('/',[InformationAboutTeacherController::class,'get_all_teachers_informations'])->name('get_all_teachers_informations');
            Route::get('/{id}',[InformationAboutTeacherController::class,'get_one_teacher_information'])->name('get_one_teacher_information');
            Route::post('/create',[InformationAboutTeacherController::class,'create_teacher_information'])->name('create_teacher_information');
            Route::post('/update/{id}',[InformationAboutTeacherController::class,'update_teacher_information'])->name('update_teacher_information');
            Route::delete('/delete/{id}',[InformationAboutTeacherController::class,'delete_teacher_information'])->name('delete_teacher_information');
        });
    });
});

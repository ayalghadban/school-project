<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('school')->group(function () {

    //department

    Route::prefix('/department')->group(function () {
        Route::get('/',[DepartmentController::class,'get_all_departments'])->name('get_all_departments');
        Route::get('/{id}',[DepartmentController::class,'get_one_department'])->name('get_one_department');
        Route::post('/create',[DepartmentController::class,'create_department'])->name('create_department');
        Route::post('/update/{id}',[DepartmentController::class,'update_department'])->name('update_department');
        Route::delete('/delete/{id}',[DepartmentController::class,'delete_department'])->name('delete_department');
    });

    //course

    Route::prefix('/course')->group(function () {
        Route::get('/',[CourseController::class,'get_all_courses'])->name('get_all_courses');
        Route::get('/{id}',[CourseController::class,'get_one_course'])->name('get_one_course');
        Route::post('/create',[CourseController::class,'create_course'])->name('create_course');
        Route::post('/update/{id}',[CourseController::class,'update_course'])->name('update_course');
        Route::delete('/delete/{id}',[CourseController::class,'delete_course'])->name('delete_course');
    });

    //section

    Route::prefix('/section')->group(function () {
        Route::get('/',[SectionController::class,'get_all_sections'])->name('get_all_sections');
        Route::get('/{id}',[SectionController::class,'get_one_section'])->name('get_one_section');
        Route::post('/create',[SectionController::class,'create_section'])->name('create_section');
        Route::post('/update/{id}',[SectionController::class,'update_section'])->name('update_section');
        Route::delete('/delete/{id}',[SectionController::class,'delete_section'])->name('delete_section');
    });

    //subject

    Route::prefix('/subject')->group(function () {
        Route::get('/',[SubjectController::class,'get_all_subjects'])->name('get_all_subjects');
        Route::get('/{id}',[SubjectController::class,'get_one_subject'])->name('get_one_subject');
        Route::post('/create',[SubjectController::class,'create_subject'])->name('create_subject');
        Route::post('/update/{id}',[SubjectController::class,'update_subject'])->name('update_subject');
        Route::delete('/delete/{id}',[SubjectController::class,'delete_subject'])->name('delete_subject');
    });
});

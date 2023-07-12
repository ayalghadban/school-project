<?php

use App\Http\Controllers\Student\InformationAboutStudentController;
use App\Http\Controllers\Student\MarkController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;


Route::prefix('/school')->group( function () {
    Route::prefix('/student')->group(function () {
        Route::get('/',[StudentController::class,'get_all_students'])->name('get_all_students');
        Route::get('/{id}',[StudentController::class,'get_one_student'])->name('get_one_student');
        Route::get('/{section_id}',[StudentController::class,'get_students_for_one_section'])->name('get_students_for_one_section');
        Route::post('/create',[StudentController::class,'create_student'])->name('create_student');
        Route::post('/update/{id}',[StudentController::class,'update_student'])->name('update_student');
        Route::delete('/delete/{id}',[StudentController::class,'delete_student'])->name('delete_student');
        Route::prefix('/informations')->group(function () {
            Route::get('/',[InformationAboutStudentController::class,'get_all_students_informations'])->name('get_all_students_informations');
            Route::get('/{id}',[InformationAboutStudentController::class,'get_one_student_information'])->name('get_one_student_information');
            Route::post('/create',[InformationAboutStudentController::class,'create_student_information'])->name('create_student_information');
            Route::post('/update/{id}',[InformationAboutStudentController::class,'update_student_information'])->name('update_student_information');
            Route::delete('/delete/{id}',[InformationAboutStudentController::class,'delete_student_information'])->name('delete_student_information');
        });
        Route::prefix('/marks')->group(function () {
            Route::get('/',[MarkController::class,'get_all_marks'])->name('get_all_marks');
            Route::get('/{id}',[MarkController::class,'get_one_mark'])->name('get_one_mark');
            Route::get('/{student_id}',[MarkController::class,'get_marks_for_one_student'])->name('get_marks_for_one_student');
            Route::get('/{subject_id}',[MarkController::class,'get_marks_for_one_subject'])->name('get_marks_for_one_subject');
            Route::post('/create',[MarkController::class,'create_mark'])->name('create_mark');
            Route::post('/update/{id}',[MarkController::class,'update_mark'])->name('update_mark');
            Route::delete('/delete/{id}',[MarkController::class,'delete_mark'])->name('delete_mark');
        });
    });
});

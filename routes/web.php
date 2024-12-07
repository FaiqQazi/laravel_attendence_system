<?php
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    // Teacher Routes
    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::get('/teacher/attendance/{classId}', [TeacherController::class, 'showAttendanceForm'])->name('teacher.showAttendanceForm');
    Route::post('/teacher/attendance/{classId}', [TeacherController::class, 'markAttendance'])->name('teacher.storeAttendance');

    // Student Routes
    Route::get('/student/attendance', [StudentController::class, 'index'])->name('student.attendance');
});

<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeesController;
use App\Http\Controllers\Backend\JobsController;
use App\Http\Controllers\Backend\JobHistoryController;
use App\Http\Controllers\Backend\JobGradesController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register_post', [AuthController::class, 'register_post']);
Route::post('checkemail', [AuthController::class, 'CheckEmail']);
Route::post('login_post', [AuthController::class, 'login_post']);

//Admin || HR same name

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    //employees
    Route::get('admin/employees', [EmployeesController::class, 'index']);
    Route::get('admin/employees/add', [EmployeesController::class, 'add']);
    Route::post('admin/employees/add', [EmployeesController::class, 'add_post']);
    Route::get('admin/employees/view/{id}', [EmployeesController::class, 'view']);
    Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'edit']);
    Route::post('admin/employees/edit/{id}', [EmployeesController::class, 'update']);
    Route::get('admin/employees/delete/{id}', [EmployeesController::class, 'delete']);

    //jobs
    Route::get('admin/jobs', [JobsController::class, 'index']);
    Route::get('admin/jobs/add', [JobsController::class, 'add']);
    Route::post('admin/jobs/add', [JobsController::class, 'add_post']);
    Route::get('admin/jobs/view/{id}', [JobsController::class, 'view']);
    Route::get('admin/jobs/edit/{id}', [JobsController::class, 'edit']);
    Route::post('admin/jobs/edit/{id}', [JobsController::class, 'update']);
    Route::get('admin/jobs/delete/{id}', [JobsController::class, 'delete']);
    Route::get('admin/jobs_export', [JobsController::class, 'jobs_export']);

    //jog history

    Route::get('admin/job_history', [JobHistoryController::class, 'index']);

    Route::get('admin/job_history/add', [JobHistoryController::class, 'add']);

    Route::post('admin/job_history/add', [JobHistoryController::class, 'add_post']);

    Route::get('admin/job_history/edit/{id}', [JobHistoryController::class, 'edit']);
    Route::post('admin/job_history/edit/{id}', [JobHistoryController::class, 'update']);
    Route::get('admin/job_history/delete/{id}', [JobHistoryController::class, 'delete']);
    Route::get('admin/job_history_export', [JobHistoryController::class, 'job_history_export']);

    //job grades
    Route::get('admin/job_grades', [JobGradesController::class, 'index']);
    Route::get('admin/job_grades/add', [JobGradesController::class, 'add']);
    Route::post('admin/job_grades/add', [JobGradesController::class, 'add_post']);
});

Route::get('logout', [AuthController::class, 'logout']);

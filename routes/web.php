<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeacherController;

//use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', [App\Http\Controllers\HomeController::class,'logout']);



Route::get('student/dashboard', [StudentController::class, 'dashboard'])->name('student_dashboard')->middleware('student');
Route::get('student/profile', [StudentController::class, 'profile'])->name('profile')->middleware('student');
Route::post('student/save_profile', [StudentController::class, 'save_profile'])->name('save_profile')->middleware('student');
Route::get('student/add_project', [StudentController::class, 'new_project'])->name('new_project')->middleware('student');
Route::get('student/projects', [StudentController::class, 'projects'])->name('projects')->middleware('student');
Route::post('student/save_project', [StudentController::class, 'save_project'])->name('save_project')->middleware('student');
Route::get('student/edit_project/{id}', [StudentController::class, 'edit_project'])->name('edit_project')->middleware('student');
Route::post('student/update_project/{id}', [StudentController::class, 'update_project'])->name('update_project')->middleware('student');
Route::get('student/view_project/{id}', [StudentController::class, 'view_project'])->name('view_project')->middleware('student');
Route::get('student/add_member/{id}', [StudentController::class, 'add_member'])->name('add_member')->middleware('student');
Route::post('student/save_member', [StudentController::class, 'save_member'])->name('save_member')->middleware('student');




Route::get('admin/combination', [AdminController::class, 'combinations'])->name('combinations')->middleware('admin');
Route::get('admin/all_combination', [AdminController::class, 'all_combination'])->name('all_combinations')->middleware('admin');
Route::post('admin/save_combination', [AdminController::class, 'save_combination'])->name('save_combination')->middleware('admin');
Route::get('admin/users', [AdminController::class, 'users'])->name('users')->middleware('admin');
Route::get('admin/users/create', [AdminController::class, 'create_user'])->name('create_user')->middleware('admin');
Route::post('admin/users/store', [AdminController::class, 'create_staff'])->name('store_user')->middleware('admin');
//Route::get('admin/projects', [AdminController::class, 'projects'])->name('admin_projects')->middleware('admin');

Route::get('teacher/login', [LoginController::class, 'login']);
Route::post('teacher/login', [LoginController::class, 'store'])->name('teacher.login');
Route::get('teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');

Route::resource('members', MemberController::class);
Route::resource('admins', AdminProfileController::class);
Route::resource('admin/projects', ProjectController::class);
Route::get('admin/projects/pdf', [AdminController::class, 'createPDF']);
//Route::resource('student/projects', ProjectController::class);

//Route::get('admin/projects', [AdminController::class,'projects']);

Route::get('admin/profile', [AdminProfileController::class, 'index'])->name('admin.index')->middleware('admin');
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('admin');
Route::get('admin/projects/{$id}', [ProjectController::class, 'show_project'])->name('show_project')->middleware('auth');
Route::get('student/projects/create', [ProjectController::class, 'create'])->name('student.create')->middleware('auth');
//Route::get('student/projects', [ProjectController::class, 'index'])->name('projects')->middleware('student');
//Route::get('student/projects/{$id}', [StudentController::class, 'show_project'])->name('show_project')->middleware('student');
Route::get('student/delete/{id}', [ProjectController::class, 'delete'])->name('delete');
//Route::get('student/delete/{id}', [ProjectController::class, 'delete'])->name('delete');

Route::post('student/material/create', [MaterialController::class, 'store'])->name('material.store')->middleware('auth');
<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\higherAuthorityController;
use App\Http\Controllers\departmentController;
use Illuminate\Support\Facades\Route;


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
    return view('login');
});

Route::get('/admin', [adminController::class, 'home'])->name('admin');
Route::get('/department', [departmentController::class, 'home'])->name('department');
Route::get('/higher_authority', [higherAuthorityController::class, 'home'])->name('higher_authority');
// Route::get('/higher_authority_semester_compare', [higherAuthorityController::class, 'semesterCompare'])->name('higher_authority_semester_compare');

Route::get('/bar', function () {
    return view('higherAuthority.graphs.samples.bar');
});
Route::get('/doubleBar', function () {
    return view('higherAuthority.graphs.samples.doubleBar');
});
Route::get('/line', function () {
    return view('higherAuthority.graphs.samples.line');
});
Route::get('/pie', function () {
    return view('higherAuthority.graphs.samples.pie');
});
Route::get('/table', function () {
    return view('higherAuthority.graphs.samples.table');
});




Route::post('/login', [authController::class, 'login'])->name('login');
Route::post('/create_user', [adminController::class, 'createUser'])->name('create_user');
Route::post('/upload_csv', [departmentController::class, 'uploadCSV'])->name('upload_csv');
Route::post('/enroll_section', [departmentController::class, 'enroll_section'])->name('enroll_section');
Route::post('/show_Difference', [higherAuthorityController::class, 'showDifference'])->name('show_Difference');
Route::post('/semester_wise_revenue_report', [higherAuthorityController::class, 'functional_requirements_1'])->name('functional_requirements_1');
Route::post('/section_allotment_report', [higherAuthorityController::class, 'functional_requirements_2'])->name('functional_requirements_2');
Route::post('/comparative_analysis_of_unsused_resources', [higherAuthorityController::class, 'functional_requirements_3'])->name('functional_requirements_3');
Route::post('/class_size_distribution_report', [higherAuthorityController::class, 'functional_requirements_4'])->name('functional_requirements_4');
Route::post('/schedule_modification_report', [higherAuthorityController::class, 'functional_requirements_5'])->name('functional_requirements_5');
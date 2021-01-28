<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\companyLoginController;
use App\Http\Controllers\companyEmployeesController;
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
});Route::get('/company/banking' , [companyLoginController::class , 'banking_create']);
Route::post('/company/addbank' , [companyLoginController::class , 'addbank']);
Route::get('/company/viewbank' , [companyLoginController::class , 'viewbank']);
Route::get('/company/editbank/{id}' , [companyLoginController::class , 'editbank']);
Route::post('/company/updatebank' , [companyLoginController::class , 'updatebank']);
Route::post('/company/deletebank' , [companyLoginController::class , 'deletebank']);
Route::get('/company/company_address' , [companyLoginController::class , 'company_address']);
Route::post('/company/addaddress' , [companyLoginController::class , 'addaddress']);
Route::get('/company/viewcompany_addresses' , [companyLoginController::class , 'viewcompany_addresses']);
Route::get('/company/edit_address/{c_hash}' , [companyLoginController::class , 'edit_address']);
Route::post('/company/update_address' , [companyLoginController::class , 'update_address']);
Route::post('/company/deleteaddress' , [companyLoginController::class , 'deleteaddress']);


Route::get('/dashboard', function () {
    return view('dashboard.default');
});

Route::get('/dashboard/employee/add', function () {
    return view('dashboard.employee_management.add_employee');
});


// Route::get('/front_end/company/login',[companyLoginController::class, 'index']);
Route::post('/company/dashboard',[companyLoginController::class, 'login']);
Route::get('/dashboard', function () {
    return view('dashboard.default');
});

Route::get('/front_end/company/dashboards',function(){
    return view('dashboard.main_dashboard');
});

// Company Employees Controller

Route:: get('/company/employee_index' , [companyEmployeesController::class , 'employee_index']);
Route::post('/company/employee_insert' , [companyEmployeesController::class , 'employee_insert']);
Route::get('/company/employee_view',   [companyEmployeesController::class , 'employee_view']);
Route::get('/company/employee_edit/{id}' , [companyEmployeesController::class , 'employee_edit']);
Route::post('/company/employee_update' , [companyEmployeesController::class , 'employee_update']);
Route::post('/company/employee_delete' , [companyEmployeesController::class , 'employee_delete']);
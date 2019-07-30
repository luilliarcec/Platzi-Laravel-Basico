<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Expenses Reports */
Route::resource('/expense_reports', 'ExpenseReportController');

Route::get('/expense_reports/{expense_report}/confirm_delete', 'ExpenseReportController@confirmDelete')
    ->name('expense_reports.confirmDelete');

Route::get('/expense_reports/{expense_reports}/send_mail', 'ExpenseReportController@confirmSendMail')
    ->name('expense_reports.confirmSendMail');

/* Expenses */
Route::get('/expense_reports/{expense_reports}/expense/create', 'ExpenseController@create')
    ->name('expense.create');

Route::post('/expense_reports/{expense_reports}/expense', 'ExpenseController@store')
    ->name('expense.store');

Route::delete('/expense_reports/{expense_reports}/expense/{expense}', 'ExpenseController@destroy')
    ->name('expense.destroy');

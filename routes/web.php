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

Route::resource('/expense_reports', 'ExpenseReportController');

Route::resource('/expense_reports/{expense_reports}/expense', 'ExpenseController');

Route::get('/expense_reports/{id}/confirm_delete', 'ExpenseReportController@confirmDelete')->name('expense_reports.confirmDelete');

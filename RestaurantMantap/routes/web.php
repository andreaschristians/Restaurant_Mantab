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
Route::redirect('lara-admin','login');
Route::get('/welcome','HomeController@index')->name('welcome');
Route::post('/reservation','ReservationController@reserve')->name('reservation.reserve');
Route::post('/contact','ContactController@sendMessage')->name('contact.send');

//login for employee
Route::get('/', 'Auth\SigninController@showLoginForm')->name('signin');
Route::post('/signin', 'Auth\SigninController@login')->name('signin.post');
Route::post('/signout', 'Auth\SigninController@logout')->name('signout');
Route::group(['prefix'=>'employee','middleware'=>'employee','namespace'=>'Employee'], function() {
    Route::get('/', 'EmployeeController@index')->name('employee');
    
    Route::get('waiter/mainwaiter', 'WaiterController@index')->name('employee.waiter.mainwaiter');
    Route::get('waiter/choosetable', 'WaiterController@table')->name('employee.waiter.choosetable');
    Route::get('waiter/order/{number}/{status}/{emp}', 'WaiterController@order')->name('employee.waiter.order');
    Route::post('waiter/ordermenu', 'WaiterController@ordermenu')->name('employee.waiter.ordermenu');
    Route::get('waiter/reserve', 'WaiterController@reserve')->name('employee.waiter.reserve');
    Route::post('waiter/reservestore', 'WaiterController@reservestore')->name('employee.waiter.reservestore');
    
    //cashier
    Route::get('cashier/maincashier','CashierController@index')->name('employee.cashier.maincashier');
    //cashier billing
    Route::get('cashier/billing','CashierController@billing')->name('employee.cashier.billing');
    Route::get('cashier/closebill/{number}','CashierController@closebill')->name('employee.cashier.closebill');
    //cashier payment
    Route::get('cashier/paytable','CashierController@paytable')->name('employee.cashier.paytable');
    Route::get('cashier/payment','CashierController@payment')->name('employee.cashier.payment');
});

Auth::routes();

//login for admin
Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'Admin'], function (){
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('employee','EmployeeController');
    Route::resource('table','TableController');
    Route::resource('category','CategoryController');
    Route::resource('menu','MenuController');
    Route::resource('order','OrderController');
    
    Route::get('reservation','ReservationController@index')->name('reservation.index');
    
    Route::post('reservation/{id}','ReservationController@status')->name('reservation.status');
    Route::delete('reservation/{id}','ReservationController@destroy')->name('reservation.destroy');
});
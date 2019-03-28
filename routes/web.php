<?php

Route::get('/', 'SiteController@index')->name('home');
Route::get('/primary', 'SiteController@primary')->name('balanço');
Route::get('/erro', 'admin\adminController@iniciar')->name('iniciar');
Route::get('admin', 'admin\adminController@index')->name('admin');


// deposito
Route::get('/balance.deposit', 'admin\BalanceController@deposit')->name('deposito');
// saque
Route::get('/balance.withdrawn', 'admin\BalanceController@withdrawn')->name('saque ');
// Transferencia
Route::get('/balance.tranfer', 'admin\BalanceController@tranfer')->name('Transferencia');
// saldo 
Route::get('balance', 'admin\BalanceController@index')->name('balanço');



// historico
Route::get('historic', 'admin\HistoricController@getHistorico')->name('historico ');
Route::get('historic_edit', 'admin\HistoricController@historic_edit')->name('historico ');
Route::get('historic_delete', 'admin\HistoricController@historic_delete')->name('historico ');



// adicionar saldo
Route::post('/deposit', 'admin\BalanceController@depositStore')->name('add_Saldo');
// sacar saldo
Route::post('/withdrawn', 'admin\BalanceController@withdrawnStore')->name('withdrawn.store');
// transferir 
Route::post('/ConfirmTranf', 'admin\BalanceController@ConfirmTranf')->name('tranfer.store');
//fim_da_transferencia contas_a_pagar
Route::post('/transfer', 'admin\BalanceController@transferStrore')->name('tranfer.store');



//contas_a_pagar contas_a_pagar.add_pay
Route::get('contas_a_pagar', 'admin\BalanceController@getPagar')->name('contas_a_pagar ');
//contas_a_pagar.add_pay add_receive
Route::get('add_receive', 'admin\BalanceController@add_receive')->name('add_receive ');

Route::get('add_pay', 'admin\BalanceController@add_pay')->name('add_pay ');

Route::post('add_payStore', 'admin\BalanceController@add_payStore')->name('add_payStore');
Route::post('add_receiveStore', 'admin\BalanceController@add_receiveStore')->name('add_receiveStore');
//contas_a_receber
Route::get('contas_a_receber', 'admin\BalanceController@getReceber')->name('contas_a_receber');
Route::get('account_pay_delete', 'admin\BalanceController@account_pay_delete')->name('account_pay_delete');
Route::get('account_receive_delete', 'admin\BalanceController@account_receive_delete')->name('account_pay_receive');


Route::get('account_pay', 'admin\BalanceController@account_pay')->name('account_pay');






Auth::routes();



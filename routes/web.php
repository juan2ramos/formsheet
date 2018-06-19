<?php

Route::get( '/', function () {
	return view( 'home' );
} );
Route::get( 'principal', 'PrincipalController@index' );
Route::post( 'principal', 'PrincipalController@calculate' )->name( 'calculate' );
Route::post( 'principalMail', 'PrincipalController@principalMail' )->name( 'principalMail' );

<<<<<<< HEAD
Route::get( 'ruta-empresarial', 'BusinessController@index' )->name('business');
Route::post( 'ruta-empresarial', 'BusinessController@quotation' )->name('quotation');
Route::post( 'quotation', 'BusinessController@quotationMail' )->name('quotationMail');

Route::get( 'traslado-dentro-de-la-ciudad', 'TransferController@index' )->name('transfer');
Route::get( 'transporte-puerta-a-puerta', 'TransportDoorController@index' )->name('transportDoor');
=======
Route::get( 'ruta-empresarial', 'BusinessController@index' )->name( 'business' );
Route::post( 'ruta-empresarial', 'BusinessController@quotation' )->name( 'quotation' );
Route::post( 'quotation', 'BusinessController@quotationMail' )->name( 'quotationMail' );
>>>>>>> b28d591cb75890af540ec9117d82b101feac3158

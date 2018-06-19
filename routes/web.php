<?php

Route::get( '/', function () {
	return view( 'home' );
} );
Route::get( 'principal', 'PrincipalController@index' );
Route::post( 'principal', 'PrincipalController@calculate' )->name( 'calculate' );
Route::post( 'principalMail', 'PrincipalController@principalMail' )->name( 'principalMail' );

Route::get( 'ruta-empresarial', 'BusinessController@index' )->name( 'business' );
Route::post( 'ruta-empresarial', 'BusinessController@quotation' )->name( 'quotation' );
Route::post( 'quotation', 'BusinessController@quotationMail' )->name( 'quotationMail' );

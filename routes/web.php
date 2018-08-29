<?php

use Illuminate\Support\Facades\Mail;

Route::get( '/', function () {
	return view( 'home' );
} );
Route::get( 'principal', 'PrincipalController@index' );
Route::post( 'principal', 'PrincipalController@calculate' )->name( 'calculate' );
Route::post( 'principalMail', 'PrincipalController@principalMail' )->name( 'principalMail' );


Route::get( 'ruta-empresarial', 'BusinessController@index' )->name('business');
Route::post( 'ruta-empresarial', 'BusinessController@quotation' )->name('quotation');
Route::post( 'quotation', 'BusinessController@quotationMail' )->name('quotationMail');

Route::get( 'traslado-dentro-de-la-ciudad', 'TransferController@index' )->name('transfer');
Route::get( 'transporte-puerta-a-puerta', 'TransportDoorController@index' )->name('transportDoor');
Route::get('sendtest', function(){
   $jk = Mail::to('juan2ramos@gmail.com')->send(new \App\Mail\test());
   dd($jk);
});
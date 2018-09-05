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
Route::post('transferCalculate', 'TransferController@calculate')->name('transferCalculate');
Route::post('transferSubmit', 'TransferController@submit')->name('transferSubmit');


Route::get( 'transporte-puerta-a-puerta', 'TransportDoorController@index' )->name('transportDoor');
Route::post( 'getTravelsDoor', 'TransportDoorController@availability' )->name('travelsDoor');
Route::post( 'getTravelsDoorSend', 'TransportDoorController@send' )->name('travelsDoorSend');


Route::get('sendtest', function(){
  Mail::to('juan2ramos@gmail.com')->send(new \App\Mail\test());
});

Route::post('/space', 'AttachmentController@store')->name('space');
Route::get('/show', 'AttachmentController@show')->name('show');

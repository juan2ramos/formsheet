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
<<<<<<< HEAD
=======

Route::get('/space',function(){
    return view('space');
});
Route::post('/space', 'AttachmentController@store')->name('space');
Route::get('/show', 'AttachmentController@show')->name('show');principalMail
>>>>>>> da08bcf96916f00667674e8709c0e7a119fa6450

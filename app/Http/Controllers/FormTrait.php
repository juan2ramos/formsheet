<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_Sheets;
use Revolution\Google\Sheets\Sheets;

trait FormTrait{
	function sheet( $id, $sheet ) {

		$client = new Google_Client();
		$client->setApplicationName( 'Google Sheets ' );
		$client->setScopes( Google_Service_Sheets::SPREADSHEETS_READONLY );
		$file = storage_path( 'credentials.json' );
		$client->setAuthConfig( $file );

		$service = new Google_Service_Sheets( $client );
		$sheets  = new Sheets();
		$sheets->setService( $service );
		$values = $sheets->spreadsheet( $id )->sheet( $sheet )->all();

		return collect( $values );
	}
}

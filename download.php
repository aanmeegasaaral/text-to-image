<?php
$content = array();

require_once __DIR__ . '/vendor/autoload.php';

use JonnyW\PhantomJs\Client;

$client = Client::getInstance();
$width  = 3840;
$height = 2160;
$top    = 0;
$left   = 0;
$client->getEngine()->setPath( __DIR__ . '/vendor/bin/phantomjs.exe' );
$request = $client->getMessageFactory()->createCaptureRequest( 'https://aanmeegasaaral.pc/html.php', 'GET' );

$i = 1;
foreach ( $content as $id => $con ) {
	$request->setRequestData( array( 'text' => urlencode( $con ) ) ); // Set post data
	$request->setOutputFile( './output/' . $i . '.png' );
	$request->setViewportSize( $width, $height );
	$request->setCaptureDimensions( $width, $height, $top, $left );
	$response = $client->getMessageFactory()->createResponse();
	$client->send( $request, $response );
	$i++;
};


<?php
if ( ! defined( 'SITE_URL' ) ) {
	die;
}
$current = time();
$folder  = 'img/' . $current;
mkdir( __DIR__ . '/' . $folder, 0777, true );
error_reporting( 0 );
date_default_timezone_set( 'Asia/Kolkata' );
global $content;

$final_content = array();
$content       = explode( PHP_EOL, $content );
$i             = 0;
foreach ( $content as $c ) {
	if ( ! empty( $c ) ) {
		$final_content[ $i ] = ( ! isset( $final_content[ $i ] ) ) ? '' : $final_content[ $i ];
		$final_content[ $i ] .= trim( $c ) . PHP_EOL;
	} else {
		if ( isset( $final_content[ $i ] ) ) {
			$final_content[ $i ] = trim( $final_content[ $i ] );
		}
		$i++;
	}
}

require_once __DIR__ . '/vendor/autoload.php';

use JonnyW\PhantomJs\Client;

$client = Client::getInstance();
$width  = 3840;
$height = 2160;
$top    = 0;
$left   = 0;
$client->getEngine()->setPath( __DIR__ . '/vendor/bin/phantomjs.exe' );
$request = $client->getMessageFactory()->createCaptureRequest( SITE_URL . 'html.php', 'POST' );

$i = 1;
foreach ( $final_content as $id => $con ) {
	$request->setRequestData( array( 'text' => urlencode( $con ) ) ); // Set post data
	$request->setOutputFile( './' . $folder . '/' . $i . '.jpg' );
	$request->setViewportSize( $width, $height );
	$request->setCaptureDimensions( $width, $height, $top, $left );
	$response = $client->getMessageFactory()->createResponse();
	$client->send( $request, $response );
	$i++;
}

$files  = glob( './' . $folder . '/*', GLOB_NOSORT );
$output = array();
foreach ( $files as $file ) {
	$id                      = basename( $file );
	$output[ intval( $id ) ] = SITE_URL . '?download=' . base64_encode( urlencode( $folder . '/' . $id ) );
}
ksort( $output );
echo '<br/><br/><div class="container">';
foreach ( $output as $i => $val ) {
	echo <<<HTML
#${i} : <a href="${val}">${val}</a> <br/> <br/>
HTML;

}
echo '</div>';
exit;
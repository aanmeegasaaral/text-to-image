<?php
global $templates;
define( 'SITE_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/t2i/' );
set_time_limit( 0 );

$templates = array(
	'templates/html.php'    => 'Large Content',
	'templates/heading.php' => 'Heading',
);

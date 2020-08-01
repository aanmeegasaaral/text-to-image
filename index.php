<?php
global $templates;
require_once __DIR__ . '/config.php';

if ( isset( $_REQUEST['download'] ) ) {
	$file = __DIR__ . './' . urldecode( base64_decode( $_REQUEST['download'] ) );
	header( 'Content-type: octet/stream' );
	header( 'Content-disposition: attachment; filename=' . basename( $file ) . ';' );
	header( 'Content-Length: ' . filesize( $file ) );
	readfile( $file );
	exit;
}
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
	  integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<?php
if ( isset( $_REQUEST['content'] ) && isset( $_REQUEST['generate'] ) ) {
	global $content;
	$content = $_REQUEST['content'];
	require_once __DIR__ . '/download.php';
}
?>


<div class="container mt-5">
	<form method="post" enctype="multipart/form-data">
		<table class="table table-hover table-bordered">
			<tr>
				<td><textarea name="content" class="form-control" style="width:100%; min-height: 300px;"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<?php
					foreach ( $templates as $file => $template ) {
						$id = md5( $file );
						echo <<<HTML
<div class="custom-control custom-radio custom-control-inline"><input name="template" type="radio" class="custom-control-input" id="${id}" value="${file}"><label
			class="custom-control-label" for="${id}">${template}</label></div>
HTML;
					}
					?>
				</td>
			</tr>
			<tr>
				<td>
					<button type="submit" name="generate" class="btn btn-success">Generate</button>
				</td>
			</tr>
		</table>
	</form>
</div>
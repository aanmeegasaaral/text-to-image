<?php
if ( ! defined( 'APP' ) ) {
	die;
} ?>
<style>
	body {
		background: #fff;
	}

	div.text {
		color: maroon;
		text-align: center;
		margin: 0 auto;
		font-size: 300px;
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		padding: 200px 0;
		line-height: 380px;
		letter-spacing: 0px;
		font-weight: bolder;
	}

	img.watermark {
		width: 650px;
	}

	div.watermarkc {
		position: fixed;
		z-index: -1;
		top: 0;
		opacity: 0.4;
		left: 0;
		right: 0;
		text-align: center;
	}
</style>
<body>
<div class="text"> <?php echo urldecode( $_REQUEST['text'] ); ?></div>
<div class="watermarkc">
	<img src="aa-logo.png" class="watermark"/>
</div>

</body>
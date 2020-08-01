<?php
$color = array(
	'background-color: #08AEEA; background-image: linear-gradient(0deg, #08AEEA 0%, #2AF598 100%);',
	'background-color: #FBAB7E; background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);',
	'background-color: #8EC5FC; background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);',
	'background-color: #52ACFF; background-image: linear-gradient(180deg, #52ACFF 25%, #FFE32C 100%);',
	'background-color: #FFE53B; background-image: linear-gradient(147deg, #FFE53B 0%, #FF2525 74%);',
	'background-color: #FEE140; background-image: linear-gradient(90deg, #FEE140 0%, #FA709A 100%);',
	'background-color: #FA8BFF; background-image: linear-gradient(45deg, #FA8BFF 0%, #2BD2FF 52%, #2BFF88 90%);',
	'background-color: #FAD961; background-image: linear-gradient(90deg, #FAD961 0%, #F76B1C 100%);',
	'background-color: #8BC6EC; background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);',
	'background-color: #FF9A8B; background-image: linear-gradient(90deg, #FF9A8B 0%, #FF6A88 55%, #FF99AC 100%);',
);

$i     = mt_rand( 0, ( count( $color ) - 1 ) );
$color = ( isset( $color[ $i ] ) ) ? $color[ $i ] : false;
?>


<style>
	body {
		background: #000;
		height: 100%;
		width: 100%;
		margin: 0;
		position: relative;
	}

	div.maintxt {
		position: fixed;
		top: 25%;
	}

	div.text {
	<?php echo $color; ?> -webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
		text-align: center;
		font-size: 450px;
		font-weight: bolder;
		position: relative;
	}
</style>
<body>
<div class="maintxt">
	<div class="text"> <?php echo urldecode( $_REQUEST['text'] ); ?> </div>
</div>
</body>
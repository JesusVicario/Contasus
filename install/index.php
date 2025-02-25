<?php 
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
if(stripos($ua,'android') !== false) {
	?>
	<script type="text/javascript">
		function ir(){
			location.href = 'https://play.google.com/store/apps/details?id=appinventor.ai_jvicariovaladez.Contasus';
		}
		ir();
	</script>
	<?php
	}
if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod')) {
	?>
	<script type="text/javascript">
		function ir(){
			location.href = 'iphone.php';
		}
		ir();
	</script>
	<?php
}
?>
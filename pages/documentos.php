<?php 
session_start();
if ($_SESSION["iniciosesion"] == "autorizado") {
if (isset($_POST["correo"])) {
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Documentos - Contasus</title>
	<?php 
	if ($_COOKIE["color"] == "azul") {
		?>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<?php 
	} else {
		?>
		<link rel="stylesheet" type="text/css" href="../css/style2.css">
		<?php
	}
	?>
	<link href="../favicon.png" rel="icon" type="imagen/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<script type="text/javascript" src="../js/script.js"></script>
	<meta charset="utf-8">
	<style type="text/css">
		h2{
			text-align: center;
			margin-top:15vw;
		}

	</style>
</head>
<body>
	<?php include "../header.php" ?>
	<?php include "../flechaatras.php" ?>
	<h2>Documentos</h2>
	<h3 style="text-align:center;">¡Enviado!</h3>
	<p style="text-align:center;">Mira tu correo electrónico.</p>
	<?php
			$mail = $_COOKIE['correo'];
			$subject = "¡Rayados de contabilidad!";
			$message = "<!DOCTYPE html>
<html>
<head>
	<title>Rayados de contabilidad</title>
	<style type='text/css'>
		.divcabecera{
			margin-top:2vw;
		}
	</style>
</head>
<body>
	<div class='divcabecera'>
		<img style='width:100%;' src='https://contasus.es/img/logomail.png'>
	</div>
	<div style='text-align: center;margin-top:5vw;'>
		<h1>¡Hola!</h1>
		<h2>Dejamos el enlace para descargar el pdf con los rayados de contabilidad</h2>
		<p>Para descargar el documento</p><a href='https://www.contasus.es/pages/rayadocontabilidad.pdf'>aquí</a>
	</div>
</body>
</html>";

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <info@contasus.es>' . "\r\n";

				mail($mail,$subject,$message,$headers);


?>
</body>
</html>

<?php

} else {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Documentos - Contasus</title>
	<?php 
	if ($_COOKIE["color"] == "azul") {
		?>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<?php 
	} else {
		?>
		<link rel="stylesheet" type="text/css" href="../css/style2.css">
		<?php
	}
	?>
	<link href="../favicon.png" rel="icon" type="imagen/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<script type="text/javascript" src="../js/script.js"></script>
	<meta charset="utf-8">
	<style type="text/css">
		h2{
			text-align: center;
			margin-top:15vw;
		}

	</style>
</head>
<body>
	<?php include "../header.php" ?>
	<?php include "../flechaatras.php" ?>
	<h2>Documentos</h2>
	<p style="text-align: center;">Para solicitar los documentos de rayados de contabilidad por correo electrónico pulsa el siguiente botón</p>
	<form style="width:100%;display: flex;justify-content: center;align-items: center;" method="post" action="">
		<input type="submit" value="Aquí" name="correo">
	</form>
</body>
</html>

<?php
}}
?>
<?php
session_start();
if ($_SESSION["iniciosesion"] == "autorizado") {
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajustes | Contasus</title>
	<?php 
	if ($_COOKIE["color"] == "azul") {
		?>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<?php 
	} else {
		?>
		<link rel="stylesheet" type="text/css" href="css/style2.css">
		<?php
	}
	?>
<style type="text/css">
	#flechaatras{
		background-color: transparent;
		color:white;
		border: transparent;
		position: absolute;
		top:3vw !important;
		left: 5vw !important;
		font-size: 9vw;
		margin-top:0 !important;
		margin-left: 0 !important;
		width: auto !important;
	}
</style>
	<link href="../favicon.png" rel="icon" type="imagen/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/script.js"></script>
	<meta charset="utf-8">
</head>
<body>
	<?php 
	include "header.php";
	?>
	<button id="flechaatras" onclick="location.href='index2.php'">←</button>
	<h2 style="text-align: center;">Ajustes</h2>
	<div class="ajustes">
		<a href="cerrarsesion.php"><div>
			<img src="img/cerrar.png">
			<p>Cerrar sesión</p>
		</div></a>
		<a href="modooscuro.php"><div>
			<img src="img/modooscuro.png">
			<p>Modo oscuro</p>
		</div></a>
		<a href="legal/privacidad.php"><div>
			<img src="img/politicadeprivacidad.png">
			<p>Política de privacidad</p>
		</div></a>
		<a href="legal/cookies.php"><div>
			<img src="img/politicadecookies.png">
			<p>Política de cookies</p>
		</div></a>
		<a href="legal/legal.php"><div>
			<img src="img/avisolegal.png">
			<p>Aviso legal</p>
		</div></a>
		<a href="cerrarcuenta.php"><div>
			<img src="img/cerrarcuenta.png">
			<p>Cerrar cuenta</p>
		</div></a>
	</div>
</body>
</html>
<?php
} else {
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajustes | Contasus</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="../favicon.png" rel="icon" type="imagen/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/script.js"></script>
	<meta charset="utf-8">
</head>
<body>
	<h1>No tienes acceso a esta página</h1>
</body>
</html>
<?php
}
?>
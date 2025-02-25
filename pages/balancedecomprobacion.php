<?php 
session_start();
if ($_SESSION["iniciosesion"] == "autorizado") {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Balance de comprobación - Contasus</title>
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
	<h2>Balance de comprobación</h2>
	<form class="formulariobalance">
		<input type="number" id="inputnumber" placeholder="¿Cuántas cuentas hay?" name="cantidad">
	</form>
	<div>
		<button id="botonbalance" onclick="crearbalance()">Confirmar</button>
	</div>
	<p id="respuesta"></p>
</body>
</html>
<?php
} else {
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajustes | Contasus</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="../favicon.png" rel="icon" type="imagen/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="../js/script.js"></script>
	<meta charset="utf-8">
</head>
<body>
	<h1>No tienes acceso a esta página</h1>
</body>
</html>
<?php
}
?>

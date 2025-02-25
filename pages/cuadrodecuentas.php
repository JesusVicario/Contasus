<?php
session_start();
if ($_SESSION["iniciosesion"] == "autorizado") { 
header ('Content-type: text/html; charset=utf-8'); 
if (isset($_POST["english"])) {
	$_SESSION["idioma"] = "english";
} else {
	if (isset($_SESSION["idioma"])) {
		unset($_SESSION['idioma']);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cuadro de cuentas - Contasus</title>
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
	<meta charset="utf-8">
	<style type="text/css">
		h2{
			text-align: center;
			margin-top:15vw;
		}
		#botonborrar{
			display: none;
			width: 10%;
			border:transparent;
			background-color:transparent;
			font-size: 4vw;
			font-weight: bold;
			position: absolute;
			left: 70%;
		}
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
</head>
<body>
	<?php include "../header.php" ?>
	<button id="flechaatras" onclick="location.href='../index2.php'">←</button>
	<h2>Cuadro de cuentas</h2>
	<div class="cuadrocuentas">
		<form>
			<input type="text" style="width: 80% !important;" placeholder="Escribe el nombre de una cuenta" name="cuenta" onkeyup="cuentas(this.value)">
			<input id="botonborrar" onclick="botoneliminar()" type="reset" value="x">
		</form>
		<?php 
		if (isset($_SESSION["idioma"])) {
			?>
			<form action="" method="post" style="width: auto;">
				<input style="width: 10vw !important;" src="../img/espanol.png" type="image" name="spanish">
			</form>
		</div>
			<?php
		} else {
			?>
			<form action="" method="post" style="width: auto;">
				<input type="text" style="display: none;" value="english" name="english">
				<input style="width: 10vw !important;" src="../img/ingles.png" type="image" name="english">
			</form>	
	</div>	
			<?php
		}
	?>
	<div id="respuesta"></div>
</body>
</html>

<?php 
}  else {
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
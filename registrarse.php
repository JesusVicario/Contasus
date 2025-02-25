<?php 
session_start();
if (isset($_POST["nombre"])) {
	$_SESSION["nombre"] = $_POST["nombre"];
	$_SESSION["apellidos"] = $_POST["apellidos"];
	$_SESSION["correo"] = strtolower($_POST["correo"]);
	$_SESSION["contra"] = $_POST["contra"];
	$_SESSION["contra2"] = $_POST["contra2"];
	$_SESSION["numeroaleatorio"] = rand(1, 999999999999);
	$comprobar = 0;
	if ($_SESSION["contra"] == $_SESSION["contra2"]) {
		include "conn.php";
		$sql = "SELECT * FROM registros";
		$tabla2 = $conn->query($sql);
		while ($row = mysqli_fetch_assoc($tabla2)) {
			if ($_SESSION["correo"] == $row["correo"]) {
				$comprobar++;
			}
		}
	if ($comprobar > 0) {
				?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>¡Bienvenido a Contasus!</title>
			<link rel="stylesheet" type="text/css" href="../css/style.css">
			<link href="../favicon.png" rel="icon" type="imagen/x-icon">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<script type="text/javascript" src="js/script.js"></script>
			<style type="text/css">
				body{
					background-image: url(img/fondoregistro.jpg);
					background-repeat: no-repeat;
					background-size: 100vw 100vh;
				}

			</style>
		</head>
		<body>
			<?php include "header.php" ?>
			<?php include "../flechaatras.php" ?>
			<div id="inicio">
				<h3 style="margin-top:7vw;">Registro</h3>
				<p>Este correo ya está registrado</p>
				<form method="post" action="">
					<input type="text" placeholder="Nombre" required name="nombre">
					<input type="text" placeholder="Apellidos" required name="apellidos">
					<input type="mail" placeholder="Correo electrónico" required name="correo">
					<input type="password" placeholder="Contraseña" required name="contra">
					<input type="password" placeholder="Contraseña" required name="contra2">
					<label><input style="width: initial;" type="checkbox"name="politicas" required> Acepto las <a href="legal/privacidad.php">Políticas de privacidad</a></label>
					<input type="submit" value="Enviar">
				</form>		
			</div>
		</body>
		</html>
		<?php
	} else {
		$sql2 = "INSERT INTO registros (nombre, apellidos, correo, contra, idcontrolsesion, idiniciosesion, autorizado) VALUES ('$_SESSION[nombre]', '$_SESSION[apellidos]', '$_SESSION[correo]', '$_SESSION[contra]', '$_SESSION[numeroaleatorio]', '$_SESSION[numeroaleatorio]', 'No')";
		if ($conn->query($sql2)) {
				$to = $_SESSION["correo"];
				$subject = "¡Bienvenid@ a Contasus!";
				$message = "<!DOCTYPE html>
<html>
<head>
	<title>Correo de bienvenida</title>
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
		<h1>Bienvenid@ a Contasus</h1>
		<h2>Estamos muy contentos de tenerte con nosotros</h2>
		<p>El siguiente paso para confirmar tu registro es revisar la solicitud de registro y en un plazo de 24 - 48 horas te responderemos si te hemos aceptado.</p>
	</div>
</body>
</html>";

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <info@contasus.es>' . "\r\n";

				mail($to,$subject,$message,$headers);

				$to2 = "jvicariovaladez@gmail.com";
				$subject2 = "Nueva solicitud Contasus";
				$message2 = "Hemos recibido una solicitud de registro de ". $_SESSION["nombre"] . " " . $_SESSION["apellidos"]  . "\r\n";
				$message2 .= "Aceptar:" . " " . "https://contasus.es/aprobardenegar.php?r=aprobado&id=". $_SESSION["numeroaleatorio"]  . "\r\n";
				$message2 .= "Denegar:" . " " . "https://contasus.es/aprobardenegar.php?r=noaprobado&id=" . $_SESSION["numeroaleatorio"]  . "\r\n";

				$headers2 = "MIME-Version: 1.0" . "\r\n";
				$headers2 .= 'From: <info@contasus.es>' . "\r\n";

				mail($to2,$subject2,$message2,$headers2);

				header("Location:index.php");

		} else {
			echo "no";
		}}
	} else {
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>¡Bienvenido a Contasus!</title>
			<link rel="stylesheet" type="text/css" href="../css/style.css">
			<link href="../favicon.png" rel="icon" type="imagen/x-icon">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<script type="text/javascript" src="js/script.js"></script>
			<style type="text/css">
				body{
					background-image: url(img/fondoregistro.jpg);
					background-repeat: no-repeat;
					background-size: 100vw 100vh;
				}

			</style>
		</head>
		<body>
			<?php include "header.php" ?>
			<?php include "../flechaatras.php" ?>
			<div id="inicio">
				<h3 style="margin-top:7vw;">Registro</h3>
				<p>Las contraseñas no coinciden</p>
				<form method="post" action="">
					<input type="text" placeholder="Nombre" required name="nombre">
					<input type="text" placeholder="Apellidos" required name="apellidos">
					<input type="mail" placeholder="Correo electrónico" required name="correo">
					<input type="password" placeholder="Contraseña" required name="contra">
					<input type="password" placeholder="Contraseña" required name="contra2">
					<label><input style="width: initial;" type="checkbox"name="politicas" required> Acepto las <a href="legal/privacidad.php">Políticas de privacidad</a></label>
					<input type="submit" value="Enviar">
				</form>		
			</div>
		</body>
		</html>
		<?php		
	}
} else {
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>¡Bienvenido a Contasus!</title>
			<link rel="stylesheet" type="text/css" href="../css/style.css">
			<link href="../favicon.png" rel="icon" type="imagen/x-icon">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
			<script type="text/javascript" src="js/script.js"></script>
			<style type="text/css">
				body{
					background-image: url(img/fondoregistro.jpg);
					background-repeat: no-repeat;
					background-size: 100vw 100vh;
				}

			</style>
		</head>
		<body>
			<?php include "header.php" ?>
			<?php include "../flechaatras.php" ?>
			<div id="inicio">
				<h3 style="margin-top:7vw;">Registro</h3>
				<form method="post" action="">
					<input type="text" placeholder="Nombre" required name="nombre">
					<input type="text" placeholder="Apellidos" required name="apellidos">
					<input type="mail" placeholder="Correo electrónico" required name="correo">
					<input type="password" placeholder="Contraseña" required name="contra">
					<input type="password" placeholder="Contraseña" required name="contra2">
					<label><input style="width: initial;" type="checkbox"name="politicas" required> Acepto las <a href="legal/privacidad.php">Políticas de privacidad</a></label>
					<input type="submit" value="Enviar">
				</form>			
			</div>
		</body>
		</html>
		<?php
}
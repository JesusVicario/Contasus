<?php 
session_start();
if (isset($_POST["correo"])) {
	if ($_SESSION["correo"] == $_POST["correo"]) {
		include "conn.php";
		$sql2 = "DELETE FROM registros WHERE id=$_SESSION[id]";
	  	if ($conn->query($sql2)) {
	  		setcookie("idiniciosesion", "", time());
			setcookie("correo", "", time());
			setcookie("contra", "", time());
			setcookie("color", "", time());
			session_destroy();
	  		header("Location:index.php");
				$to = $_SESSION["correo"];
				$subject = "¡Estamos tristes!";
				$message = "<!DOCTYPE html>
<html>
<head>
	<title>Correo de despedida</title>
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
		<h1>Nos despedimos de ti</h1>
		<h2>Nunca quisimos que esto llegará aquí</h2>
		<p>Este correo es la confirmación de que tu cuenta en Contasus se ha eliminado definitivamente, esperamos que en un futuro nos veamos de nuevo :(.</p>
	</div>
</body>
</html>";

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <info@contasus.es>' . "\r\n";

				mail($to,$subject,$message,$headers);
	  	}
	} else {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cerrar cuenta | Contasus</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="../favicon.png" rel="icon" type="imagen/x-icon">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="js/script.js"></script>
	</head>
	<body>
		<?php include "header.php" ?>
		<?php include "flechaatras.php" ?>
		<h3 style="text-align: center;">Cerrar cuenta</h3>
		<p style="color: red;text-align: center;">Este correo no está asociado a tu cuenta</p>
		<div id="inicio">
			<form method="post" action="">
				<input type="email" placeholder="Correo electrónico" name="correo">
				<input type="image" src="img/aceptar.png">
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
		<title>Cerrar cuenta | Contasus</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="../favicon.png" rel="icon" type="imagen/x-icon">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="js/script.js"></script>
	</head>
	<body>
		<?php include "header.php" ?>
		<?php include "flechaatras.php" ?>
		<h3 style="text-align: center;">Cerrar cuenta</h3>
		<div id="inicio">
			<form method="post" action="">
				<input type="email" placeholder="Correo electrónico" name="correo">
				<input type="image" src="img/aceptar.png">
			</form>
		</div>
	</body>
</html>
<?php
}
<?php 
session_start();
$comprobar = 0;
include "conn.php";
if (isset($_GET["i"])) {
	$idcontrol = $_GET["i"];
	$mail = $_GET["c"];
$sql4 = "SELECT * FROM registros WHERE correo='$mail'";
$tabla4 = $conn->query($sql4);
while ($row = mysqli_fetch_assoc($tabla4)) {

	if ($row["correo"] == $mail) {
		if ($row["idiniciosesion"] == "cambiocontrasena") {
if (isset($_POST["contra1"])) {
		if ($_POST["contra1"] == $_POST["contra2"]) {
			$sql2 = "UPDATE registros SET contra='$_POST[contra1]' WHERE idcontrolsesion=$idcontrol";
			$sql5 = "UPDATE registros SET idiniciosesion='$row[idcontrolsesion]' WHERE idcontrolsesion=$idcontrol";
			if ($conn->query($sql2) && $conn->query($sql5)) {
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Cambio de contraseña | Contasus</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="../favicon.png" rel="icon" type="imagen/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<?php 
		include "header.php";
	?>
	<div id="inicio">
		<h3 style="margin-top:7vw;">Cambio de contraseña</h3>
		<h5>Contraseña actualizada</h5>
		<p>Inicie sesión desde la aplicación</p>
	</div>
</body>
</html>	
	<?php
			$subject = "¡Contraseña cambiada!";
			$message = "<!DOCTYPE html>
<html>
<head>
	<title>Cambio de contraseña</title>
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
		<h1>Hemos recibido una solicitud para cambiar la contraseña de tu cuenta</h1>
		<h2>Hemos cambiado tu contraseña</h2>
		<p>Si no has sido tu, te recomendamos que vayas a la aplicación y solicites cambiar tu contraseña.</p>
	</div>
</body>
</html>";

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <info@contasus.es>' . "\r\n";

				mail($mail,$subject,$message,$headers);


			}

		} else {
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Cambio de contraseña | Contasus</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="../favicon.png" rel="icon" type="imagen/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<?php 
		include "header.php";
	?>
	<div id="inicio">
		<h3 style="margin-top:7vw;">Cambio de contraseña</h3>
		<h5>Introduce la nueva contraseña</h5>
		<p style="color: red;font-weight: bold;">Las contraseñas no coinciden</p>
		<form method="post" action="">
			<input type="password" placeholder="Contraseña" required name="contra1">
			<input type="password" placeholder="Contraseña" required name="contra2">
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
	<title>Cambio de contraseña | Contasus</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="../favicon.png" rel="icon" type="imagen/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<?php 
		include "header.php";
	?>
	<div id="inicio">
		<h3 style="margin-top:7vw;">Cambio de contraseña</h3>
		<h5>Introduce la nueva contraseña</h5>
		<form method="post" action="">
			<input type="password" placeholder="Contraseña" required name="contra1">
			<input type="password" placeholder="Contraseña" required name="contra2">
			<input type="image" src="img/aceptar.png">
		</form>
	</div>
</body>
</html>	
	<?php
	}					
		} else{
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Cambio de contraseña | Contasus</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="../favicon.png" rel="icon" type="imagen/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<?php 
		include "header.php";
	?>
	<div id="inicio">
		<h3 style="margin-top:7vw;">Cambio de contraseña</h3>
		<h5>Ya se ha realizado el cambio</h5>
		<p>Si necesitas cambiar de nuevo la contraseña, solicitala de nuevo en nuestra aplicación.</p>
	</div>
</body>
</html>	
	<?php			
		}
	}
}

} else {

if (isset($_COOKIE["correo"])) {
	$_SESSION["idinicio"] = $_COOKIE["idiniciosesion"];
			setcookie("idiniciosesion", "", time());
			setcookie("correo", "", time());
			setcookie("contra", "", time());	
}
if (isset($_POST["correo"])) {
	$sql = "SELECT * FROM registros";
	$tabla2 = $conn->query($sql);
	while ($row = mysqli_fetch_assoc($tabla2)) {
		if ($_POST["correo"] == $row["correo"]) {
			$variable = 1;
			if ($row["autorizado"] == "No") {
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Cambio de contraseña | Contasus</title>
			<link rel="stylesheet" type="text/css" href="css/style.css">
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
	<?php 
		include "header.php";
		include "flechaatras.php";
	?>
	<div id="inicio">
		<h3 style="margin-top:7vw;">Cambio de contraseña</h3>
		<p style="color: red;font-weight: bold;">El usuario no está verificado</p>
		<form method="post" action="">
			<input type="email" required placeholder="Correo electrónico" name="correo">
			<input type="image" src="img/aceptar.png">
		</form>
	</div>
		</body>
		</html>
		<?php				
			} else {
			$sql3 = "UPDATE registros SET idiniciosesion='cambiocontrasena' WHERE id=$row[id] ";
			if ($conn->query($sql3)) {
			$to = $_POST["correo"];
			$subject = "¡Solicitud cambio de contraseña!";
			$message = "<!DOCTYPE html>
<html>
<head>
	<title>Cambio de contraseña</title>
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
		<h1>Hemos recibido una solicitud para cambiar la contraseña de tu cuenta</h1>
		<h2>Si no has sido tú, te recomendamos que no hagas nada</h2>
		<p>Para poder cambiar tu contraseña, solo tendrás que entrar al siguiente enlace.</p>
		<a style='width:50%;' href=https://contasus.es/olvidadocontrasena.php?i=" . $row["idcontrolsesion"] . "&c=". $_POST["correo"] . "><img style='width:50%;' src='https://contasus.es/img/cambiocontrasena.png'></a>
	</div>
</body>
</html>";

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <info@contasus.es>' . "\r\n";

				if (mail($to,$subject,$message,$headers)) {
					header("Location:index.php");
				}

}}

		} else {
			$comprobar = 1;
		}
	}
} else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cambio de contraseña | Contasus</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="../favicon.png" rel="icon" type="imagen/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<?php 
		include "header.php";
		include "flechaatras.php";
	?>
	<div id="inicio">
		<h3 style="margin-top:7vw;">Cambio de contraseña</h3>
		<form method="post" action="">
			<input type="email" required placeholder="Correo electrónico" name="correo">
			<input type="image" src="img/aceptar.png">
		</form>
	</div>
</body>
</html>
<?php
}

if (!isset($variable) && $comprobar != 0) {
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Cambio de contraseña | Contasus</title>
			<link rel="stylesheet" type="text/css" href="css/style.css">
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
	<?php 
		include "header.php";
		include "flechaatras.php";
	?>
	<div id="inicio">
		<h3 style="margin-top:7vw;">Cambio de contraseña</h3>
		<p style="color: red;font-weight: bold;">Este correo no está registrado</p>
		<form method="post" action="">
			<input type="email" required placeholder="Correo electrónico" name="correo">
			<input type="image" src="img/aceptar.png">
		</form>
	</div>
		</body>
		</html>
		<?php					
}
}
/**	*/
?>
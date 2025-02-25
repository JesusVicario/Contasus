<?php

session_start();
include "conn.php";
$id = $_GET["id"];

if($_GET["r"] == "aprobado") {
	$sql = "UPDATE registros SET autorizado='Si' WHERE idcontrolsesion=$id";
if ($conn->query($sql)) {
 ?>
 <h1 style="text-align:center;">Aprobado</h1>
 <?php
 		$sql = "SELECT * FROM registros WHERE idcontrolsesion=$id";
		$tabla2 = $conn->query($sql);
		while ($row = mysqli_fetch_assoc($tabla2)) {
				$to = $row["correo"];
				$subject = "¡Bienvenid@ a Contasus!";
				$message = "<!DOCTYPE html>
<html>
<head>
	<title>¡Ya formas parte de nosotros!</title>
</head>
<body>
	<div style='display: flex;text-align:center;justify-content: center;align-items: center; width: 100vw;margin-top:2vw';>
		<img style='height: 15vw;width: 15vw;' src='https://contasus.es/img/logo.png'>
		<h1 style='margin-left:10vw;'>Contasus</h1>
	</div>
	<div style='text-align: center;margin-top:5vw;'>
		<h1>Bienvenid@ a Contasus</h1>
		<h2>Estamos muy contentos de tenerte con nosotros</h2>
		<p>Te escribimos este correo para informarte que has sido dado de alta en el sistema, y que a partir de estos momentos podrás acceder a nuestras herramientas desde nuestra aplicación. Esperemos serte muy útil.</p>
	</div>
</body>
</html>";

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <info@contasus.es>' . "\r\n";

				mail($to,$subject,$message,$headers);
		}
}
} else {
  	$sql2 = "DELETE FROM registros WHERE idcontrolsesion=$id";
  	if ($conn->query($sql2)) {
		 ?>
		 <h1 style="text-align:center;">Se ha eliminado de nuestros registros</h1>
		 <?php  		
  	}
}
?>
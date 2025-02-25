<?php
session_start();
include "conn.php";
$sql = "SELECT idcontrolsesion FROM registros WHERE id=$_SESSION[id]";
$tabla2 = $conn->query($sql);
while ($row = mysqli_fetch_assoc($tabla2)) {
	$_SESSION["idcontrol"] = $row["idcontrolsesion"];
}
$sql2 = "UPDATE registros SET idiniciosesion='$_SESSION[idcontrol]' WHERE id=$_SESSION[id] ";
if ($conn->query($sql2)) {
	setcookie("idiniciosesion", "", time());
	setcookie("correo", "", time());
	setcookie("contra", "", time());
	setcookie("color", "", time());
	session_destroy();
	header("Location:../index.php");
}
 ?>
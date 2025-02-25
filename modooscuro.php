<?php 
session_start();
if (isset($_POST["color"])) {
	if ($_COOKIE["color"] == "azul") {
		setcookie("color", "negro", time() + (60 * 60 * 24 * 1000));
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<title>Cambiar color | Contasus</title>
				<link rel="stylesheet" type="text/css" href="css/style.css">
				<link href="../favicon.png" rel="icon" type="imagen/x-icon">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<script type="text/javascript" src="js/script.js"></script>
				<style type="text/css">
					#cambiarcolor{
						font-size: 4vw;
						color:white;
						background-color:blue;
						border-radius: 15px;
						font-family:'acme';
						padding:1vw;
						height: auto !important;
						transition: 2s all;
					}
					#cambiarcolor2{
						font-size: 4vw;
						color:white;
						background-color:black;
						border-radius: 15px;
						font-family:'acme';
						padding:1vw;
						height: auto !important;
						border: solid black !important;
						transition: 2s all;
					}
					#header2{
						display: flex;
						justify-content: center;
						width: 105%;
						height: 18vw;
						background-color:black; 
						margin-top:-2vw;
						margin-left: -2vw;
						transition: 2s all;
					}
					#header2 div{
						display: flex;
						align-items:  center;
						justify-content: center;
						height: 100%;
					}
					#header2 p{
						font-size: 7vw;
						color:white;
						font-family: 'acme';
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
				<script type="text/javascript">
					function cambiarcolor(){
						elemento = document.getElementById("cambiarcolor");
						elemento.id = "cambiarcolor2";	
						elemento2 = document.getElementById("header");
						elemento2.id = "header2";	
					}
				</script>
			</head>
			<body onload="cambiarcolor();">
				<?php include "header.php" ?>
				<button id="flechaatras" onclick="location.href='ajustes.php'">←</button>
				<h3 style="text-align: center;">Cambiar color</h3>
				<div id="inicio">
					<form method="post" action="">
						<input type="text" style="display: none;" name="color">
						<input id="cambiarcolor" value="Cambiar color" type="submit" src="img/aceptar.png">
					</form>
				</div>
			</body>
		</html>
		<?php			
	} else {
		setcookie("color", "azul", time() + (60 * 60 * 24 * 1000));
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<title>Cambiar color | Contasus</title>
				<link rel="stylesheet" type="text/css" href="css/style.css">
				<link href="../favicon.png" rel="icon" type="imagen/x-icon">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<script type="text/javascript" src="js/script.js"></script>
				<style type="text/css">
					#cambiarcolor{
						font-size: 4vw;
						color:white;
						background-color:blue;
						border-radius: 15px;
						font-family:'acme';
						padding:1vw;
						height: auto !important;
						transition: 2s all;
					}
					#cambiarcolor2{
						font-size: 4vw;
						color:white;
						background-color:black;
						border: solid black !important;
						border-radius: 15px;
						font-family:'acme';
						padding:1vw;
						height: auto !important;
						transition: 2s all;
					}
					#header{
						display: flex;
						justify-content: center;
						width: 105%;
						height: 18vw;
						background-color:rgb(0, 54, 255, 0.6); 
						margin-top:-2vw;
						margin-left: -2vw;
						transition: 2s all;
					}
					#header div{
						display: flex;
						align-items:  center;
						justify-content: center;
						height: 100%;
					}
					#header p{
						font-size: 7vw;
						color:white;
						font-family: 'acme';
					}
					#header2{
						display: flex;
						justify-content: center;
						width: 105%;
						height: 18vw;
						background-color:black; 
						margin-top:-2vw;
						margin-left: -2vw;
						transition: 2s all;
					}
					#header2 div{
						display: flex;
						align-items:  center;
						justify-content: center;
						height: 100%;
					}
					#header2 p{
						font-size: 7vw;
						color:white;
						font-family: 'acme';
					}
					.logo{
						width: 11vw;
						height: 11vw;
						margin-right: 3vw;
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
				<script type="text/javascript">
					function cambiarcolor(){
						elemento = document.getElementById("cambiarcolor2");
						elemento.id = "cambiarcolor";	
						elemento2 = document.getElementById("header2");
						elemento2.id = "header";
					}
				</script>
			</head>
			<body onload="cambiarcolor();">
			<div id="header2">
				<a href="/index2.php"><div>
					<img class="logo" src="/img/logo.png">
					<p>CONTASUS</p>
				</div></a>
			</div>
				<button id="flechaatras" onclick="location.href='ajustes.php'">←</button>
				<h3 style="text-align: center;">Cambiar color</h3>
				<div id="inicio">
					<form method="post" action="">
						<input type="text" style="display: none;" name="color">
						<input id="cambiarcolor2" value="Cambiar color" type="submit">
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
			<title>Cambiar color | Contasus</title>
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
			<link href="../favicon.png" rel="icon" type="imagen/x-icon">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<script type="text/javascript" src="js/script.js"></script>
		</head>
		<body>
			<?php include "header.php" ?>
			<?php include "flechaatras.php" ?>
			<h3 style="text-align: center;">Cambiar color</h3>
			<div id="inicio">
				<form method="post" action="">
					<input type="text" style="display: none;" name="color">
					<input id="inputcolor" value="Cambiar color" type="submit">
				</form>
			</div>
		</body>
	</html>
	<?php			
}
?>
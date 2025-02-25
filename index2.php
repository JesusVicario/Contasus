<?php
$comprobar = 0;
session_start();
if (isset($_POST["correo"])) {
	include "conn.php";
	$sql = "SELECT * FROM registros";
	$tabla2 = $conn->query($sql);
	while ($row = mysqli_fetch_assoc($tabla2)) {
		if ($row["correo"] == $_POST["correo"]) {
			$variable = 1;
			if ($row["contra"] == $_POST["contra"]) {
				if ($row["autorizado"] == "Si") {
					if ($row["idiniciosesion"] != "cambiocontrasena") {
						$_SESSION["id"] = $row["id"];
						$_SESSION["correo"] = $row["correo"];
						$_SESSION["iniciosesion"] = "autorizado";
						if ($row["idcontrolsesion"] == $row["idiniciosesion"]) {
							$numeroaleatorio = rand(1, 999999999999);
							$sql2 = "UPDATE registros SET idiniciosesion='$numeroaleatorio' WHERE id=$_SESSION[id] ";
							setcookie("idiniciosesion", "$numeroaleatorio", time() + (60 * 60 * 24 * 1000));
							setcookie("correo", $_POST["correo"], time() + (60 * 60 * 24 * 1000));
							setcookie("contra", $_POST["contra"], time() + (60 * 60 * 24 * 1000));
							setcookie("color", "azul", time() + (60 * 60 * 24 * 1000));
							if ($conn->query($sql2)) {
								?>
								<!DOCTYPE html>
								<html>
									<head>
										<title>¡Bienvenido a Contasus!</title>
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
								<h3 style="text-align: center;"><?php echo $row["nombre"] ?>, bienvenid@ de nuevo</h3>
								<div class="menu">
									<div>
										<a href="pages/cuadrodecuentas.php">
											<img src="img/cuadrodecuentas.png">
											<h3>Cuadro de cuentas</h3>
										</a>
									</div>
									<div>
										<a href="pages/balancedecomprobacion.php">
											<img src="img/balancedecomprobacion.png">
											<h3>Balance de comprobación</h3>
										</a>
									</div>
									<div>
										<a href="pages/documentos.php">
											<img src="img/documentos.png">
											<h3>Documentos</h3>
										</a>
									</div>
								</div>
								<a href="ajustes.php"><div id="ajustes">
									<img src="img/ajustes.png">
								</div></a>
								</body>
								</html>
								<?php
							}
						} else {
							if ($_COOKIE["idiniciosesion"] == $row["idiniciosesion"]) {
								?>
								<!DOCTYPE html>
								<html>
									<head>
										<title>¡Bienvenido a Contasus!</title>
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
								<h3 style="text-align: center;"><?php echo $row["nombre"] ?>, bienvenid@ de nuevo</h3>
								<div class="menu">
									<div>
										<a href="pages/cuadrodecuentas.php">
											<img src="img/cuadrodecuentas.png">
											<h3>Cuadro de cuentas</h3>
										</a>
									</div>
									<div>
										<a href="pages/balancedecomprobacion.php">
											<img src="img/balancedecomprobacion.png">
											<h3>Balance de comprobación</h3>
										</a>
									</div>
									<div>
										<a href="pages/documentos.php">
											<img src="img/documentos.png">
											<h3>Documentos</h3>
										</a>
									</div>
								</div>
								<a href="ajustes.php"><div id="ajustes">
									<img src="img/ajustes.png">
								</div></a>
								</body>
								</html>
								<?php
							} else {
									$numeroaleatorio = rand(1, 999999999999);
									$sql10 = "UPDATE registros SET idiniciosesion='$numeroaleatorio' WHERE id=$_SESSION[id] ";
									setcookie("idiniciosesion", "$numeroaleatorio", time() + (60 * 60 * 24 * 1000));
									setcookie("correo", $_POST["correo"], time() + (60 * 60 * 24 * 1000));
									setcookie("contra", $_POST["contra"], time() + (60 * 60 * 24 * 1000));
									if ($conn->query($sql10)) {
								?>
								<!DOCTYPE html>
								<html>
								<head>
									<title>¡Bienvenido a Contasus!</title>
									<link rel="stylesheet" type="text/css" href="css/style.css">
									<link href="../favicon.png" rel="icon" type="imagen/x-icon">
									<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
									<script type="text/javascript" src="js/script.js"></script>
									<script type="text/javascript">
										setTimeout(function(){ window.location.reload(1); }, 2000);

									</script>
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
									<div id="inicio">
										<h2>Te damos la bienvenida a Contasus</h2>
										<h3 style="margin-top:7vw;">Inicia sesión</h3>
										<p style="color: red;font-weight: bold;">Se ha iniciado sesión en otro dispositivo.</p>
										<p style="color: red;font-weight: bold;">Cerrando sesión en el otro dispositivo... </p>
										<form method="post" action="">
											<input type="email" placeholder="Correo electrónico" required name="correo">
											<input type="password" placeholder="Contraseña" required name="contra">
											<input type="image" src="img/aceptar.png">
										</form>	
									<div style="width: 99vw;display: flex;justify-content: center; flex-direction: column;">
										<a href="olvidadocontrasena.php" class="registrate">¿Has olvidado la contraseña?</a>
										<a href="registrarse.php" class="registrate">Registrate</a>
									</div>
									</div>
								</body>
								</html>
								<?php
							}}						
						}
					} else {
						?>
						<!DOCTYPE html>
							<html>
							<head>
								<title>¡Bienvenido a Contasus!</title>
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
								<?php include "header.php" ?>
								<div id="inicio">
									<h2>Te damos la bienvenida a Contasus</h2>
									<h3 style="margin-top:7vw;">Inicia sesión</h3>
									<p style="color: red;font-weight: bold;">Has pedido cambiar tu contraseña.</p>
									<p style="color: red;font-weight: bold;">Cambiala e intenta iniciar sesión de nuevo.</p>
									<form method="post" action="">
										<input type="email" placeholder="Correo electrónico" required name="correo">
										<input type="password" placeholder="Contraseña" required name="contra">
										<input type="image" src="img/aceptar.png">
									</form>	
								<div style="width: 99vw;display: flex;justify-content: center; flex-direction: column;">
									<a href="olvidadocontrasena.php" class="registrate">¿Has olvidado la contraseña?</a>
									<a href="registrarse.php" class="registrate">Registrate</a>
								</div>
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
					<?php include "header.php" ?>
					<div id="inicio">
						<h2>Te damos la bienvenida a Contasus</h2>
						<h3 style="margin-top:7vw;">Inicia sesión</h3>
						<p style="color: red;font-weight: bold;">No estás autorizado a usar nuestro sistema. Le enviaremos un correo cuando se le autorice.</p>
						<form method="post" action="">
							<input type="email" placeholder="Correo electrónico" required name="correo">
							<input type="password" placeholder="Contraseña" required name="contra">
							<input type="image" src="img/aceptar.png">
						</form>			
					</div>
					<div style="width: 99vw;display: flex;justify-content: center; flex-direction: column;">
						<a href="olvidadocontrasena.php" class="registrate">¿Has olvidado la contraseña?</a>
						<a href="registrarse.php" class="registrate">Registrate</a>
					</div>
				</body>
				</html>
				<?php					
						}	
		} else {
			if (isset($_COOKIE["correo"])) {
				setcookie("idiniciosesion", "", time());
				setcookie("correo", "", time());
				setcookie("contra", "", time());
				}
				?>
				<!DOCTYPE html>
				<html>
				<head>
					<title>¡Bienvenido a Contasus!</title>
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
					<?php include "header.php" ?>
					<div id="inicio">
						<h2>Te damos la bienvenida a Contasus</h2>
						<h3 style="margin-top:7vw;">Inicia sesión</h3>
						<p style="color: red;font-weight: bold;">Contraseña incorrecta. Vuelve a intentarlo</p>
						<form method="post" action="">
							<input type="email" placeholder="Correo electrónico" required name="correo">
							<input type="password" placeholder="Contraseña" required name="contra">
							<input type="image" src="img/aceptar.png">
						</form>	
					</div>
					
					<div style="width: 99vw;display: flex;justify-content: center; flex-direction: column;">
						<a href="olvidadocontrasena.php" class="registrate">¿Has olvidado la contraseña?</a>
						<a href="registrarse.php" class="registrate">Registrate</a>
					</div>
				</body>
				</html>
				<?php					
				}
			} else {
				$comprobar = 1;
			}
		}
	} else {
		if (isset($_COOKIE["correo"])) {
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>¡Bienvenido a Contasus!</title>
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
			<script type="text/javascript">
				function enviar(){
					document.getElementById("iniciosesion").submit();
				}
			</script>
		</head>
		<body onload="enviar()">
			<?php include "header.php" ?>
			<div id="inicio">
				<h2>Te damos la bienvenida a Contasus</h2>
				<h3 style="margin-top:7vw;">Inicia sesión</h3>
				<form method="post" action="" id="iniciosesion">
					<input type="mail" value="<?php echo $_COOKIE[correo]; ?>" name="correo">
					<input type="password" value="<?php echo $_COOKIE[contra]; ?>" name="contra">
					<input type="image" src="img/aceptar.png">
				</form>			
			</div>
			<div style="width: 99vw;display: flex;justify-content: center; flex-direction: column;">
				<a href="olvidadocontrasena.php" class="registrate">¿Has olvidado la contraseña?</a>
				<a href="registrarse.php" class="registrate">Registrate</a>
			</div>
		</body>
		</html>
		<?php			

		} else {
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>¡Bienvenido a Contasus!</title>
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
			<?php include "header.php" ?>
			<div id="inicio">
				<h2>Te damos la bienvenida a Contasus</h2>
				<h3 style="margin-top:7vw;">Inicia sesión</h3>
				<form method="post" action="">
					<input type="email" placeholder="Correo electrónico" required name="correo">
					<input type="password" placeholder="Contraseña" required name="contra">
					<input type="image" src="img/aceptar.png">
				</form>				
			</div>
			<div style="width: 99vw;display: flex;justify-content: center; flex-direction: column;">
				<a href="olvidadocontrasena.php" class="registrate">¿Has olvidado la contraseña?</a>
				<a href="registrarse.php" class="registrate">Registrate</a>
			</div>
			</body>
		</html>
		<?php
}}
if (!isset($variable) && $comprobar != 0) {
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>¡Bienvenido a Contasus!</title>
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
			<?php include "header.php" ?>
			<div id="inicio">
				<h2>Te damos la bienvenida a Contasus</h2>
				<h3 style="margin-top:7vw;">Inicia sesión</h3>
				<p style="color: red;font-weight: bold;">El correo no existe.</p>
				<form method="post" action="">
					<input type="email" placeholder="Correo electrónico" required name="correo">
					<input type="password" placeholder="Contraseña" required name="contra">
					<input type="image" src="img/aceptar.png">
				</form>	
			</div>
			<div style="width: 99vw;display: flex;justify-content: center; flex-direction: column;">
				<a href="olvidadocontrasena.php" class="registrate">¿Has olvidado la contraseña?</a>
				<a href="registrarse.php" class="registrate">Registrate</a>
			</div>
		</body>
		</html>
		<?php					
}
?>
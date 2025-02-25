<?php 
session_start();
if ($_GET["v"] == "") {
	
} else {
	if ($_SESSION["idioma"] == "english") {
		$fp = fopen("cuentasenglish.txt", "r");
	} else {
		$fp = fopen("cuentas.txt", "r");
	}
	while (!feof($fp)){
	    $linea = " " . $lineas = fgets($fp);
	    if (stripos($linea, $_GET["v"])) {
		    $tipo = substr($linea, 1, 4);
		    $linea = substr($linea, 6);
	    	?>
	    	<meta charset="utf-8">
	    	<div class="respuestacuenta">
	    		<p><?php echo $linea; ?></p>
	    		<?php
	    		if ($tipo =="(CA)") {
	    		 	?>
	    		 	<img class="tipodecuentas" src="../img/activo.png">
	    		 	<?php
	    		 } 
	    		if ($tipo =="(CP)") {
	    		 	?>
	    		 	<img class="tipodecuentas" src="../img/pasivo.png">
	    		 	<?php
	    		 } 
	    		if ($tipo =="(PN)") {
	    		 	?>
	    		 	<img class="tipodecuentas" src="../img/patrimonioneto.png">
	    		 	<?php
	    		 }
	    		if ($tipo =="(CG)") {
	    		 	?>
	    		 	<img class="tipodecuentas" src="../img/gastos.png">
	    		 	<?php
	    		 } 
	    		if ($tipo =="(CI)") {
	    		 	?>
	    		 	<img class="tipodecuentas" src="../img/ingresos.png">
	    		 	<?php
	    		 } 
	    		if ($tipo =="(GI)") {
	    		 	?>
	    		 	<img class="tipodecuentas" src="../img/ingresos.png">
	    		 	<img class="tipodecuentas" src="../img/gastos.png">
	    		 	<?php
	    		 }
	    		?>
	    	</div>
	    	<?php
	    }
	}
	fclose($fp);
}
?>
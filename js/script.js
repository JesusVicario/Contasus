function intro(){
	elemento = document.getElementById("intro");
	elemento.id = "intro2";	

	elemento2 = document.getElementById("iniciotextoslegales");
	elemento2.id = "iniciotextoslegales2";	
	setTimeout(go, 1400);

}
function on() {
	setTimeout(intro, 1500);
}
function go(){
	location.href = "index2.php"
}
function cuentas(str) {
    if (str.length == 0) {
        document.getElementById("respuesta").innerHTML = "";
        document.getElementById("botonborrar").style.display = "none";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("respuesta").innerHTML = this.responseText;
                document.getElementById("botonborrar").style.display = "initial";

            }
        };
        xmlhttp.open("GET", "cuadrodecuentas2.php?v=" + str, true);
        xmlhttp.send();
    }
}
function botoneliminar(){
    document.getElementById("botonborrar").style.display = "none";
    document.getElementById("respuesta").innerHTML = "";
}

function crearbalance(){
    var valor = document.getElementById("inputnumber").value;
    if (valor <= 0) {
        alert("El valor debe superar el 0");
        return;
    } else {
        document.getElementById("inputnumber").disabled = true;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                sessionStorage.setItem("balance", valor);
                document.getElementById("respuesta").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "balancedecomprobacion2.php?v=" + valor, true);
        xmlhttp.send();
    }

}
function respuesta(){
    if (document.getElementById("saldoacreedor").value == document.getElementById("saldodeudor").value) {
        alert("¡Felicidades, has hecho bien el balance!");
    } else {
        alert("¡Oh no, debes repasar el balance!");
    }
}
function calcular5(){
    var control = 0;
    var saldoacreedor1 = 0;
    var cantidadbalance = sessionStorage.getItem("balance");
    while(cantidadbalance > control) {
        var saldoacreedor = "saldoacreedor" + control;
        var elemsaldoacreedor = document.getElementById(saldoacreedor).value;
        var saldoacreedor1 = parseFloat(saldoacreedor1) + parseFloat(elemsaldoacreedor);
        var control = control + 1;
    } 
    document.getElementById("saldoacreedor").value = (parseFloat(saldoacreedor1)).toFixed(2);
    document.getElementById("saldoacreedor").style.border = "2px solid black";
    respuesta();
}
function calcular4(){
    var control = 0;
    var saldodeudor1 = 0;
    var cantidadbalance = sessionStorage.getItem("balance");
    while(cantidadbalance > control) {
        var saldodeudor = "saldodeudor" + control;
        var elemsaldodeudor = document.getElementById(saldodeudor).value;
        var saldodeudor1 = parseFloat(saldodeudor1) + parseFloat(elemsaldodeudor);
        var control = control + 1;
    } 
    document.getElementById("saldodeudor").value = (parseFloat(saldodeudor1)).toFixed(2);
    document.getElementById("saldodeudor").style.border = "2px solid black";
    calcular5();  
}
function calcular3(){
    var control = 0;
    var sumashaber = 0;
    var cantidadbalance = sessionStorage.getItem("balance");
    while(cantidadbalance > control) {
        var haber = "haber" + control;
        if (document.getElementById(haber).value == "") {
            var elemhaber = "0";
        } else {
            var elemhaber = document.getElementById(haber).value;
        }
        var sumashaber = parseFloat(sumashaber) + parseFloat(elemhaber);
        var control = control + 1;
    } 
    document.getElementById("sumashaber").value = (parseFloat(sumashaber)).toFixed(2);
    document.getElementById("sumashaber").style.border = "2px solid black";
    calcular4();
}
function calcular2(){
    var control = 0;
    var sumasdebe = 0;
    var cantidadbalance = sessionStorage.getItem("balance");
    while(cantidadbalance > control) {
        var debe = "debe" + control;
        if (document.getElementById(debe).value == "") {
            var elemdebe = "0";
        } else {
            var elemdebe = document.getElementById(debe).value;
        }
        var sumasdebe = parseFloat(sumasdebe) + parseFloat(elemdebe);
        var control = control + 1;
    } 
    document.getElementById("sumasdebe").value = (parseFloat(sumasdebe)).toFixed(2);
    document.getElementById("sumasdebe").style.border = "2px solid black";
    calcular3();  
}
function calcular(){
    var control = 0;
    var cantidadbalance = sessionStorage.getItem("balance");
    while(cantidadbalance > control) {
        var debe = "debe" + control;
        var haber = "haber" + control;
        var saldodeudor = "saldodeudor" + control;
        var saldoacreedor = "saldoacreedor" + control;
        var elementodebe = document.getElementById(debe).value;
        var elementohaber = document.getElementById(haber).value;
        var solucion = document.getElementById(debe).value - document.getElementById(haber).value;
        if (solucion > 0) {
            document.getElementById(saldodeudor).value = (solucion).toFixed(2);
            document.getElementById(saldodeudor).style.border = "2px solid green";
            document.getElementById(saldoacreedor).value = 0;
            document.getElementById(saldoacreedor).style.border = "2px solid red";
        } else {
            document.getElementById(saldoacreedor).value = (Math.abs(solucion)).toFixed(2);
            if (document.getElementById(saldoacreedor).value > "0.00") {
                    document.getElementById(saldoacreedor).value = (Math.abs(solucion)).toFixed(2);
                    document.getElementById(saldoacreedor).style.border = "2px solid green";
                    document.getElementById(saldodeudor).style.border = "2px solid red";
                    document.getElementById(saldodeudor).value = 0;
            } else {
                document.getElementById(saldodeudor).style.border = "2px solid red";
                document.getElementById(saldodeudor).value = 0;
                document.getElementById(saldoacreedor).value = "0";
                document.getElementById(saldoacreedor).style.border = "2px solid red";
            }
        }

        
        var control = control + 1;
    }
    calcular2();
}
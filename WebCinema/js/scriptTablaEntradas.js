var entradas = new Array(); // asientos de las entradas
var contador = 0; // contador de entradas
var posiciones = 0; // contador de buatacas pulsadas
var filas = new Array(); // filas ocupadas
var seat = new Array(); // asientos ocupados
var fila = 0; // Fila de la primera entrada comprada, no se podrá comprar
// entradas de otra fila
var numGafas = 0;
var numEstudiantes = 0;

//
// recoge la peli y el dia y la hora de proyeccion
//
window.onload = function() {
	var error = document.getElementById("error").value;
	if (error == 1)
		alert("Lo sentimos, ha ocurrido un problema al realiar la compra.Por favor, vuelva a elegir sus butacas.");
	
	var idPelicula = document.getElementById("pelicula").value;
	var fechaSesion = document.getElementById("fechaSesion").value;
	var horaSesion = document.getElementById("horaSesion").value;
	
	var p = document.getElementById("student");
	p.value = 0;

	startPetition("ticket/Ajax.php?idPelicula=" + idPelicula + "&fechaSesion="
			+ fechaSesion + "&horaSesion="+ horaSesion);

	var p = document.getElementById("numeroEntradas");
	p.innerHTML = "0";
}

//
// recoge las butacas ocupadas
//
function getTakenSeat() {
	for ( var i = 0; i < filas.length; i++) {
		var asiento = filas[i];

		if (seat[i] < 10)
			asiento = asiento * 10;

		asiento = asiento + seat[i];
		drawTakenSeat(asiento);
	}
}

//
// pinta en la tabla las batacas ocupadas
//
function drawTakenSeat(asiento) {
	var x = document.getElementById(asiento);
	x.src = 'images/butacas/iconoVendido.ico';
	x.alt = 2; // cambia el campo alt de la imagen a 2 para que no se pueda
	// pinchar
}

//
// recoge el id de la butaca que se ha pulsado y cambia el icono dependiendo
// de si se reserva o si se quita la reserva.
// El estado de la butaca se comprueba mediante el campo alt
//
function do_click(reserva) {
	var v = document.getElementById(reserva);
	if (v.alt != 2) {
		if (fila == 0) { // Comprobacion de que es la primera fila que se
							// escoje
			fila = parseInt(reserva / 100);
			if (v.alt == 0) {
				v.src = 'images/butacas/iconoLibre.ico';
				v.alt = 1;
				setSeat(reserva);
			} else if (v.alt == 1) {
				v.src = 'images/butacas/iconoElegido.ico';
				v.alt = 0;
				deleteSeat(reserva);
			}
		} else if (parseInt(reserva / 100) == fila) {
			if (v.alt == 0) {
				if (contador < 10) {
					v.src = 'images/butacas/iconoLibre.ico';
					v.alt = 1;
					setSeat(reserva);
				} else
					alert("No se puede comprar mas de 10 entradas");
			} else if (v.alt == 1) {
				v.src = 'images/butacas/iconoElegido.ico';
				v.alt = 0;
				deleteSeat(reserva);
			}
		} else
			alert("Las entradas deben pertenecer a la misma fila");
	}
}

//
// añade una butaca al array de entradas
//
function setSeat(id) {
	entradas[posiciones] = id;
	contador++;
	posiciones++;
	var p = document.getElementById("numeroEntradas");
	p.innerHTML = contador;
}

//
// elimina una butaca del array
//
function deleteSeat(id) {
	for ( var i = 0; i < entradas.length; i++) {
		if (entradas[i] == id) {
			entradas[i] = 0;
		}
	}
	contador--;
	if (contador == 0) {
		fila = 0;
	}
	var p = document.getElementById("numeroEntradas");
	p.innerHTML = contador;
	
	if (numGafas > contador) {
		numGafas--;
		var goggles = document.getElementById("goggles");
		goggles.innerHTML = numGafas;
	}
	
	if (numEstudiantes > contador) {
		numEstudiantes--;
		var student = document.getElementById("student");
		student.innerHTML = numEstudiantes;
	}
}

//
// inicia la peticion ajax para leer el xml de butacas ocupadas en esa sesion
//
function startPetition(url) {
	if (window.XMLHttpRequest)
		peticion = new XMLHttpRequest();
	else if (window.ActiveXObject)
		peticion = new ActiveXObject("Microsoft.XMLHTTP");
	if (peticion != null) {
		peticion.onreadystatechange = processResponse;
		peticion.open("GET", url, true);
		peticion.send(null);
	} else
		alert("No se puedo iniciar la peticion ajax");
}

//
// recoje las butacas ocupadas
//
function processResponse() {
	if (peticion.readyState == 4) {
		if (peticion.status == 200) {
			var butacas = peticion.responseXML.documentElement
					.getElementsByTagName("butacas");
			getSeat(butacas);
		} else
			alert("Error procesando la informacion");
	}
}

//
// inserta cada fila y cada butaca en su array correspondiente
//
function getSeat(butacas) {
	var repe = 0;
	for ( var i = 0; i < butacas.length; i++) {
		var fila = butacas[i].getElementsByTagName("fila")[0].childNodes[0].nodeValue;
		// if (repe != fila) {
		// repe = fila;
		filas.push(fila);
		// }
		var butaca = butacas[i].getElementsByTagName("butaca")[0].childNodes[0].nodeValue;
		seat.push(butaca);
	}

	getTakenSeat();
}

//
// Aumenta el número de gafas3D en función del numero de entradas compradas
//
function gogglesPlus() {
	if (numGafas < contador) {
		numGafas++;
		var goggles = document.getElementById("goggles");
		goggles.innerHTML = numGafas;
	}
}

//
// Dismunuye el número de gafas 3D
//
function gogglesLess() {
	if (numGafas > 0) {
		numGafas--;
		var goggles = document.getElementById("goggles");
		goggles.innerHTML = numGafas;
	}
}

//
// Aumenta el número de entradas de estudiante en función del numero de
// entradas compradas
//
function studentPlus() {
	if (numEstudiantes < contador) {
		numEstudiantes++;
		var student = document.getElementById("student");
		student.innerHTML = numEstudiantes;
	}
}

//
// Dismunuye el número de entradas de estudiante
//
function studentLess() {
	if (numEstudiantes > 0) {
		numEstudiantes--;
		var student = document.getElementById("student");
		student.innerHTML = numEstudiantes;
	}
}

//
// Compra la entrada
//
function buy() {
	if (contador > 0) {
		var idPelicula = document.getElementById("pelicula").value;
		var fechaSesion = document.getElementById("fechaSesion").value;
		var horaSesion = document.getElementById("horaSesion").value;
		// var goggles = document.getElementById("goggles").value;
		// var student = document.getElementById("student").value;
		var miercoles = document.getElementById("miercoles").value;

		window.location = "ticket.php?idPelicula=" + idPelicula
				+ "&fechaSesion=" + encodeURIComponent(fechaSesion)
				+ "&horaSesion=" + horaSesion + "&numeroEntradas=" + contador
				+ "&entradas=" + encodeURIComponent(entradas) + "&gafas="
				+ numGafas + "&estudiante=" + numEstudiantes + "&miercoles="
				+ miercoles;
	} else {
		alert("No se han comprado entradas");
	}
}
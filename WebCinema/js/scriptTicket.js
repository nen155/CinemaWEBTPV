var c;
window.onload = function(){
	var x = document.getElementById("mail");
	c = document.getElementById("confirmar");
	if (mail.value <= 0){
		c.style.visibility = 'hidden';
	}
}

function habilitar(){
	c.style.visibility = 'visible';
}

function deshabilitar(){
	var x = document.getElementById("mail");
	if (mail.value <= 0){
		c.style.visibility = 'hidden';
	}
}
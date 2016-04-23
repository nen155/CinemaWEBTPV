window.onload = function(){
    var imagen0 = document.getElementById("imagen0");
    imagen0.src = "images/cartel/theartist_publi.jpg";
    
    setInterval("iniciarPeticion('pelicula/mostrarXml.php')",5000);
}
function iniciarPeticion(url){
    if (window.XMLHttpRequest)
        peticion = new XMLHttpRequest();
    else if (window.ActiveXObject)
        peticion = new ActiveXObject("Microsoft.XMLHTTP");
    if(peticion != null){
        peticion.onreadystatechange = procesarPeticion;
        peticion.open("GET", url, true);
        peticion.send(null);	
    }
    else
        alert("No se puedo iniciar la peticion ajax");
}

function procesarPeticion(){
    if(peticion.readyState == 4) {
        if(peticion.status == 200) {
            var estrenos=peticion.responseXML.documentElement.getElementsByTagName("estrenos");
            var proximos=peticion.responseXML.documentElement.getElementsByTagName("proximos");
            mostrarCartel(estrenos);
            mostrarProximos(proximos);
        }else
            alert("Error procesando la informacion");
    }
}

function mostrarCartel(estrenos){
    var idPelicula = new Array();
    var nombrePelicula = new Array();
    var cartel = new Array();
    
    for (var i=0;i<estrenos.length;i++){
        idPelicula[i] = estrenos[i].getElementsByTagName("idPelicula")[0].childNodes[0].nodeValue;
        nombrePelicula[i] = estrenos[i].getElementsByTagName("nombrePelicula")[0].childNodes[0].nodeValue;
        cartel[i] = estrenos[i].getElementsByTagName("cartel")[0].childNodes[0].nodeValue;
    }
    
    var imagen1 = document.getElementById("imagen1");
    imagen1.src = "images/cartel/"+cartel[0];
    
    var imagen2 = document.getElementById("imagen2");
    imagen2.src = "images/cartel/"+cartel[1];
    
    var imagen3 = document.getElementById("imagen3");
    imagen3.src = "images/cartel/"+cartel[2];
}

function mostrarProximos(proximos){
    var idPelicula = new Array();
    var nombrePelicula = new Array();
    var foto = new Array();
    
    for (var i=0;i<proximos.length;i++){
        idPelicula[i] = proximos[i].getElementsByTagName("idPelicula")[0].childNodes[0].nodeValue;
        nombrePelicula[i] = proximos[i].getElementsByTagName("nombrePelicula")[0].childNodes[0].nodeValue;
        foto[i] = proximos[i].getElementsByTagName("foto")[0].childNodes[0].nodeValue;
    }
    
    var imagen4 = document.getElementById("imagen4");
    imagen4.src = "images/foto/"+foto[0];
    
    var imagen5 = document.getElementById("imagen5");
    imagen5.src = "images/foto/"+foto[1];
    
    var imagen6 = document.getElementById("imagen6");
    imagen6.src = "images/foto/"+foto[2];
    
    var imagen7 = document.getElementById("imagen7");
    imagen7.src = "images/foto/"+foto[3];
}
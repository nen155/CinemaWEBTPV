/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
window.onload = main; 
 
function main (){
    /*
    $(document).ready(function(){
        jquery();
    });
    */
    var truco = document.getElementById("truco").value;
    jquery();
    if ( truco!="")
        abreTodo();
    else
        cierraTodo();
}

function abreTodo() 
{ 
    document.getElementById("menu_pelicula_container").style.display=""; // muestra el div
    document.getElementById("flange_informacion_content").setAttribute("class", "flange_informacion_content on");
    document.getElementById("flange_compra_entradas_content").setAttribute("class", "flange_compra_entradas_content off");
    
    abreTicket();
} 

function cierraTodo() 
{ 
    document.getElementById("menu_pelicula_container").style.display="none"; // oculta el div 
} 
function abreTicket(){
    var otrotruco = document.getElementById("otrotruco").value;
    if(otrotruco>0)
        document.getElementById("menu_pelicula_area_compra").style.display="";
    else
        document.getElementById("menu_pelicula_area_compra").style.display="none";
}
function jquery(){
    // para esconder o abrir el bloque pelicula 
    $("#btpeli").click(function (){                   //  $("#btpeli") - document.getElementById("btpeli");
        //    document.getElementById("b1").onclick; 
        if(!$("#menu_pelicula_area").is(":visible")){
            document.getElementById("menu_pelicula_area").style.display="";
            document.getElementById("menu_pelicula_area_compra").style.display="none";
            document.getElementById("flange_informacion_content").setAttribute("class", "flange_informacion_content on");
            document.getElementById("flange_compra_entradas_content").setAttribute("class", "flange_compra_entradas_content off");
            
        }
        else{
            document.getElementById("menu_pelicula_area").style.display="none";
            document.getElementById("flange_informacion_content").setAttribute("class", "flange_informacion_content off");
            document.getElementById("flange_compra_entradas_content").setAttribute("class", "flange_compra_entradas_content off");
        }
       
    });
    //para esconder o abrir el boque compra
    $("#btticket").click(function (){
        if (!$("#menu_pelicula_area_compra").is(":visible")){
            document.getElementById("menu_pelicula_area").style.display="none";
            document.getElementById("menu_pelicula_area_compra").style.display="";
            document.getElementById("flange_informacion_content").setAttribute("class", "flange_informacion_content off");
            document.getElementById("flange_compra_entradas_content").setAttribute("class", "flange_compra_entradas_content on");
        }
        else{
            document.getElementById("menu_pelicula_area_compra").style.display="none";
            document.getElementById("flange_informacion_content").setAttribute("class", "flange_informacion_content off");
            document.getElementById("flange_compra_entradas_content").setAttribute("class", "flange_compra_entradas_content off");
        }
    });
}

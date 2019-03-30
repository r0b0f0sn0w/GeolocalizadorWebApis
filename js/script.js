var LaPeticion = false;
function peticion() {
    if (window.XMLHttpRequest) {
        LaPeticion = new XMLHttpRequest();
    } else {
        if (window.ActiveXObject) {
            LaPeticion = new ActiveXObject("Msxml2.XMLHTTP");
        }
    }
    if (!LaPeticion) {
        alert("No se creó la petición");
    }
} // fin del método peticion

function resetpass(){
    peticion();
    var id = document.getElementById("id").value;
    var correo = document.getElementById("correo").value;
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    
    if(pass1!=pass2){
            alert("Las contraseñas deben coincidir");
            return;
        } else {
        LaPeticion.onreadystatechange = mostrarContenido('alertas');
        LaPeticion.open('POST', 'cambiar_pass.php', true);
        LaPeticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        LaPeticion.send(
                "id_usuarioResp=" + id + 
                " & correo=" + correo + 
                " & pass1=" + pass1 + 
                " & pass2=" + pass2);
    }//Cierra else interno
}//Cierra metodo agregar
function mostrarContenido(elID) {
    return function () {
        if (LaPeticion.readyState < 4) {
            document.getElementById(elID).innerHTML = "<p>No se ha podido conectar con el servidor</p>";
        } else if (LaPeticion.readyState === 4) {
            if (LaPeticion.status === 200) {
                var respuestaAjax = LaPeticion.responseText;
                document.getElementById(elID).innerHTML = respuestaAjax;
            } else {
                console.log("Error al leer la página");
            }
        }
    }; // cierre de  return function
}//Cierre del metodo
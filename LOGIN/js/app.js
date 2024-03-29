function cargarUnScript(url){
    let script = document.createElement('script');
    script.src = url;
    document.head.appendChild(script);
}

function getVistaMenuSeleccionado(controlador, metodo) {
    let opciones = { method: "GET" };
    let parametros = "controlador=" + controlador + "&metodo=" + metodo;
    fetch("C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {

            document.getElementById("secContenidoPagina").innerHTML = vista;
            cargarUnScript('js/'+controlador+'.js');
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

function volverHome(){
    window.location.href="index.php";
}
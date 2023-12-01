function buscarUsuarios() {
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=buscarUsuarios";
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioBuscar"))).toString();
    fetch("C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {
            document.getElementById("capaResultadosBusqueda").innerHTML = vista;
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

function validarInsertUsuarios() {
    const n_texto = document.getElementById("n_texto");
    const a1_texto = document.getElementById("a1_texto");
    const l_texto = document.getElementById("l_texto");
    const p_texto = document.getElementById("p_texto");
    let mensaje = '';
    var n_check = 0;
    var a1_check = 0;
    var l_check = 0;
    var p_check = 0;

    if (n_texto.value == '') {
        document.getElementById('n_texto').style.borderColor = 'red';
        n_check = 1;
    } else { n_texto.style.borderColor = ''; }

    if (a1_texto.value == '') {
        document.getElementById('a1_texto').style.borderColor = 'red';
        a1_check = 1;
    } else { a1_texto.style.borderColor = ''; }

    if (l_texto.value == '') {
        document.getElementById('l_texto').style.borderColor = 'red';
        l_check = 1;
    } else { l_texto.style.borderColor = ''; }

    if (p_texto.value == '') {
        document.getElementById('p_texto').style.borderColor = 'red';
        p_check = 1;
    } else { p_texto.style.borderColor = ''; }

    if (n_check == 1 || a1_check == 1 || l_check == 1 || p_check == 1) {
        mensaje = 'Debes completar los campos marcados en rojo.';
    } else {
        // Enviar formulario
        insertUsuario();
    }
    document.getElementById("msj").innerHTML = mensaje;
}

function insertUsuario() {
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=insertUsuario";
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioCrear"))).toString();
    console.log(parametros);
    fetch("C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {
            document.getElementById("capaEditarUsuario").innerHTML = vista;
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}
function getInsertUsuario() {
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=getInsertUsuario";
    fetch("C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {
            document.getElementById("capaEditarUsuario").innerHTML = vista;
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}
function getUpdateUsuario(id_Usuario) {
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=getUpdateUsuario";
    parametros += "&id_Usuario=" + id_Usuario;
    fetch("C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {
            document.getElementById("capaEditarUsuario").innerHTML = vista;
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

function validarUpdateUsuarios() {
    const n_texto = document.getElementById("n_texto");
    const a1_texto = document.getElementById("a1_texto");
    let mensaje = '';
    var n_check = 0;
    var a1_check = 0;

    if (n_texto.value == '') {
        document.getElementById('n_texto').style.borderColor = 'red';
        n_check = 1;
    } else { n_texto.style.borderColor = ''; }

    if (a1_texto.value == '') {
        document.getElementById('a1_texto').style.borderColor = 'red';
        a1_check = 1;
    } else { a1_texto.style.borderColor = ''; }

    if (n_check == 1 || a1_check == 1) {
        mensaje = 'Los campos marcados en rojo no pueden estar vacios.';
    } else {
        // Enviar formulario
        updateUsuario();
        document.getElementById("capaEditarUsuario").style.display = "none";
        alert("User successfully updated!");
    }
    document.getElementById("msj").innerHTML = mensaje;
}

function updateUsuario() {
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=updateUsuario";
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioUpdate"))).toString();
    console.log(parametros);
    fetch("C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {
            document.getElementById("capaEditarUsuario").innerHTML = vista;
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}
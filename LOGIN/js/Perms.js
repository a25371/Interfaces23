function buscarPerms() {
  let opciones = { method: "GET" };
  let parametros = "controlador=Perms&metodo=buscarPerms";
  parametros +=
    "&" +
    new URLSearchParams(
      new FormData(document.getElementById("formularioBuscar"))
    ).toString();
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return res.text();
      }
    })
    .then((vista) => {
      document.getElementById("capaResultadosBusqueda").innerHTML = vista;
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}

//INSERT PERMS
function getInsertPerms(id_menu) {
  let opciones = { method: "GET" };
  let parametros = "controlador=Perms&metodo=getInsertPerms";
  parametros += "&id_menu=" + id_menu;
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return res.text();
      }
    })
    .then((vista) => {
      document.getElementById("OpcionesPerms").innerHTML = vista;
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}
function insertPerms() {
  let opciones = { method: "GET" };
  let parametros = "controlador=Perms&metodo=insertPerms";
  parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formPermsInsert"))).toString();
  console.log(parametros);
  
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return "El permiso se a creado correctamente."; // Return a success message
      } else {
        throw new Error("Error en la creación de permiso!");
      }
    })
    .then((message) => {
      document.getElementById("OpcionesPerms").innerHTML = message; // Display success message
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
      document.getElementById("OpcionesPerms").innerHTML = err.message; // Display failure message
    });
}

//UPDATE PERMS
function getUpdatePerms(id_permiso) {
  let opciones = { method: "GET" };
  let parametros = "controlador=Perms&metodo=getUpdatePerms";
  parametros += "&id_permiso=" + id_permiso;
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return res.text();
      }
    })
    .then((vista) => {
      document.getElementById("OpcionesPerms").innerHTML = vista;
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}
function updatePerms() {
  let opciones = { method: "GET" };
  let parametros = "controlador=Perms&metodo=updatePerms";
  parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formUpdatePerm"))).toString();
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return res.text();
      }
    })
    .then((vista) => {
      document.getElementById("OpcionesPerms").innerHTML = vista;
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}

//DELETE PERMS
function getDeletePerms(id_permiso) {
  let opciones = { method: "GET" };
  let parametros = "controlador=Perms&metodo=getDeletePerms";
  parametros += "&id_permiso=" + id_permiso;
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return res.text();
      }
    })
    .then((vista) => {
      document.getElementById("OpcionesPerms").innerHTML = vista;
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}
function deletePerms(id_permiso) {
  let opciones = { method: "GET" };
  let parametros = "controlador=Perms&metodo=deletePerms";
  parametros += "&id_permiso=" + id_permiso;
  console.log(parametros);
  
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return "El permiso se ha borrado correctamente."; // Return a success message
      } else {
        throw new Error("Error en el borrado de permiso!");
      }
    })
    .then((message) => {
      document.getElementById("OpcionesPerms").innerHTML = message; // Display success message
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
      document.getElementById("OpcionesPerms").innerHTML = err.message; // Display failure message
    });
}

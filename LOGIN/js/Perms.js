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
function getInsertPerms(id_permiso) {
  let opciones = { method: "GET" };
  let parametros = "controlador=Perms&metodo=getInsertPerms";
  parametros += "&id_permiso=" + id_permiso;
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return res.text();
      }
    })
    .then((vista) => {
      document.getElementById("capaInsertPerms").innerHTML = vista;
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}
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
      document.getElementById("capaEditarPerms").innerHTML = vista;
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}
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
      document.getElementById("capaInsertPerms").innerHTML = vista;
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}
function insertPerms() {
  let opciones = { method: "GET" };
  let parametros = "controlador=Perms&metodo=insertPerms";
  parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formInsertPerm"))).toString();
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return res.text();
      }
    })
    .then((vista) => {
      document.getElementById("capaInsertPerms").innerHTML = vista;
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
      document.getElementById("capaInsertPerms").innerHTML = vista;
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}
function deletePerms() {}

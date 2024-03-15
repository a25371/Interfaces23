function buscarPerms() {
  let opciones = { method: "GET" };
  let parametros = "controlador=Perms&metodo=buscarPerms";
  parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioBuscar"))).toString();
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
      document.getElementById("FP_titulo").focus();
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
      buscarPerms();
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
      document.getElementById("FP_titulo").focus();
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}
function updatePerms() {
  let opciones = { method: "GET" };
  let parametros = "controlador=Perms&metodo=updatePerms";
  parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formPermsUpdate"))).toString();
  console.log(parametros);
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return "El permiso se ha modificado correctamente."; // Return a success message
      } else {
        throw new Error("Error en la modificación de permiso!");
      }
    })
    .then((message) => {
      document.getElementById("OpcionesPerms").innerHTML = message; // Display success message
      buscarPerms();
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
      document.getElementById("OpcionesPerms").innerHTML = err.message; // Display failure message
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
      document.getElementById("button-Dconfirm").focus();
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
      buscarPerms();
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
      document.getElementById("OpcionesPerms").innerHTML = err.message; // Display failure message
    });
}

///////////////////////////////////////////////////////////////
// CODIGO MENUS
///////////////////////////////////////////////////////////////

// INSERT MENU

function getInsertMenu(id_menu) {
  let opciones = { method: "GET" };
  let parametros = "controlador=Menus&metodo=getInsertMenu";
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
      document.getElementById("MTitulo").focus();
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}
function insertMenu() {
  let opciones = { method: "GET" };
  let parametros = "controlador=Menus&metodo=insertMenu";
  parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formMenuInsert"))).toString();
  console.log(parametros);
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return "El Menu se a creado correctamente."; // Return a success message
      } else {
        throw new Error("Error en la creación de menu!");
      }
    })
    .then((message) => {
      document.getElementById("OpcionesPerms").innerHTML = message; // Display success message
      buscarPerms();
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
      document.getElementById("OpcionesPerms").innerHTML = err.message; // Display failure message
    });
}

// INSERT SUBMENU 
function getInsertSubMenu(id_menu) {
  let opciones = { method: "GET" };
  let parametros = "controlador=Menus&metodo=getInsertSubMenu";
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
      document.getElementById("MTitulo").focus();
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}
function insertSubMenu() {
  let opciones = { method: "GET" };
  let parametros = "controlador=Menus&metodo=insertSubMenu";
  parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formSubMenuInsert"))).toString();
  console.log(parametros);
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return "El Menu se a creado correctamente."; // Return a success message
      } else {
        throw new Error("Error en la creación de menu!");
      }
    })
    .then((message) => {
      document.getElementById("OpcionesPerms").innerHTML = message; // Display success message
      buscarPerms();
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
      document.getElementById("OpcionesPerms").innerHTML = err.message; // Display failure message
    });
}

// UPDATE MENU

function getUpdateMenu(id_menu) {
  let opciones = { method: "GET" };
  let parametros = "controlador=Menus&metodo=getUpdateMenu";
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
      document.getElementById("MTitulo").focus();
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}
function updateMenu() {
  let opciones = { method: "GET" };
  let parametros = "controlador=Menus&metodo=updateMenu";
  parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formMenuUpdate"))).toString();
  console.log(parametros);
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return "El permiso se ha modificado correctamente."; // Return a success message
      } else {
        throw new Error("Error en la modificación de permiso!");
      }
    })
    .then((message) => {
      document.getElementById("OpcionesPerms").innerHTML = message; // Display success message
      buscarPerms();
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
      document.getElementById("OpcionesPerms").innerHTML = err.message; // Display failure message
    });
}

// DELETE MENU

function getDeleteMenu(id_menu) {
  let opciones = { method: "GET" };
  let parametros = "controlador=Menus&metodo=getDeleteMenu";
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
      document.getElementById("button-Dconfirm").focus();
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
    });
}
function deleteMenu(id_menu) {
  let opciones = { method: "GET" };
  let parametros = "controlador=Menus&metodo=deleteMenu";
  parametros += "&id_menu=" + id_menu;
  console.log(parametros);
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
        console.log("Respuesta ok");
        return "El permiso se ha modificado correctamente.";
      } else {
        throw new Error("Error en la modificación de permiso!");
      }
    })
    .then((message) => {
      document.getElementById("OpcionesPerms").innerHTML = message; // Display success message
      buscarPerms();
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
      document.getElementById("OpcionesPerms").innerHTML = err.message; // Display failure message
    });
}
function updatePermsProl(checkboxStatus, id_permiso, PRol) {
  if (checkboxStatus === 1) {
      // Checkbox is checked
      PStatus = 1;
      console.log('Checkbox is checked');
  } else {
      // Checkbox is unchecked
      PStatus = 0;
      console.log('Checkbox is unchecked');
  }
  // Now you can use PStatus variable as needed
  console.log('PStatus: ' + PStatus);

  let opciones = { method: "GET" };
  let parametros = "controlador=Perms&metodo=updatePermsProl";
  parametros += "&id_permiso=" + id_permiso;
  parametros += "&id_rol=" + id_rol;
  parametros += "&Pstatus=" + PStatus;
  console.log(parametros);
  fetch("C_Ajax.php?" + parametros, opciones)
    .then((res) => {
      if (res.ok) {
      } else {
        throw new Error("Error en la modificación de permiso!");
      }
    })
    .then((message) => {
      document.getElementById("OpcionesPerms").innerHTML = message; // Display success message
      buscarPerms();
    })
    .catch((err) => {
      console.log("Error al realizar la peticion.", err.message);
      document.getElementById("OpcionesPerms").innerHTML = err.message; // Display failure message
    });
}

function updatePermsPUser(checkboxStatus, id_permiso, id_user){

}
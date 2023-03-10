function error() {
    Swal.fire(
        'Error en autenticacion',
        'Usuario o contraseña incorrectos',
        'error'
    )
}
function errorConexion() {
    Swal.fire(
        'Algo salio mal :(',
        'Comunicate con soporte (sin respuesta del servidor de autenticacion)',
        'info'
    )
}
function exito() {
    Swal.fire(
        'Solicitud Enviada',
        'La solicitud se ha enviado correctamente',
        'success'
    )
}
function negativo() {
    Swal.fire(
        'Error en la solicitud',
        'Las fechas son incorrectas',
        'info'
    )
}
function maxDias() {
    Swal.fire(
        'Error en la solicitud',
        'No se puede solciitar dias superiores a los disponibles',
        'warning'
    )
}

function aceptado(cedula,dias,hora,minuto,segundo){
    console.log(cedula,dias,hora,minuto,segundo);
    Swal.fire({
        title: 'Aceptar la solicitud de vacaciones',
        showDenyButton: true,
        confirmButtonText: 'Si',
        denyButtonText: `No`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            location.href= `./controller/aceptarSolicitudVacaciones?cedula=${cedula}&dias=${dias}&hora=${hora}&minuto=${minuto}&segundo=${segundo}`;
        } else if (result.isDenied) {
          Swal.fire('Rechazado', '', 'info')
        }
      })
}

function rechazado (cedula,hora,minuto,segundo){
    Swal.fire({
        title: 'Estas seguro de rechazar la solicitud',
        showDenyButton: true,
        confirmButtonText: 'Si',
        denyButtonText: `No`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            location.href= `./controller/rechazarSolicitudVacaciones?cedula=${cedula}&hora=${hora}&minuto=${minuto}&segundo=${segundo}`;
        } else if (result.isDenied) {
          Swal.fire('Ningun cambio realizado', '', 'info')
        }
      })
}
function docRRHH(cedula,nuevoEstado,hora,minuto,segundo){
    Swal.fire({
        title: '¿Seguro de realizar esta accion?',
        showDenyButton: true,
        confirmButtonText: 'Si',
        denyButtonText: `No`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            location.href= `./controller/estadoDocumentos?cedula=${cedula}&estado=${nuevoEstado}&hora=${hora}&minuto=${minuto}&segundo=${segundo}`;
        } else if (result.isDenied) {
          Swal.fire('Ningun cambio realizado', '', 'info')
        }
      })
}

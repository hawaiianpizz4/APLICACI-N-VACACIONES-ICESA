<?php
require_once('./model/diasLibres.php');
require_once('./model/listSolicitud.php');
require_once('./model/cedulaUsuario.php');
$diasLibres = diasLibres::numeroDias($_SESSION["nombre"], $_SESSION["apellido"]);
$cedula = cedulaUsuario::cedulaUsuarioQuery($_SESSION["nombre"], $_SESSION["apellido"]);
$solicitudesActivas = listSolicitud::listSolicituduser($cedula[0]["empleado"]);
$fechaActual = date('Y-m-d');
?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="card col-md-6 mb-lg-0 mb-4" style="margin-left: 250px;">
            <div class="card-header mx-4 p-3 text-center">
                <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                    <i class="fa fa-home opacity-10"></i>
                </div>
            </div>
            <div class="card-body pt-0 p-3 text-center">
                <h6 class="text-center mb-0">Dias a favor </h6>
                <span class="text-xs"><?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"] ?></span>
                <hr class="horizontal dark my-3">
                <h5 class="mb-0">+ <?php echo $diasLibres[0]["vacaciones"] ?> </h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-lg-0 mb-4">
            <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Solicitudes de vacaciones</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-dark mb-0" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-user=<?php echo $_SESSION["nombre"].'-'.$_SESSION["apellido"] ?> data-bs-diasFavor=<?php echo $diasLibres[0]["vacaciones"] ?>><i class="fas fa-plus"></i>&nbsp;&nbsp;Agregar Solicitud</a>
                        </div>
                    </div>
                </div>
                <?php if (count($solicitudesActivas) > 0) : ?>
                <div class="card-body p-3">
                    <?php foreach ($solicitudesActivas as $solicitud) : ?>
                    <div class="row">
                                <div class="col-md-12 mb-md-0 mb-4">
                                    <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                        <div class="icon icon-shape icon-sm bg-gradient-primary shadow text-center border-radius-lg">
                                            <i class="fa fa-check opacity-10"></i>
                                        </div>
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuario</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dias</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Observaciones</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Desde / Hasta</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm"><?php echo $solicitud["usuario"] ?></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group mt-2">
                                                            <?php echo $solicitud["diasSolicita"] ?>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-xs font-weight-bold"> <?php echo $solicitud["estado"] ?></span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <div class="progress-wrapper w-75 mx-auto">
                                                            <div class="progress-info">
                                                                <div class="progress-percentage">
                                                                    <span class="text-xs font-weight-bold"><?php echo $solicitud["observaciones"] ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <div class="progress-wrapper w-75 mx-auto">
                                                            <div class="progress-info">
                                                                <div class="progress-percentage">
                                                                    <span class="text-xs font-weight-bold"><?php echo $solicitud["fechasDesde"] ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
						  <?php if($solicitud["estado"]=='Aprobado') :?>
                                                    <td>
                                                        <a type="button" href="helpers/reporteVacaciones.php?fechaSolicita=<?php echo $solicitud["fechaSolicitud"]?>&desde=<?php echo $solicitud["fechaDesde"]?>&hasta=<?php echo $solicitud["fechaHasta"]?>&dias=<?php echo $solicitud["diasSolicita"]?>&cedula=<?php echo $solicitud["cedula"]?>">
                                                        <i class="fa fa-file-pdf-o fa-2x" style="color: red;"></i>
                                                        </a>
                                                    </td>
                                                    <?php endif ?>
						
                                                 	
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <?php endforeach ?>
                    </div>
                </div>
        <?php else : ?>
            <div class="row">
                <div class="col-md-12 mb-md-0 mb-4">
                    <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                        <div class="icon icon-shape icon-m bg-gradient-primary shadow text-center border-radius-lg">
                            <i class="fa fa-exclamation opacity-10"></i>
                        </div>
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hey</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">No existen solicitudes activas para ti </h6>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif ?>
        </div>
    </div>
</div>
</div>
<!-- Modal registro de solicitudes vacaciones -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Solicitud de vacaciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="./controller/newRequestVacations.php">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="message-text" class="col-form-label">Desde:</label>
                            <input type="text" hidden name="user">
                            <input type="text" hidden name="diasFavor" id="diasFavor">
                            <input type="date" name="desde" min="<?php echo $fechaActual ?>" class="form-control">
                        </div>
                        <div class="col">
                            <label for="message-text" class="col-form-label">Hasta:</label>
                            <input type="date" name="hasta" min="<?php echo $fechaActual ?>" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal registro de solicitudes vacaciones -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Editar Solicitud</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="./controller/editVacaciones.php">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="message-text" class="col-form-label">Cambio Desde:</label>
                            <input type="text" hidden name="user">
                            <input type="text" hidden name="estado">
                            <input type="text" hidden name="diasFavor" id="diasFavor">
                            <input type="date" name="desde" min="<?php echo $fechaActual ?>" class="form-control">
                        </div>
                        <div class="col">
                            <label for="message-text" class="col-form-label">Cambio Hasta:</label>
                            <input type="date" name="hasta" min="<?php echo $fechaActual ?>" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var recipient = button.getAttribute('data-bs-user')
        var diasFavor = button.getAttribute('data-bs-diasFavor')
        var modalBodyInput = exampleModal.querySelector('.modal-body input')
        var modaldiasFavor = exampleModal.querySelector("input[name='diasFavor']")
        modalBodyInput.value = recipient
        modaldiasFavor.value = diasFavor
    })

    var modalEdit = document.getElementById('modalEdit')
    modalEdit.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var usuario = button.getAttribute('data-bs-user')
        var estado = button.getAttribute('data-bs-estado')
        var diasFavor = button.getAttribute('data-bs-diasFavor')
        var usuarioPost = modalEdit.querySelector('.modal-body input');
        var estadoPost = modalEdit.querySelector("input[name='estado']");
        var modaldiasFavor = exampleModal.querySelector("input[name='diasFavor']")
        usuarioPost.value = usuario;
        estadoPost.value = estado;
        modaldiasFavor.value = diasFavor;
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<footer class="footer pt-3  ">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="https://github.com/jordy-sudo" class="font-weight-bold" target="_blank">ICESA S.A</a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
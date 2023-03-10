<?php
require_once('./model/listaTotalVacaciones.php');
$lista = listaTotal::lista();
?>

<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Solicitudes aceptadas para recepcion de documentos</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">solicitudes </span> aprobadas
                            </p>
                        </div>
                    </div>
                </div>
                <?php if (count($lista) > 0) : ?>
                    <div class="row">
                        <div class="col-md-12 mb-md-0 mb-4">
                            <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                <table class="table align-items-center mb-0" >
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuario</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dias</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Observaciones</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado Documento</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Entrega de Documentos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php foreach ($lista as $usuario) : ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"><?php echo $usuario["usuario"] ?></h6>
                                                            <p class="text-xs text-secondary mb-0"><?php echo $usuario["cargo"] ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="avatar-group mt-2">
                                                        <?php echo $usuario["diasSolicita"] ?>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> <?php echo $usuario["estado"] ?></span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <div class="progress-wrapper w-75 mx-auto">
                                                        <div class="progress-info">
                                                            <div class="progress-percentage">
                                                                <span class="text-xs font-weight-bold"><?php echo $usuario["observaciones"] ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <div class="progress-wrapper w-75 mx-auto">
                                                        <div class="progress-info">
                                                            <div class="progress-percentage">
                                                                <span class="text-xs font-weight-bold"><?php echo $usuario["estadoRRHH"] ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php if($usuario["estadoRRHH"]=="Sin Entregar") : ?>
                                                <td class="align-middle text-center text-sm">
                                                    <a type="button" onclick="docRRHH(<?php echo $usuario['cedula'] ?>,1,<?php echo $usuario['hora'] ?>,<?php echo $usuario['minutos'] ?>,<?php echo $usuario['segundos'] ?>)"><i class="fas fa-check ms-auto text-success cursor-pointer"></i></a> 
                                                    &nbsp&nbsp&nbsp&nbsp
                                                    <a type="button" onclick="docRRHH(<?php echo $usuario['cedula'] ?>,2,<?php echo $usuario['hora'] ?>,<?php echo $usuario['minutos'] ?>,<?php echo $usuario['segundos'] ?>)"><i class=" fas fa-times ms-auto text-danger cursor-pointer"></i></a>
                                                </td>
                                                <?php else :?>
                                                    <td class="align-middle text-center text-sm">
                                                        
                                                    </td>
                                                <?php endif ?>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                            </div>
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
                                                        <h6 class="mb-0 text-sm">No existen solicitudes aprobadas </h6>
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
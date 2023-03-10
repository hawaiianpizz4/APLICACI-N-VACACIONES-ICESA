<?php
require_once('./model/historialSolicitudes.php');
$historicoSolicitudes = historialSolicitudes::historialSolicitud($_SESSION["nombre"], $_SESSION["apellido"]);
?>

<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Historico</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">Historial </span> Solicitudes
                            </p>
                        </div>
                    </div>
                </div>
		<?php if (count($historicoSolicitudes) > 0) : ?>
                <?php foreach ($historicoSolicitudes as $usuario) : ?>
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
                                                                <h6 class="mb-0 text-sm"><?php echo $usuario["usuario"] ?></h6>
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
                                                                    <span class="text-xs font-weight-bold"><?php echo $usuario["fechasDesde"] ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>                                            
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
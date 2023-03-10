<?php
if (isset($_GET["pagina"])) {

  switch ($_GET["pagina"]) {
    case 'listUsers':
      $pagina = 'Listado de Usuarios';
      break;
    case 'adminContent':
      $pagina = 'Contenedor de solicitudes';
      break;
    default:
      $pagina = '---';
      break;
  }
} else {
  $pagina = '';
}
?>

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Paginas</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?php echo $pagina ?></li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Icesa S.A</h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto ">
      </div>
      <ul class="navbar-nav  justify-content-end">
        <li class="nav-item d-flex align-items-center">
          <a class="btn btn-outline-primary btn-sm mb-0 me-3 mr-3" href="./controller/logoutController.php">Cerrrar Sesion</a>
        </li>
        <li class="nav-item d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
            <i class="fa fa-user me-sm-1"></i>
            <span class="d-sm-inline d-none"><?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"] ?></span>
          </a>
        </li>
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
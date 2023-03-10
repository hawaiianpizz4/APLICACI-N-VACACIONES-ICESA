<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./view/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./view/assets/img/favicon.png">
  <title>
    Control Usuarios
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./view/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./view/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./view/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="./view/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="./view/assets/js/alerts/sweetAlert.js"></script>
</head>

<body class="">
    <?php 
    if(isset($_GET["message"])){
      if($_GET["message"]=='error'){
        echo"<script>error()</script>";
      }else{
        echo"<script>errorConexion()</script>";
      }
    }
    ?>
  <main class="main-content  mt-0">
    <section style="margin-top: 50px;">
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card mt-5" style="box-shadow: rgb(0 0 0 / 48%) 0px 4px 32px;">
                <div class="card-header pb-0 text-left bg-transparent">
                  <img src="./view/assets/img/logoICESA.png" alt="IcesaLogo" width="100%" style="align-items: center;">
                  <!-- <h3 class="font-weight-bolder text-info text-gradient">Usuarios</h3> -->
                  <!-- <p class="mb-0">Ingresa tu usuario y contraseña de la empresa</p> -->
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="./controller/loginController">
                    <label>Usuario</label>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="user" placeholder="Usuario" aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <label>Contraseña</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="pass" placeholder="Contraseña" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Ingresar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('./view/assets/img/curved-images/curved13.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="./view/assets/js/core/popper.min.js"></script>
  <script src="./view/assets/js/core/bootstrap.min.js"></script>
  <script src="./view/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./view/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="./view/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
<?php
if (!$_SESSION) {
    header('Location: ./login');
}
if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 1800)) {
    session_unset();
    session_destroy();
    header('Location: ./login');
}
$_SESSION['start'] = time();
?>

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <!-- datatable -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php
    if (isset($_GET["message"])) {
        if ($_GET["message"] == "exito") {
            echo "<script>exito()</script>";
        } else if ($_GET["message"] == "error") {
            echo "<script>error()</script>";
        } else if ($_GET["message"] == "maxDias") {
            echo "<script>maxDias()</script>";
        } else {
            echo "<script>negativo()</script>";
        }
    }
    ?>
    <!-- Sidebar -->
    <?php include('./view/modules/sidebar.php'); ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include('./view/modules/navbar.php'); ?>
        <!-- Content Pages  -->
        <?php

        if ($_SESSION["rol"] == 1) {
            if (isset($_GET["pagina"])) {
                include "pages/" . $_GET["pagina"] . ".php";
            } else {
                include('./view/pages/adminContent.php');
            }
        }
        if ($_SESSION["rol"] == 0) {
            if (isset($_GET["pagina"])) {
                include "pages/" . $_GET["pagina"] . ".php";
            } else {
                include('./view/pages/guestContent.php');
            }
        }

        ?>
    </main>
    <!--   Core JS Files   -->
    <script src="./view/assets/js/core/popper.min.js"></script>
    <script src="./view/assets/js/core/bootstrap.min.js"></script>
    <script src="./view/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./view/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./view/assets/js/plugins/chartjs.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./view/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            });
        });
    </script>
</body>

</html>
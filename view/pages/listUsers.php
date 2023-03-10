<?php
require_once('./model/listUsers.php');
$usuarios = listUsers::listarUsuarios($_SESSION["nombre"],$_SESSION["apellido"]);
?>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Usuarios por departamento</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Informacion</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Departamento</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vacaciones</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($usuarios as $user) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
    
                          <!-- <img src="./view/assets/img/logo-user.png" class="avatar avatar-sm me-3" alt="user1"> -->
                          <div class="icon icon-shape icon-sm bg-gradient-primary shadow text-center border-radius-lg" style="margin-right: 20px;">
                            <i class="fa fa-user opacity-10"></i>
                          </div>
  
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?php echo $user["nombres"]?></h6>
                          <p class="text-xs text-secondary mb-0"><?php echo $user["cargo"] ?></p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">Icesa</p>
                      <p class="text-xs text-secondary mb-0"><?php echo $user["ciudad"] ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?php echo $user["vacaciones"] ?></span>
                    </td>

                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
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
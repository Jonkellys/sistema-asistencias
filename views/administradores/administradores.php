<?php
  session_start(['name' => 'Sistema']);

  if(!isset($_SESSION['token']) || !isset($_SESSION['usuario'])) {
    unset($_SESSION['id']);
    unset($_SESSION['nombre']);
    unset($_SESSION['apellido']);
    unset($_SESSION['usuario']);
    unset($_SESSION['email']);
    unset($_SESSION['clave']);
    unset($_SESSION['tipo']);
    unset($_SESSION['genero']);

    session_destroy();
    header('Location: http://localhost/sistema-asistencias/login');
  }
?>

<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Administradores | <?php echo NOMBRE;?></title>

    <meta name="description" content="" />

    <?php include "./modulos/links.php"; ?>


  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo" style="padding: 4%;">
            <a href="javascript:void(0);" class="app-brand-link">
            <span style="width: 18%; height: 25%;" class="app-brand-logo demo">
              <img style="width: 100%; height: 100%;" src="<?php echo media; ?>assets/img/logo1.png" alt="">
            </span>
            <h5 class="demo menu-text fw-bolder ms-2" style="width: fit-content; margin-top: 8%;"><?php echo NOMBRE; ?></h5>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Información</span>
            </li>
            <li class="menu-item">
              <a href="personal" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Personal">Personal</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="asistencias" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-add"></i>
                <div data-i18n="Registros">Asistencias</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="calendar" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Calendario">Calendario</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Cuentas</span>
            </li>
            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-male"></i>
                <div data-i18n="Usuarios">Usuarios</div>
              </a>
            </li>
            <?php include "./modulos/logout.php"; ?>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Content wrapper -->
          <div class="content-wrapper" id="place">
            <!-- Content -->
            <div class="">
              <div class="container-fluid flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cuentas / Usuarios /</span> Administradores</h4>


                <div class="row">
                  <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                      <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"> Administradores</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="users"> Usuarios</a>
                      </li>
                    </ul>
                  </div>
                </div>

                <button type="button" style="margin: 0% 1% 1% 1%;" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#AdminAdd" aria-expanded="false" aria-controls="collapseAdminAdd">
                  <span class="tf-icons bx bx-user-plus"></span>   Añadir Administrador
                </button>

                <div class="card mb-4">
                  <div class="collapse" id="AdminAdd">
                    <div class="card ">
                      <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Datos de la Cuenta</h4>
                      </div>
                      <div class="card-body form-resto">
                        <form action="<?php echo SERVERURL; ?>conexiones/adminReg.php" id="adminForm" autocomplete="off" enctype="multipart/form-data" method="POST" data-form="save" class="FormularioAjax">
                          <div class="row mb-3">
                            <label for="nombreAdminAdd" class="form-label">Nombre</label>
                            <div class="col-sm-10">
                              <input type="text" autocapitalize="" name="nombre" onkeypress="return letras(event)" id="nombreAdminAdd" class="form-control" placeholder="Ingresar Nombre" />
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="apellidoAdminAdd" class="form-label">Apellido</label>
                            <div class="col-sm-10">
                              <input type="text" autocapitalize="" name="apellido" onkeypress="return letras(event)" id="apellidoAdminAdd" class="form-control" placeholder="Ingresar Apellido" />
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="usuarioAdminAdd" class="form-label">Nombre de Usuario</label>
                            <div class="col-sm-10">
                              <input type="text" name="usuario" id="usuarioAdminAdd" class="form-control" placeholder="Ingresar Nombre de Usuario" />
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="correoAdminAdd" class="form-label">Correo</label>
                            <div class="col-sm-10">
                              <input type="email" name="email" id="correoAdminAdd" class="form-control" placeholder="Ingresar Correo" />
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="clave1AdminAdd" class="form-label">Contraseña</label>
                            <div class="col-sm-10">
                              <input type="password" name="clave"  id="claveAdminAdd" class="form-control" placeholder="Ingresar Contraseña" />
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="clave2AdminAdd" class="form-label">Repetir Contraseña</label>
                            <div class="col-sm-10">
                              <input type="password" name="confirmar"  id="clave2AdminAdd" class="form-control" placeholder="Ingresar Contraseña Nuevamente" />
                            </div>
                          </div>

                          <div class="row">
                            <div class="row-md">
                              <label for="genero" class="form-label">Género</label>
                              <div class="form-check mt-3">
                                <input name="genero" class="form-check-input" type="radio" value="Femenino" id="femeninoAdminAdd" checked="">
                                <label class="form-check-label" for="femenino"> Femenino </label>
                              </div>
                              <div class="form-check">
                                <input name="genero" class="form-check-input" type="radio" value="Masculino" id="masculinoAdminAdd">
                                <label class="form-check-label" for="masculino"> Masculino </label>
                              </div>
                            </div>
                          </div>

                          <div class="row mt-4">
                            <label for="respuesta" class="form-label">Pregunta Secreta</label>
                            <div id="defaultFormControlHelp" class="mt-0">
                              ¿Cuál es tu color favorito?
                            </div>
                            <div class="col-sm-10">
                              <input type="text" autocapitalize="" name="respuesta" onkeypress="return letras(event)" id="respuesta" class="form-control" placeholder="Responde la pregunta secreta" />
                            </div>
                            <div id="defaultFormControlHelp" class="form-text">
                              Esto te ayudará a recuperar tu cuenta.
                            </div>
                          </div>

                          <br>
                          <div class="d-grid gap-2 col-lg-6 mx-auto">
                            <button class="btn btn-primary" value="Submit" id="btn" type="submit">Registrar Administrador</button>
                          </div>
                          <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <?php
                  $msg = $_GET['msg'];
                if (isset($msg)) {
                  echo '
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    No se puede eliminar el administrador principal.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    echo '<script> window.location = "http://localhost/sistema-asistencias/administradores"; </script>';
                }
          ?>

              <div class="card mb-4">
                <div class="card" style="padding: 0px 2%;">
                  <h5 class="card-header">Lista de Administradores</h5>
                  <div class="table-responsive text-nowrap" style="overflow: hidden;">
                    <table class="table table-hover" style="margin-bottom: 2%;" id="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombre de Usuario</th>
                          <th>Correo</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        <?php
                          $servername = "localhost";
                          $dbname = "sistema-asistencias";
                          $username = "root";
                          $password = "";
                          $num = 1;

                          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                          $sql = "SELECT * FROM admins";
                          $result = $conn->query($sql);

                          while ($rows = $result->fetch()) {
                            echo"<tr>
                                  <td> <strong>" . $num++ . "</strong></td>
                                  <td>" . $rows['AdminUsuario'] . "</td>
                                  <td>" . $rows['AdminEmail'] . "</td>
                                  <td class='mt-0'>
                                    <a class='btn btn-sm btn-info' href='editarAdmin?codigo=" . $rows['CuentaCodigo'] . "'>
                                      <span class='tf-icons bx bx-edit'></span>
                                    </a>
                                    
                                    <a class='btn btn-sm btn-danger' href= 'conexiones/eliminarAdmin.php?codigo=" . $rows['CuentaCodigo'] . "'>
                                  <span class='tf-icons bx bx-trash'></span>
                                </a>
                                    
                                  </td>
                                </tr>";
                          };  
                        ?>
                      </tbody>
                    </table>
                    <?php

                $con = new mysqli($servername, $username, $password, $dbname);

                $sql = "SELECT * FROM admins";
                if($result = mysqli_query($con, $sql)) {
                  $rowcount = mysqli_num_rows($result);
                }
                $codigo = $_GET['codigo'];

              if (isset($codigo)) {

              if($rowcount != 1) {
                $sql = $conn->prepare("DELETE FROM admins WHERE CuentaCodigo = '$codigo'");

                $sql1 = $conn->prepare("DELETE FROM cuentas WHERE CuentaCodigo = '$codigo'");


                if ($sql->execute() && $sql1->execute()) {
                  echo '<div class="alert alert-success" role="alert">
                    Administrador eliminado correctamente.
                </div>';
                  echo '<script> window.location.href = "http://localhost/sistema-asistencias/administradores"; </script>';
                  
                } else {
                  echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    Huno un error, intente de nuevo.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
              } else {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                No se puede eliminar el administrador principal.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                echo '<script> window.location.href = "http://localhost/sistema-asistencias/administradores"; </script>';
              }
              
              }
              ?>
                  </div>
                </div>
              </div>

                <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" id="data">
                      <div class="modal-header">
                        <h5 class="modal-title" >Datos de ""</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <form action="<?php echo SERVERURL; ?>conexiones/updateAdmin.php" enctype="multipart/form-data" method="POST" data-form="update" class="FormularioAjax">
                      
                      <div class="row">
                              <div class="col mb-3">
                                <label for="noombreadmin" class="form-label">Nombre:</label>
                                <input type="text" name="nombre" class="form-control"/>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                                <label for="apellidoadmin" class="form-label">Apellido:</label>
                                <input type="text" name="apellido" class="form-control"/>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                                <label for="cedulaadmin" class="form-label">Usuario</label>
                                <input type="text" name="usuario" class="form-control"/>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                                <label for="apellidoadmin" class="form-label">Correo:</label>
                                <input type="email" name="correo" class="form-control"/>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-0">
                                <label for="generoadmin" class="form-label">Género:</label>
                                <input type="text" name="genero" class="form-control"/>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                                <label for="apellidoadmin" class="form-label">Contraseña:</label>
                                  <input type="password" name="clave" class="form-control" />
                                </div>
                              </div>
                            </div>
                            
                            <div class="modal-footer">
                              <input type="hidden" id="txt_userid" value="0">
                              <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                              <button type="submit" id="btn-save" class="btn btn-primary">Actualizar</button>
                            </div>
                          </form>
                          </div>
                        </div>
                  </div>
                </div>
              
            </div>
        </div>
      </div>
    </div>



      <?php include "./modulos/scripts.php"; ?>

      <script src="<?php echo media; ?>assets/vendor/js/principal.js"></script>
      <script src="<?php echo media; ?>assets/datatables/config.js"></script>

      <script>
      function letras(e) {
        tecla = (document.all) ? e.keyCode : e.which;

        if (tecla == 8) {
          return true;
        }

        if (tecla == 32) {
          return true;
        }

        patron = /[A-Za-z]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
      }
    </script>

  </body>
</html>
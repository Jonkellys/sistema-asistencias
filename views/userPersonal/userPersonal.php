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

    <title>Personal | <?php echo NOMBRE;?></title>

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
        <a href="userHome" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Inicio</div>
        </a>
      </li>

      <!-- Layouts -->
      
      <li class="menu-header small text-uppercase">
          <span class="menu-header-text">Información</span>
      </li>
      <li class="menu-item active">
        <a href="javascript:void(0);" class="menu-link">
          <i class="menu-icon tf-icons bx bx-group"></i>
          <div data-i18n="Personal">Personal</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="userAsistencias" class="menu-link">
          <i class="menu-icon tf-icons bx bx-book-add"></i>
          <div data-i18n="Registros">Asistencias</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="userCalendar" class="menu-link">
          <i class="menu-icon tf-icons bx bx-calendar"></i>
          <div data-i18n="Calendario">Calendario</div>
        </a>
      </li>
      <?php include "./modulos/logout.php"; ?>
    </ul>  
  </aside>

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Layout Demo -->
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Información / </span> Personal</h4>
              
              <div class="demo-inline-spacing">
                <button type="button" style="margin: 0% 1% 1% 1%;" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#PerAdd" aria-expanded="false" aria-controls="collapseAdminAdd">
                  <span class="tf-icons bx bx-user-plus"></span>   Añadir Personal
                </button>
                <div class="btn-group">
                      <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bx-download'></i> Generar Reporte del personal
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-danger" target="_blank" href="conexiones/PersonalList.php"><i class='bx bxs-file-pdf'></i> PDF</a></li>
                        <li><a class="dropdown-item text-success" target="_blank" href="conexiones/PersonalListEx.php"><i class='bx bx-file'></i> Excel</a></li>
                      </ul>
                    </div>
              </div>

              <div class="card mb-4 mt-4">
                <div class="collapse" id="PerAdd">
                  <div class="card ">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h4 class="mb-0">Datos Personales</h4>
                    </div>
                    <div class="card-body form-resto">
                      <form action="<?php echo SERVERURL; ?>conexiones/personalReg.php" id="perForm" autocomplete="off" enctype="multipart/form-data" method="POST" data-form="save" class="FormularioAjax">
                      <input type="hidden" name="tipo" value="<?php echo $_SESSION['tipo']; ?>">
                      
                      <div class="row mb-3">
                        <label for="nombrePerAdd" class="form-label">Nombre</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" onkeypress="return letras(event)" autocapitalize="words" id="nombrePerAdd" class="form-control" placeholder="Ingresar Nombre" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="apellidoPerAdd" class="form-label">Apellido</label>
                        <div class="col-sm-10">
                          <input type="text" name="apellido" onkeypress="return letras(event)" autocapitalize="words" id="apellidoPerAdd" class="form-control" placeholder="Ingresar Apellido" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="cedulaPerAdd" class="form-label">Cédula</label>
                        <div class="col-sm-10">
                          <input type="text" name="cedula" maxlength="30" id="cedula" class="form-control" placeholder="Ingresar Cédula" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="cedulaPerAdd" class="form-label">Cargo</label>
                        <div class="col-sm-10">
                          <input type="text" name="cargo" onkeypress="return letras(event)" class="form-control" placeholder="Ingresar Cargo" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="row-md">
                          <label for="genero" class="form-label">Género</label>
                          <div class="form-check mt-0">
                            <input name="genero" class="form-check-input" type="radio" value="Femenino" id="femeninoPerAdd" checked="">
                            <label class="form-check-label" for="femenino"> Femenino </label>
                          </div>
                          <div class="form-check">
                            <input name="genero" class="form-check-input" type="radio" value="Masculino" id="masculinoPerAdd">
                            <label class="form-check-label" for="masculino"> Masculino </label>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="telefonoPerAdd" class="form-label">Teléfono</label>
                        <div class="col-sm-10">
                          <input type="text" name="telefono" onkeypress="return numeros(event)" id="telefono" class="form-control" placeholder="Ingresar Teléfono" />
                        </div>
                        <div class="mt-2">
                          <div class="form-check">
                            <input class="form-check-input" value="No tiene teléfono" name="noTel" value="" type="checkbox" id="noTelf" />
                            <label class="form-check-label" for="noTelf"> No tiene teléfono </label>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="correoPerAdd" class="form-label">Correo</label>
                        <div class="col-sm-10">
                          <input type="email" name="correo" id="correoPerAdd" class="form-control" placeholder="Ingresar Correo" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="direccionPerAdd" class="form-label">Dirección</label>
                        <div class="col-sm-10">
                          <input type="text" autocapitalize="on" name="direccion" id="direccionPerAdd" class="form-control" placeholder="Ingresar Dirección" />
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="fechanacPerAdd" class="form-label">Fecha de Nacimiento</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="fechaNac" type="date" value="" id="html5-date-input">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="lugarnacPerAdd" class="form-label">Lugar de Nacimiento</label>
                        <div class="col-sm-10">
                          <input type="text" name="lugarNac" onkeypress="return letras(event)" autocapitalize="words" id="correoAdminAdd" class="form-control" placeholder="Ingresar Lugar de Nacimiento" />
                        </div>
                      </div>

                      <br>
                      <div class="d-grid gap-2 col-lg-6 mx-auto">
                        <button class="btn btn-primary" value="Generate QR Code" id="btn" type="submit">Registrar Personal</button>
                      </div>
                      <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax"></div>
                    </form>
                  </div>
                  </div>
                </div>
              </div>

              <div class="card mb-4">
                <div class="card" style="padding: 0px 2%;">
                  <h5 class="card-header">Lista del Personal</h5>
                  <div class="table-responsive text-nowrap" style="overflow: hidden;">
                    <table class="table table-hover" style="margin-bottom: 2%;" id="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Cédula</th>
                          <th>Cargo</th>
                          <th>Estado</th>
                          <th>Editar</th>
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
                          $sql = "SELECT * FROM personal";
                          $result = $conn->query($sql);

                          while ($rows = $result->fetch()) {
                            $estado = $rows['PersonalEstado'];
                            if($estado == "Activo") {
                              $state = '<span class="badge bg-label-primary me-1">Activo</span>';
                            } else if($estado == "Vacaciones") {
                              $state = '<span class="badge bg-label-warning me-1">Vacaciones</span>';
                            } else if($estado == "Con Permiso Médico") {
                              $state = '<span class="badge bg-label-info me-1">Con Permiso Médico</span>';
                            }

                            echo"<tr>
                                  <td> <strong>" . $num++ . "</strong></td>
                                  <td>" . $rows['PersonalNombre'] . "</td>
                                  <td>" . $rows['PersonalApellido'] . "</td>
                                  <td>" . $rows['PersonalCedula'] . "</td>
                                  <td>" . $rows['PersonalCargo'] . "</td>
                                  <td>" . $state . "</td>

                                  <td class='mt-0'>
                                  <a class='btn btn-sm btn-info' href='userEditar?codigo=" . $rows['PersonalCodigo'] . "'>
                                    <span class='tf-icons bx bx-edit'></span>
                                  </a>
                                </td>
                              </tr>";
                          };  
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Layout Demo -->
            </div>
            <!-- / Content -->


          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <?php include "./modulos/scripts.php"; ?>
    <script src="<?php echo media; ?>assets/vendor/js/principal.js"></script>
    <script src="<?php echo media; ?>assets/datatables/config.js"></script>
    <script>
      $("#cedula").on({
        "focus": function (event) {
            $(event.target).select();
        },
        "keyup": function (event) {
          $(event.target).val(function (index, value ) {
                return value.replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
              });
            }
      });

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

      function numeros(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8){
          return true;
        }

        if (tecla == 32) {
          return true;
        }

        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
      }
    </script>

  </body>
</html>

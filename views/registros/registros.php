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
  lang="es"
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

    <title>Registros | <?php echo NOMBRE;?></title>

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
            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link">
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
            <li class="menu-item">
              <a href="administradores" class="menu-link">
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
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-fluid flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Información / Asistencias /</span> Registros</h4>
              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link" href="asistencias"> Asistencias</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"> Registros</a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="card align-center col-lg-11 mt-4">
                <div class="card-body">
                  <h5 class="card-title">Crea un reporte</h5>
                  <form action="<?php echo SERVERURL; ?>conexiones/reporteMes.php" enctype="multipart/form-data" method="POST">
                    <div class="mt-2">
                      <label class="form-label" for="basic-default-fullname">Desde:</label>
                      <input class="form-control" required name="inicio" type="date" id="desde">
                    </div>
                    <div class="mt-2">
                      <label class="form-label" for="basic-default-company">Hasta:</label>
                      <input class="form-control" required name="fin" type="date" id="hasta">
                    </div>
                    <div class="mt-2">
                      <label class="form-label" for="basic-default-company">Personal:</label>
                      <select class="form-select" required name="persona" >
                        <option selected="" value="Todos">Todo el Personal</option>
                          <?php
                            $servername = "localhost";
                            $dbname = "sistema-asistencias";
                            $username = "root";
                            $password = "";

                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $sql = "SELECT * FROM personal";
                            $result = $conn->query($sql);
                                  
                            while ($rows = $result->fetch()) {
                              echo'<option value="' . $rows['PersonalCodigo'] . '">' . $rows['PersonalNombre'] . '  ' . $rows['PersonalApellido'] . '</option>';
                            };  
                          ?>
                      </select>
                    </div>
                    <div class="card-footer d-grid gap-6 col-lg-4 mx-auto">
                      <button class="btn btn-md rounded-pill btn-danger" type="submit"><i class='bx bxs-file-pdf'></i> Generar PDF</button>
                    </div>  
                  </form>
                </div>
                </div>
              </div>


            <!-- / Content -->
          </div>
        </div>
      </div>
    </div>
            
          <?php include "./modulos/scripts.php"; ?>
          <script src="<?php echo media; ?>assets/vendor/js/principal.js"></script>
          <script>
            function actualizar() {
              const $inputfile = document.querySelector("#img"),
                    $img = document.querySelector("#image");

                    $inputfile.addEventListener("change", () -> {
                      const file = $inputfile.files;
                      if(!files || !files.length) {
                        $img.src = "";
                        return;
                      }
                      const archivo = files[0];
                      cont url = URL.createObjectURL(archivo);
                      $img.src = URL;
                    });
            }
          </script>
   </body>
</html>

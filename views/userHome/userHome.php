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

    <title>Inicio | <?php echo NOMBRE;?></title>

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
      <li class="menu-item active">
        <a href="javascript:void(0);" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Inicio</div>
        </a>
      </li>

      <!-- Layouts -->
      
      <li class="menu-header small text-uppercase">
          <span class="menu-header-text">Información</span>
      </li>
      <li class="menu-item">
        <a href="userPersonal" class="menu-link">
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
              <div class="row mb-5">
                <nav class="navbar">
                  <div class="container-fluid">
                    <a class="navbar-brand " href="javascript:void(0)"><h3 class="mb-0">👋   <?php if($_SESSION['genero'] == "Femenino") {$welcome = "Bienvenida";} else {$welcome = "Bienvenido";} echo $welcome;   ?><small class="text-muted">  <?php echo $_SESSION['nombre']; ?></small></h3></a>
                  </div>
                </nav>  

                  <div class="col-md-6 col-lg-4 mt-3">
                    <div class="card h-100">
                      <img class="card-img card-img-left" src="<?php echo media; ?>assets/img/personal.svg">
                      <div class="card-body text-center">
                        <?php
                          $servername = "localhost";
                          $dbname = "sistema-asistencias";
                          $username = "root";
                          $password = "";

                          $conn = new mysqli($servername, $username, $password, $dbname);

                          $sql = "SELECT * FROM personal";

                          if($result = mysqli_query($conn, $sql)) {
                            $rowcount = mysqli_num_rows($result);
                          }
                        ?>
                        <h3 class="card-title">Personal Total</h3>
                          <p style="font-size: xx-large;">
                            <b><?php echo $rowcount; ?></b>
                          </p>
                      </div>
                    </div>
                  </div>

                <div class="demo-vertical-spacing" style="width: max-content; max-content; display: flex; flex-direction: column; align-items: center;">
                  <div style="height: fit-content; width: max-content;" class="col-md-6 col-lg-6 mt-3">
                    <?php
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      $active = "Activo";
                      $permise = "Con Permiso Médico";
                      $vacaciones = "Vacaciones";

                      $estado1 = "SELECT id FROM personal WHERE PersonalEstado = '$active'";
                      if($resultEst = mysqli_query($conn, $estado1)) {
                        $activo = mysqli_num_rows($resultEst);
                      }

                      $estado2 = "SELECT id FROM personal WHERE PersonalEstado = '$permise'";
                      if($resultEst1 = mysqli_query($conn, $estado2)) {
                        $permiso = mysqli_num_rows($resultEst1);
                      }

                      $estado3 = "SELECT id FROM personal WHERE PersonalEstado = '$vacaciones'";
                      if($resultEst2 = mysqli_query($conn, $estado3)) {
                        $vacac = mysqli_num_rows($resultEst2);
                      }
                    ?>
                    <div class="card h-100">
                      <div class="btn-group" role="group" aria-label="First group">
                        <button type="button" disabled class="btn btn-outline-primary">
                          <i style="font-size: 40px;" class="tf-icons bx bx-briefcase"></i>
                          <h4>Personal Activo</h4>
                          <p style="font-size: xx-large;"><?php echo $activo; ?></p>
                        </button>
                        <button type="button" disabled class="btn btn-outline-primary">
                          <i style="font-size: 40px;" class="tf-icons bx bx-capsule"></i>
                          <h4>Personal Con Permiso</h4>
                          <p style="font-size: xx-large;"><?php echo $permiso; ?></p>
                        </button>
                        <button type="button" disabled class="btn btn-outline-primary">
                          <i style="font-size: 40px;" class="text-primary tf-icons bx bx-baseball"></i>
                          <h4>Personal Con <br> Vacaciones</h4>
                          <p style="font-size: xx-large;"><?php echo $vacac; ?></p>
                        </button>
                      </div>
                    </div>
                  </div>

                  <div style="height: fit-content; width: max-content;" class="col-md-6 col-lg-6 mt-3">
                    <?php
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      $female = "Femenino";
                      $male = "Masculino";

                      $estado1 = "SELECT id FROM personal WHERE PersonalGenero = '$female'";

                      if($resultEst = mysqli_query($conn, $estado1)) {
                        $mujer = mysqli_num_rows($resultEst);
                      }

                      $estado2 = "SELECT id FROM personal WHERE PersonalGenero = '$male'";
                      
                      if($resultEst1 = mysqli_query($conn, $estado2)) {
                        $hombre = mysqli_num_rows($resultEst1);
                      }
                    ?>
                    <div class="card h-100">
                      <div class="btn-group" role="group" aria-label="First group">
                        <button type="button" style="color: #e83e8c; border-color: #e83e8c; background: transparent;" disabled class="btn">
                          <i style="font-size: 40px;" class="tf-icons bx bx-female"></i>
                          <h4>Personal Femenino</h4>
                          <p style="font-size: xx-large;"><?php echo $mujer; ?></p>
                        </button>
                        <button type="button" style="color: #007bff; border-color: #007bff; background: transparent;" disabled class="btn">
                          <i style="font-size: 40px;" class="tf-icons bx bx-male"></i>
                          <h4>Personal Masculino</h4>
                          <p style="font-size: xx-large;"><?php echo $hombre; ?></p>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

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
  </body>
</html>

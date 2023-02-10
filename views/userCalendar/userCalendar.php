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

    <title>Calendario | <?php echo NOMBRE;?></title>

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
      <li class="menu-item active">
        <a href="javascript:void(0);" class="menu-link">
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Información / Asistencias /</span> Registros</h4>
              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link" href="userAsistencias"> Asistencias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"> Registros</a>
                      </li>
                  </ul>
                </div>
              </div>

                <?php
                      $con = new mysqli($servername, $username, $password, $dbname);

                      $estado1 = "SELECT id FROM horarios WHERE Lunes = '1'";
                      if($resultEst = mysqli_query($con, $estado1)) {
                        $lunNum = mysqli_num_rows($resultEst);
                      }

                      $estado2 = "SELECT id FROM horarios WHERE Martes = '1'";
                      if($resultEst1 = mysqli_query($con, $estado2)) {
                        $marNum = mysqli_num_rows($resultEst1);
                      }

                      $estado3 = "SELECT id FROM horarios WHERE Miercoles = '1'";
                      if($resultEst2 = mysqli_query($con, $estado3)) {
                        $mieNum = mysqli_num_rows($resultEst2);
                      }

                      $estado4 = "SELECT id FROM horarios WHERE Jueves = '1'";
                      if($resultEst3 = mysqli_query($con, $estado4)) {
                        $jueNum = mysqli_num_rows($resultEst3);
                      }

                      $estado5 = "SELECT id FROM horarios WHERE Viernes = '1'";
                      if($resultEst4 = mysqli_query($con, $estado5)) {
                        $vieNum = mysqli_num_rows($resultEst4);
                      }
                    ?>

                <div class="nav-align-top mb-4">
                  <h5 class="card-header">Horario Semanal</h5>
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                      <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#lunes" aria-controls="lunes" aria-selected="true">
                          Lunes
                          <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $lunNum; ?></span>
                        </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#martes" aria-controls="martes" aria-selected="false">
                          Martes
                          <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $marNum; ?></span>
                        </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#miercoles" aria-controls="miercoles" aria-selected="false">
                          Miercoles
                          <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $mieNum; ?></span>
                        </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#jueves" aria-controls="jueves" aria-selected="false">
                          Jueves
                          <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $jueNum; ?></span>
                        </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#viernes" aria-controls="viernes" aria-selected="false">
                          Viernes
                          <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"><?php echo $vieNum; ?></span>
                        </button>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="lunes" role="tabpanel">
                        <?php
                          $lun = "SELECT * FROM horarios WHERE Lunes = 1";
                          $resultLun = $conn->query($lun);
                          
                          while ($col = $resultLun->fetch()) {
                            $codigo = $col['PersonalCodigo'];
                            $getN = "SELECT * FROM personal WHERE PersonalCodigo = '$codigo'";
                            $resultN = $conn->query($getN);
                        
                            while ($row = $resultN->fetch()) {
                                $persona = $row['PersonalNombre'] . ' ' . $row['PersonalApellido'];
                            }; 

                            echo '<span style="margin: 2%;" class="badge bg-label-primary">
                                  <div class="list-group list-group-flush">
                                    <li style="color: #696cff;" class="list-group-item">' . $persona . '</li>
                                    <li style="color: #696cff;" class="list-group-item d-flex align-items-center">
                                          <i class="bx bx-time me-2"></i>
                                          Entrada: '. date("h:i A", strtotime($col['Entrada'])) . ' <br>
                                          Salida: ' . date("h:i A", strtotime($col['Salida'])) . '
                                        </li>
                                  </div>
                                </span>';

                          }; 
                        ?>
                      </div>
                      <div class="tab-pane fade" id="martes" role="tabpanel">
                        <?php
                          $mar = "SELECT * FROM horarios WHERE Martes = '1'";
                          $resultMar = $conn->query($mar);
                          
                          while ($colMar = $resultMar->fetch()) {
                            $codigoMar = $colMar['PersonalCodigo'];
                            $getMar = "SELECT * FROM personal WHERE PersonalCodigo = '$codigoMar'";
                            $resultMa = $conn->query($getMar);
                        
                            while ($rowMar = $resultMa->fetch()) {
                                $personaMar = $rowMar['PersonalNombre'] . ' ' . $rowMar['PersonalApellido'];
                            }; 

                            echo '<span style="margin: 2%;" class="badge bg-label-primary">
                                  <div class="list-group list-group-flush">
                                    <li style="color: #696cff;" class="list-group-item">' . $personaMar . '</li>
                                    <li style="color: #696cff;" class="list-group-item d-flex align-items-center">
                                          <i class="bx bx-time me-2"></i>
                                          Entrada: '. date("h:i A", strtotime($colMar['Entrada'])) . ' <br>
                                          Salida: ' . date("h:i A", strtotime($colMar['Salida'])) . '
                                        </li>
                                  </div>
                                </span>';

                          }; 
                        ?>
                      </div>
                      <div class="tab-pane fade" id="miercoles" role="tabpanel">
                        <ol class="list-group list-group-numbered">
                        
                          <?php
                            $mie = "SELECT * FROM horarios WHERE Miercoles = '1'";
                            $resultMie = $conn->query($mie);
                            
                            while ($colMie = $resultMie->fetch()) {
                              $codigoMie = $colMie['PersonalCodigo'];
                              $getMi = "SELECT * FROM personal WHERE PersonalCodigo = '$codigoMie'";
                              $resultMi = $conn->query($getMi);
                          
                              while ($rowMi = $resultMi->fetch()) {
                                  $personaMie = $rowMi['PersonalNombre'] . ' ' . $rowMi['PersonalApellido'];
                              }; 

                              echo '<span style="margin: 2%;" class="badge bg-label-primary">
                                  <div class="list-group list-group-flush">
                                    <li style="color: #696cff;" class="list-group-item">' . $personaMie . '</li>
                                    <li style="color: #696cff;" class="list-group-item d-flex align-items-center">
                                          <i class="bx bx-time me-2"></i>
                                          Entrada: '. date("h:i A", strtotime($colMie['Entrada'])) . ' <br>
                                          Salida: ' . date("h:i A", strtotime($colMie['Salida'])) . '
                                        </li>
                                  </div>
                                </span>';

                            }; 
                          ?>
                        </ol>
                      </div>
                      <div class="tab-pane fade" id="jueves" role="tabpanel">
                        <?php
                          $jue = "SELECT * FROM horarios WHERE Jueves = '1'";
                          $resultJue = $conn->query($jue);
                          
                          while ($colJue = $resultJue->fetch()) {
                            $codigoJue = $colJue['PersonalCodigo'];
                            $getJu = "SELECT * FROM personal WHERE PersonalCodigo = '$codigoJue'";
                            $resultJu = $conn->query($getJu);
                        
                            while ($rowJ = $resultJu->fetch()) {
                                $personaJu = $rowJ['PersonalNombre'] . ' ' . $rowJ['PersonalApellido'];
                            }; 

                            echo '<span style="margin: 2%;" class="badge bg-label-primary">
                                  <div class="list-group list-group-flush">
                                    <li style="color: #696cff;" class="list-group-item">' . $personaJu . '</li>
                                    <li style="color: #696cff;" class="list-group-item d-flex align-items-center">
                                          <i class="bx bx-time me-2"></i>
                                          Entrada: '. date("h:i A", strtotime($colJue['Entrada'])) . ' <br>
                                          Salida: ' . date("h:i A", strtotime($colJue['Salida'])) . '
                                        </li>
                                  </div>
                                </span>';

                          }; 
                        ?>
                      </div>
                      <div class="tab-pane fade" id="viernes" role="tabpanel">
                        <?php
                          $vie = "SELECT * FROM horarios WHERE Viernes = '1'";
                          $resultVie = $conn->query($vie);

                        while ($colVie = $resultVie->fetch()) {
                          $codigoViw = $colVie['PersonalCodigo'];
                          $getVi = "SELECT * FROM personal WHERE PersonalCodigo = '$codigoViw'";
                          $resultVi = $conn->query($getVi);

                          while ($rowVi = $resultVi->fetch()) {
                            $personaVi = $rowVi['PersonalNombre'] . ' ' . $rowVi['PersonalApellido'];
                          }
                          ;

                          echo '<span style="margin: 2%;" class="badge bg-label-primary">
                                  <div class="list-group list-group-flush">
                                    <li style="color: #696cff;" class="list-group-item">' . $personaVi . '</li>
                                    <li style="color: #696cff;" class="list-group-item d-flex align-items-center">
                                          <i class="bx bx-time me-2"></i>
                                          Entrada: ' . date("h:i A", strtotime($colVie['Entrada'])) . ' <br>
                                          Salida: ' . date("h:i A", strtotime($colVie['Salida'])) . '
                                        </li>
                                  </div>
                                </span>';
                        }
                        ?>
                      </div>
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

    </div>
    <!-- / Layout wrapper -->

    <?php include "./modulos/scripts.php"; ?>
  </body>
</html>
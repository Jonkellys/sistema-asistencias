<?php
  date_default_timezone_set("America/Caracas");
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
    <?php include "./modulos/cal.php"; ?>


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
            <li class="menu-item active">
              <a href="javascript:void(0);" class="menu-link">
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
          <div class="content-wrapper" id="place">
            <!-- Content -->
            <div class="">
              <div class="container-fluid flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Información / Calendario /</span> Calendario</h4>
                
                <div class="demo-inline-spacing">
                <button type="button" style="margin: 0% 1% 1% 1%;" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#horario" aria-expanded="false" aria-controls="collapseAdminAdd">
                  <span class="tf-icons bx bx-calendar-plus"></span>   Añadir Horario
                </button>
                
                <a class="btn btn-md btn-info" target="_blank" href="conexiones/reporteHorario.php"><i class='bx bxs-file-pdf'></i> Generar Reporte PDF</a>
                </div>
                
                <div class="card mb-4" style="margin-bottom: 3%;">
                  <div class="collapse" id="horario">
                    <div class="card ">
                      <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Añadir un horario al personal</h4>
                      </div>
                      <div class="card-body form-resto">
                        <form action="<?php echo SERVERURL; ?>conexiones/horarioReg.php" autocomplete="off" enctype="multipart/form-data" method="POST" data-form="save" class="FormularioAjax">
                    <input type="hidden" name="type" value="<?php echo $_SESSION['tipo']; ?>">
                        
                        <div class="mt-2">
                          <label for="personlSelect" class="form-label">Personal:</label>
                          <select class="form-select" name="personal" id="personlSelect" aria-label="Default select example">
                            <option selected="" disabled>Seleciona al Personal</option>
                            <?php
                            $servername = "localhost";
                            $dbname = "sistema-asistencias";
                            $username = "root";
                            $password = "";
                            $dia = date("d");

                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $sql = "SELECT * FROM personal WHERE PersonalCodigo NOT IN (SELECT PersonalCodigo FROM horarios) AND PersonalEstado = 'Activo'";
                            $result = $conn->query($sql);
                            
                            while ($rows = $result->fetch()) {
                              echo'<option value="' . $rows['PersonalCodigo'] . '">' . $rows['PersonalNombre'] . '  ' . $rows['PersonalApellido'] . '</option>';
                            };  
                          ?>
                          </select>
                        </div>
                        <div class="col-md row mt-4">
                          <label for="personlSelect" class="form-label">Días de la semana:</label>
                                                
                          <div class="input-group mt-1">
                        	<div class="input-group-text" style="height: 39px;">
                          		<input class="form-check-input" name="lunes" type="checkbox" value="lunes">
                        	</div>
                        	<p class="form-control">Lunes</p>
                      	</div>
                      	<div class="input-group">
                        	<div class="input-group-text" style="height: 39px;">
                          		<input class="form-check-input mt-0" name="martes" type="checkbox" value="martes">
                        	</div>
                        	<p class="form-control">Martes</p>
                      	</div>
                      	<div class="input-group">
                        	<div class="input-group-text" style="height: 39px;">
                          		<input class="form-check-input mt-0" name="miercoles" type="checkbox" value="miercoles">
                        	</div>
                        	<p class="form-control">Miércoles</p>
                      	</div>
                      	<div class="input-group">
                        	<div class="input-group-text" style="height: 39px;">
                          		<input class="form-check-input mt-0" name="jueves" type="checkbox" value="jueves">
                        	</div>
                        	<p class="form-control">Jueves</p>
                      	</div>
                      	<div class="input-group">
                        	<div class="input-group-text" style="height: 39px;">
                          		<input class="form-check-input mt-0" name="viernes" type="checkbox" value="viernes">
                        	</div>
                        	<p class="form-control">Viernes</p>
                      	</div>

                        <div class="mb-3 row">
                          <label for="entrada" class="col-md-2 col-form-label">Hora de Entrada:</label>
                          <div class="col-md-10">
                            <input class="form-control" type="time" name="entrada" id="entrada">
                          </div>
                        </div>

                        <div class="mb-3 row">
                          <label for="salida" class="col-md-2 col-form-label">Hora de Salida:</label>
                          <div class="col-md-10">
                            <input class="form-control" type="time" name="salida" id="salida">
                          </div>
                        </div>
                      
                        
                          <br>
                          <div class="d-grid gap-2 mt-3 col-lg-6 mx-auto">
                            <button class="btn btn-primary" id="btn" type="submit">Añadir Horario</button>
                          </div>
                          
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                </div>

                <div id="respuesta" style="margin-top: 3%;" class="RespuestaAjax">
                            <?php
                              if(isset($_GET['ent'])) {
                                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                  La hora de entrada mínima es a las 08:00 AM.
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                              echo '<script> window.location.href = "http://localhost/sistema-asistencias/calendar"; </script>';

                            };
                              if(isset($_GET['sal'])) {
                                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                  La hora de salida máxima es a las 05:00 PM.
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                              echo '<script> window.location.href = "http://localhost/sistema-asistencias/calendar"; </script>';

                            }
                            ; 
                              if(isset($_GET['suc'])) {
                                echo '<div class="alert alert-success alert-dismissible" role="alert">
                                  Horario registrado correctamente.
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                              echo '<script> window.location.href = "http://localhost/sistema-asistencias/calendar"; </script>';

                            }
                            ;
                            ?>
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
                      
                   
                <div class="nav-align-top mt-2">
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
                            }; 

                            echo '<span style="margin: 2%;" class="badge bg-label-primary">
                                  <div class="list-group list-group-flush">
                                    <li style="color: #696cff;" class="list-group-item">' . $personaVi . '</li>
                                    <li style="color: #696cff;" class="list-group-item d-flex align-items-center">
                                          <i class="bx bx-time me-2"></i>
                                          Entrada: '. date("h:i A", strtotime($colVie['Entrada'])) . ' <br>
                                          Salida: ' . date("h:i A", strtotime($colVie['Salida'])) . '
                                        </li>
                                  </div>
                                </span>';

                          }; 
                        ?>
                      </div>
                    </div>
                  </div>

              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



      <?php include "./modulos/scripts.php"; ?>


  </body>
</html>

<?php
    require_once "./funciones.php";

    $servername = "localhost";
    $dbname = "sistema-asistencias";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $codigo = $_GET['codigo'];
    
    $con = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM admins";
     if($result = mysqli_query($con, $sql)) {
         $rowcount = mysqli_num_rows($result);
         }

    if($rowcount != 1) {
      $sql1 = "DELETE FROM admins WHERE CuentaCodigo = '$codigo'";

      $stmt = "DELETE FROM cuentas WHERE CuentaCodigo = '$codigo'";

      if ($conn->query($sql1) && $conn->query(($stmt))) {
          echo '<script> window.location.href = "http://localhost/sistema-asistencias/administradores"; </script>';
        
      } else {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
          Huno un error, intente de nuevo.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
      }
    } else {
      echo '<script> window.location.href = "http://localhost/sistema-asistencias/administradores?msg=' . "1" . '"; </script>';
    }
    
    

?>


<?php
    require_once "./funciones.php";

    $servername = "localhost";
    $dbname = "sistema-asistencias";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $codigo = $_GET['codigo'];

    if (isset($codigo)) {

      $sql = "DELETE FROM Usuarios WHERE CuentaCodigo = '$codigo'";

      $stmt = "DELETE FROM cuentas WHERE CuentaCodigo = '$codigo'";

      if ($conn->query($sql) && $conn->query($stmt)) {
        echo '<script> window.location.href = "http://localhost/sistema-asistencias/users"; </script>';
      } else {
        echo "<span class='badge badge-center rounded-pill bg-danger' data-bs-toggle='tooltip' data-bs-offset='0,4' data-bs-placement='right' data-bs-html='true' title='' data-bs-original-title='<span>No se pudo eliminar el usuario</span>'><span class='tf-icons bx bx-x'></span></span>";
      }
    }

?>


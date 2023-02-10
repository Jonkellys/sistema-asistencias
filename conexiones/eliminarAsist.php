<?php

    $servername = "localhost";
    $dbname = "sistema-asistencias";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $codigo = $_GET['codigo'];

    $sql = "DELETE FROM asistencias WHERE AsistenciaCodigo = '$codigo'";

    if($conn->query($sql)) {
      echo '<script> window.location.href = "http://localhost/sistema-asistencias/asistencias"; </script>';
    } else {
      echo "<span class='badge badge-center rounded-pill bg-danger' data-bs-toggle='tooltip' data-bs-offset='0,4' data-bs-placement='right' data-bs-html='true' title='' data-bs-original-title='<span>No se pudo eliminar el usuario</span>'><span class='tf-icons bx bx-x'></span></span>";
    }

?>


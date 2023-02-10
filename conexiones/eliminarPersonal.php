<?php
    require_once "./funciones.php";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $codigo = $_GET['codigo'];

    $sql = "DELETE FROM personal WHERE PersonalCodigo = '$codigo'";

    $stmt = "DELETE FROM horarios WHERE PersonalCodigo = '$codigo'";
    
    if ($conn->query($sql) && $conn->query($stmt)) {
        echo '<script> window.location.href = "http://localhost/sistema-asistencias/personal"; </script>';
    } else {

    }


?>
<?php
    require_once "./funciones.php";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare("UPDATE horarios SET Lunes = :lunes, Martes = :martes, Miercoles = :miercoles, Jueves = :jueves, Viernes = :viernes, Entrada = :entrada, Salida = :salida WHERE PersonalCodigo = :codigo");
    $sql->bindParam(":codigo", $codigo);
    $sql->bindParam(":entrada", $entradaF);
    $sql->bindParam(":salida", $salidaF);


    $libre = "0";
    $trabajo = "1";
    $codigo = strClean($_POST['codigo']);
    $entrada = strClean($_POST['entrada']);
    $salida = strClean($_POST['salida']);
    $lunes = ($_POST['lunes']);
    $martes = ($_POST['martes']);
    $miercoles = ($_POST['miercoles']);
    $jueves = ($_POST['jueves']);
    $viernes = ($_POST['viernes']);

    $entradaF = date("H:i", strtotime($entrada));
    $salidaF = date("H:i", strtotime($salida));

    $ent = date("H:i", strtotime("08:00"));
    $sal = date("H:i", strtotime("17:00"));

    if($salidaF > $sal) {
        echo '<script> window.location.href = "http://localhost/sistema-asistencias/calendar?sal=1"; </script>';
    exit();
    }
    if($entradaF < $ent) {
        echo '<script> window.location.href = "http://localhost/sistema-asistencias/calendar?ent=1"; </script>';
    exit();
    }

    if($lunes == "") {
        $sql->bindParam(":lunes", $libre);
    } else {
        $sql->bindParam(":lunes", $trabajo);
    }

    if($martes == "") {
        $sql->bindParam(":martes", $libre);
    }  else {
        $sql->bindParam(":martes", $trabajo);
    }

    if($miercoles == "") {
        $sql->bindParam(":miercoles", $libre);
    }  else {
        $sql->bindParam(":miercoles", $trabajo);
    }

    if($jueves == "") {
        $sql->bindParam(":jueves", $libre);
    }  else {
        $sql->bindParam(":jueves", $trabajo);
    }

    if($viernes == "") {
        $sql->bindParam(":viernes", $libre);
    } else {
        $sql->bindParam(":viernes", $trabajo);
    }


    if($sql->execute()){
        echo '<script> window.location.href = "http://localhost/sistema-asistencias/calendar?suc=1"; </script>';

    } else{
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                Hubo un error intente de nuevo.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

?>

<?php
    require_once "./funciones.php";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare("UPDATE personal SET PersonalNombre = :nombre, PersonalApellido = :apellido, PersonalCedula = :cedula, PersonalCargo = :cargo, PersonalFechaNac = DATE_FORMAT(:fecha, '%Y-%m-%d'), PersonalLugarNac = :lugar, PersonalGenero = :genero, PersonalDireccion = :direccion, PersonalTelefono = :telefono, PersonalCorreo = :correo, PersonalEstado = :estado WHERE PersonalCodigo = :codigo");
    $sql->bindParam(":nombre", $nombre);
    $sql->bindParam(":apellido", $apellido);
    $sql->bindParam(":cedula", $cedula);
    $sql->bindParam(":cargo", $cargo);
    $sql->bindParam(":fecha", $fechaNac);
    $sql->bindParam(":lugar", $lugarNac);
    $sql->bindParam(":genero", $genero);
    $sql->bindParam(":direccion", $direccion);
    $sql->bindParam(":telefono", $telefono);
    $sql->bindParam(":correo", $correo);
    $sql->bindParam(":estado", $estado);
    $sql->bindParam(":codigo", $codigo);

    $nombre = strClean($_POST['nombre']);
    $apellido = strClean($_POST['apellido']);
    $cedula = strClean($_POST['cedula']);
    $cargo = strClean($_POST["cargo"]);
    $genero = strClean($_POST['genero']);
    $telefono = strClean($_POST['telefono']);
    $correo = strClean($_POST['correo']);
    $direccion = strClean($_POST['direccion']);
    $lugarNac = strClean($_POST["lugarNac"]);
    $fechaNac = strClean($_POST["fechaNac"]);
    $estado = strClean($_POST["estado"]);
    $codigo = strClean($_POST["codigo"]);

    $noT = strClean($_POST["noTel"]);

    $tipo = strClean($_POST['tipo']);
    
    if($telefono == "") {
        $telefono = $noT;
    }

    if($tipo == "Administrador") {
        $url = "http://localhost/sistema-asistencias/personal";
    } else {
        $url = "http://localhost/sistema-asistencias/userPersonal";
    }

    if($sql->execute()){
        echo '<div class="alert alert-success alert-dismissible" role="alert">
                Datos actualizados correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        echo '<script> window.location.href = "' . $url . '"; </script>';
    } else{
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                Hubo un error intente de nuevo.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

?>

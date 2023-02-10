<?php
    require_once "./funciones.php";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nombre = strClean($_POST['nombre']);
    $apellido = strClean($_POST['apellido']);
    $genero = strClean($_POST['genero']);
    $codigo = strClean($_POST["codigo"]);

    $usuario = strClean($_POST['usuario']);
    $correo = strClean($_POST['correo']);

    $sql = $conn->prepare("UPDATE admins SET AdminUsuario = '$usuario', AdminEmail = '$correo'  WHERE CuentaCodigo = '$codigo'");

    $updateAdmin = updateCuenta($nombre, $apellido, $usuario, $correo, $genero, $codigo);

    $url = "http://localhost/sistema-asistencias/administradores";

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

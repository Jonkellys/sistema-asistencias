<?php
    require_once "./funciones.php";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $usuario = strClean($_POST['usuario']);
    $correo = strClean($_POST['correo']);

    $nombre = strClean($_POST['nombre']);
    $apellido = strClean($_POST['apellido']);
    $usuario = strClean($_POST['usuario']);
    $email = strClean($_POST['correo']);
    $genero = strClean($_POST['genero']);
    $codigo = strClean($_POST["codigo"]);

    $sql = $conn->prepare("UPDATE Usuarios SET UserName = '$usuario', UserEmail = '$correo' WHERE CuentaCodigo = '$codigo'");

    $updateUser = updateCuenta($nombre, $apellido, $usuario, $correo, $genero, $codigo);

    if($sql->execute()){
        echo '<div class="alert alert-success alert-dismissible" role="alert">
                Datos actualizados correctamente.
            </div>';
        echo '<script> window.location.href = "http://localhost/sistema-asistencias/users"; </script>';
    } else{
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
                Hubo un error intente de nuevo.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

?>

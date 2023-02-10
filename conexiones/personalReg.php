<?php

    require_once "./funciones.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $set = $conn->prepare("SET @@SQL_MODE = REPLACE(@@SQL_MODE, 'NO_ZERO_DATE', '');");
    $set->execute();

            $stmt = $conn->prepare("INSERT INTO personal(PersonalNombre, PersonalApellido, PersonalCedula, PersonalCargo, PersonalFechaNac, PersonalLugarNac, PersonalGenero, PersonalDireccion, PersonalTelefono, PersonalCorreo, PersonalCodigo, PersonalEstado, PersonalUltimaEntrada) 
            VALUES(:nombre, :apellido, :cedula, :cargo, DATE_FORMAT(:fechaNac, '%Y-%m-%d'), :lugarNac, :genero, :direccion, :telefono, :correo, :codigo, :estado, :ultima)");

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':cargo', $cargo);
            $stmt->bindParam(':fechaNac', $fechaNac);
            $stmt->bindParam(':lugarNac', $lugarNac);
            $stmt->bindParam(':genero', $genero);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':codigo', $codigo);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':ultima', $ultima);
            
            $nombre = strClean($_POST["name"]);
            $apellido = strClean($_POST["apellido"]);
            $cedula = strClean($_POST["cedula"]);
            $cargo = strClean($_POST["cargo"]);
            $fechaNac = strClean($_POST["fechaNac"]);
            $lugarNac = strClean($_POST["lugarNac"]);
            $genero = strClean($_POST["genero"]);
            $direccion = strClean($_POST["direccion"]);
            $telefono = strClean($_POST["telefono"]);
            $correo = strClean($_POST["correo"]);
            $ultima = $salida = date("0000-00-00 00:00:00");

            $tipo = strClean($_POST['tipo']);

            $noT = strClean($_POST["noTel"]);
            $estado = "Activo";

            if($telefono == "") {
                $telefono = $noT;
            }

            if($nombre == "" || $apellido == "" || $cedula == "" || $cargo == "" || $lugarNac == "" || $direccion == "" || $correo == "") {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        Debes llenar todos los campos.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                exit(); 
            }

            $consulta = ejecutar_consulta_simple("SELECT PersonalCedula FROM personal WHERE PersonalCedula = '$cedula'");
            if($consulta->rowCount()>=1) {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        La cédula ingresada ya está registrada en el sistema.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                exit();
            }

            $consulta1 = ejecutar_consulta_simple("SELECT PersonalCorreo FROM personal WHERE PersonalCorreo = '$correo'");
            if($consulta1->rowCount()>=1) {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        El correo ingresado ya está registrado en el sistema.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                exit();
            }

            $consulta2= ejecutar_consulta_simple("SELECT id FROM personal");
            $numero = ($consulta2->rowCount())+1;

            $codigo = generar_codigo_aleatorio("P", 7, $numero);

            if($tipo == "Administrador") {
                $url = "http://localhost/sistema-asistencias/personal";
            } else {
                $url = "http://localhost/sistema-asistencias/userPersonal";
            }

            if($stmt->execute()){
                echo '<div class="alert alert-success alert-dismissible" role="alert">
                        Personal registrado correctamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                echo '<script> window.location.href = "' . $url . '"; </script>';
            } else{
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        Hubo un error intente de nuevo.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        } 
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

?>

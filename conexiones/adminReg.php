<?php

    require_once "./funciones.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("INSERT INTO admins(AdminUsuario, AdminEmail, AdminClave, CuentaCodigo) 
            VALUES(:usuario, :email, :clave, :codigo)");

            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':clave', $password);
            $stmt->bindParam(':codigo', $codigo);
            
            $usuario = strClean($_POST["usuario"]);
            $email = strClean($_POST["email"]);
            $clave = strClean($_POST["clave"]);
            $confirmar = strClean($_POST["confirmar"]);
            $password = password_hash($clave, PASSWORD_DEFAULT);

            $nombre = strClean($_POST["nombre"]);
            $apellido = strClean($_POST["apellido"]);
            $tipo = strClean($_POST["tipo"]);
            $genero = strClean($_POST["genero"]);
            $respuesta = strClean($_POST["respuesta"]);

            if($usuario == "" || $email == "" || $clave == "" || $confirmar == "" || $nombre == "" || $apellido == "" || $respuesta == "") {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        Debes llenar todos los campos.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                exit(); 
            }

            if(strlen($clave) < 8){
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        La contraseña debe tener mínimo 8 carácteres.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                exit();
            }
            
            if($clave != $confirmar){
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        Las contraseñas no coinciden.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                exit();
            }  

            $consulta2 = ejecutar_consulta_simple("SELECT AdminUsuario FROM admins WHERE AdminUsuario = '$usuario'");
                if($consulta2->rowCount()>=1) {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                            El usuario ingresado ya está registrado en el sistema.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    exit();
                }
            
            $consulta3 = ejecutar_consulta_simple("SELECT AdminEmail FROM admins WHERE AdminEmail = '$email'");
            if($consulta3->rowCount()>=1) {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                        El correo ingresado ya está registrado en el sistema.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                exit();
            }

            $consulta4= ejecutar_consulta_simple("SELECT id FROM cuentas");
            $numero = ($consulta4->rowCount())+1;

            $codigo = generar_codigo_aleatorio("AO", 7, $numero);

            $tipo = "Administrador";

            $guardarCuenta = crearCuenta($codigo, $nombre, $apellido, $usuario, $password, $email, $tipo, $genero, $respuesta);

            if($stmt->execute()){
                echo '<div class="alert alert-success alert-dismissible" role="alert">
                        Administrador registrado correctamente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                echo '<script> window.location.href = "http://localhost/sistema-asistencias/administradores"; </script>';
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
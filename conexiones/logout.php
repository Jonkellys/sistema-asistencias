<?php

    session_start();
    
    unset($_SESSION['id']);
    unset($_SESSION['nombre']);
    unset($_SESSION['apellido']);
    unset($_SESSION['usuario']);
    unset($_SESSION['email']);
    unset($_SESSION['clave']);
    unset($_SESSION['tipo']);
    unset($_SESSION['genero']);
    unset($_SESSION['codigo']);
    
    session_destroy();

    echo '<script> window.location.href = "http://localhost/sistema-asistencias/login"; </script>';
    

?>
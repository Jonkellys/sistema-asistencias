<?php
    require_once "./funciones.php";

    date_default_timezone_set("America/Caracas");
        
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conect = new mysqli($servername, $username, $password, $dbname);

    $sel = "SELECT id FROM personal";
    $resultEst = mysqli_query($conect, $sel);
    $cantidad = mysqli_num_rows($resultEst);    

    require "../plantilla/assets/fpdf/fpdf.php";

        $pdf = new FPDF("L", "pt", array(1600, 700));
        $pdf->AddPage("landscape");
        $pdf->SetTitle(utf8_decode("Reporte del Personal ") . date("d-m-Y"), false);

        $pdf->Image("../plantilla/assets/img/logo1.png", 30, 30, 60);
            $pdf->Cell(60);
            $pdf->SetFont('Arial', '', 18);
            $pdf->Write(80, utf8_decode('Sistema de Gestión de Asistencias v0.1'));
            $pdf->SetFont('Arial', '', 14);
            $pdf->Cell(1000);
            $pdf->Write(70, "Fecha: " . date("d-m-Y"));
            $pdf->Ln(75);
            $pdf->Cell(700);
            $pdf->SetFont('Arial', 'B', 18);
            $pdf->Write("34", utf8_decode('Reporte del Personal'));
            $pdf->Ln(85);

            if ($cantidad == 0) {
                $pdf->Write(10, "No hay personal registrado");
            } else {

                $pdf->SetFont('Arial', 'B', 14);
                $pdf->Cell(27, 28, 'N', 1);
                $pdf->Cell(100, 28, 'Nombre', 1);
                $pdf->Cell(100, 28, 'Apellido', 1);
                $pdf->Cell(100, 28, utf8_decode('Cédula'), 1);
                $pdf->Cell(100, 28, utf8_decode('Cargo'), 1);
                $pdf->Cell(100, 28, utf8_decode('Género'), 1);
                $pdf->Cell(250, 28, utf8_decode('Dirección'), 1);
                $pdf->Cell(150, 28, utf8_decode('Teléfono'), 1);
                $pdf->Cell(250, 28, utf8_decode('Correo'), 1);
                $pdf->Cell(200, 28, utf8_decode('Lugar de Nacimiento'), 1);
                $pdf->Cell(150, 28, utf8_decode('Fecha de Nacimiento'), 1, 1);
            
                $pdf->SetFont("Arial", "", 14);
    
                $buscar = "SELECT * FROM personal";
                $resultado = $conn->query($buscar);
                $num = 1;
    
            while ($rows = $resultado->fetch()) {
                $pdf->Cell(27, 28, $num++, 1,);
                $pdf->Cell(100, 28, utf8_decode($rows['PersonalNombre']), 1);
                $pdf->Cell(100, 28, utf8_decode($rows['PersonalApellido']), 1);
                $pdf->Cell(100, 28, utf8_decode($rows['PersonalCedula']), 1);
                $pdf->Cell(100, 28, utf8_decode($rows['PersonalCargo']), 1);
                $pdf->Cell(100, 28, utf8_decode($rows['PersonalGenero']), 1);
                $pdf->Cell(250, 28, utf8_decode($rows['PersonalDireccion']), 1);
                $pdf->Cell(150, 28, utf8_decode($rows['PersonalTelefono']), 1);
                $pdf->Cell(250, 28, utf8_decode($rows['PersonalCorreo']), 1);
                $pdf->Cell(200, 28, utf8_decode($rows['PersonalLugarNac']), 1);
                $pdf->Cell(150, 28, utf8_decode($rows['PersonalFechaNac']), 1, 1);
            }; 
        }
            
        
        $pdf->Output();
    

?>
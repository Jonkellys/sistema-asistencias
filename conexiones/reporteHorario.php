
<?php
    require_once "./funciones.php";

    date_default_timezone_set("America/Caracas");
        
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    require "../plantilla/assets/fpdf/fpdf.php";

    $pdf = new FPDF("P", "mm", "letter");
    $pdf->AddPage("Landscape");
    $pdf->SetTitle(utf8_decode("Reporte de Horarios"), false);

    $pdf->Image("../plantilla/assets/img/logo1.png", 10, 5, 20);
    $pdf->Cell(20);
    $pdf->SetFont('Arial', '', 14);
    $pdf->Write(10, utf8_decode('Sistema de Gestión de Asistencias v0.1'));
    $pdf->SetFont('Arial', '', 10);

    $pdf->Cell(110);
    $pdf->Write(10, "Fecha: " . date("d-m-Y", $fechaInicio));

    $pdf->Ln(15);
    $pdf->Cell(100);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Write("10", utf8_decode('Reporte de Asistencias'));
    $pdf->Ln(15);
     
	
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(128);  
    $pdf->Cell(50, 6, utf8_decode('Días de la semana'), 1, 1);
    $pdf->Cell(18);
    $pdf->Cell(70, 9, 'Nombre y Apellido', 1);
    $pdf->Cell(40, 9, utf8_decode('Cédula'), 1);
    $pdf->Cell(10, 9, 'L', 1);
    $pdf->Cell(10, 9, 'M', 1);
    $pdf->Cell(10, 9, 'M', 1);
    $pdf->Cell(10, 9, 'J', 1);
    $pdf->Cell(10, 9, 'V', 1);
    $pdf->Cell(30, 9, 'Entrada', 1);
    $pdf->Cell(30, 9, 'Salida', 1, 1);
    
    $pdf->SetFont("Arial", "", 9);
    
$buscar = "SELECT * FROM horarios";
    $resulta = $conn->query($buscar);
    $num = 1;
    
    while ($rows = $resulta->fetch()) {
    	$codigo = $rows['PersonalCodigo'];
    	
    		if($rows['Lunes'] == 1) {
        		$lu = "X";
        	} else {
        		$lu = " ";
        	}
        	
        	if($rows['Martes'] == 1) {
        		$ma = "X";
        	} else {
        		$ma = " ";
        	}
        	
        	if($rows['Miercoles'] == 1) {
        		$mi = "X";
        	} else {
        		$mi = " ";
        	}
        	
        	if($rows['Jueves'] == 1) {
        		$ju = "X";
        	} else {
        		$ju = " ";
        	}
        	
        	if($rows['Viernes'] == 1) {
        		$vi = "X";
        	} else {
        		$vi = " ";
        	}
    
    	$sql = $conn->prepare("SELECT * FROM personal WHERE PersonalCodigo = '$codigo'");
        $sql->execute();
        $data = $sql->fetch(PDO::FETCH_OBJ);
        
        $pdf->Cell(18);
        $pdf->Cell(70, 9, utf8_decode($data->PersonalNombre . " " . $data->PersonalApellido), 1);
        $pdf->Cell(40, 9, utf8_decode($data->PersonalCedula), 1);
        $pdf->Cell(10, 9, $lu, 1);
        $pdf->Cell(10, 9, $ma, 1);
        $pdf->Cell(10, 9, $mi, 1);
        $pdf->Cell(10, 9, $ju, 1);
        $pdf->Cell(10, 9, $vi, 1);
        $pdf->Cell(30, 9, date("h:i A", strtotime($rows['Entrada'])), 1);
        $pdf->Cell(30, 9, date("h:i A", strtotime($rows['Salida'])), 1, 1);
    }
        
    $pdf->Output();
    

?>

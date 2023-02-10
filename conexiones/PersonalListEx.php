<?php

    require '../vendor/autoload.php';
    require_once "./funciones.php";

    use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conect = new mysqli($servername, $username, $password, $dbname);

    $sel = "SELECT id FROM personal";
    $resultEst = mysqli_query($conect, $sel);
    $cantidad = mysqli_num_rows($resultEst);   
	
    date_default_timezone_set("America/Caracas");


    $excel = new Spreadsheet();
$sheet = $excel->getActiveSheet();
    $sheet->setTitle("Reporte del Personal");

    if ($cantidad == 0) {
        $sheet->mergeCells('A1:H1');
    $sheet->setCellValue("A1", "No hay registros del personal");
} else {
    $sheet->mergeCells('B1:C1');
    $sheet->mergeCells('D1:E1');
    $sheet->mergeCells('F1:G1');
    $sheet->mergeCells('H1:I1');
    $sheet->mergeCells('J1:K1');
    $sheet->mergeCells('L1:P1');
    $sheet->mergeCells('Q1:R1');
    $sheet->mergeCells('S1:V1');
    $sheet->mergeCells('W1:Y1');
    $sheet->mergeCells('Z1:AB1');

    $sheet->setCellValue("A1", mb_convert_encoding('N°', "UTF-8"));
    $sheet->setCellValue("B1", "Nombre");
    $sheet->setCellValue("D1", "Apellido");
    $sheet->setCellValue("F1", mb_convert_encoding("Cédula", "UTF-8"));
    $sheet->setCellValue("H1", "Cargo");
    $sheet->setCellValue("J1", mb_convert_encoding("Género", "UTF-8"));
    $sheet->setCellValue("L1", mb_convert_encoding("Dirección", "UTF-8"));
    $sheet->setCellValue("Q1", mb_convert_encoding("Teléfono", "UTF-8"));
    $sheet->setCellValue("S1", "Correo");
    $sheet->setCellValue("W1", "Lugar de Nacimiento");
    $sheet->setCellValue("Z1", "Fecha de Nacimiento");

    $buscar = "SELECT * FROM personal";
    $resultado = $conn->query($buscar);
    $num = 1;
    $fila = 2;

    while ($rows = $resultado->fetch()) {
        $sheet->mergeCells('B' . $fila . ':C' . $fila);
        $sheet->mergeCells('D' . $fila . ':E' . $fila);
        $sheet->mergeCells('F' . $fila . ':G' . $fila);
        $sheet->mergeCells('H' . $fila . ':I' . $fila);
        $sheet->mergeCells('J' . $fila . ':K' . $fila);
        $sheet->mergeCells('L' . $fila . ':P' . $fila);
        $sheet->mergeCells('Q' . $fila . ':R' . $fila);
        $sheet->mergeCells('S' . $fila . ':V' . $fila);
        $sheet->mergeCells('W' . $fila . ':Y' . $fila);
        $sheet->mergeCells('Z' . $fila . ':AB' . $fila);

        $sheet->setCellValue("A" . $fila, $num++);
        $sheet->setCellValue("B" . $fila, mb_convert_encoding($rows['PersonalNombre'], "UTF-8"));
        $sheet->setCellValue("D" . $fila, mb_convert_encoding($rows['PersonalApellido'], "UTF-8"));
        $sheet->setCellValue("F" . $fila, mb_convert_encoding($rows['PersonalCedula'], "UTF-8"));
        $sheet->setCellValue("H" . $fila, mb_convert_encoding($rows['PersonalCargo'], "UTF-8"));
        $sheet->setCellValue("J" . $fila, mb_convert_encoding($rows['PersonalGenero'], "UTF-8"));
        $sheet->setCellValue("L" . $fila, mb_convert_encoding($rows['PersonalDireccion'], "UTF-8"));
        $sheet->setCellValue("Q" . $fila, mb_convert_encoding($rows['PersonalTelefono'], "UTF-8"));
        $sheet->setCellValue("S" . $fila, mb_convert_encoding($rows['PersonalCorreo'], "UTF-8"));
        $sheet->setCellValue("W" . $fila, mb_convert_encoding($rows['PersonalLugarNac'], "UTF-8"));
        $sheet->setCellValue("Z" . $fila, mb_convert_encoding($rows['PersonalFechaNac'], "UTF-8"));
        $fila++;
    }
}
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadshhetml.sheet');
	header('Content-Disposition: attachment;filename="Reporte del Personal.xlsx"');
	header('Cache-Control: max-age=0');

	$writer = IOFactory::createWriter($excel, 'Xlsx');
	$writer->save('php://output');
exit;
?>

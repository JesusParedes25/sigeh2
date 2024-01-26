<?php

require('../fpdf.php');
require 'conexion.php';


$id_evidencia = $_GET["id_evidencia"];

	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('logo_hidalgo.png', 5, 5, 30 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Resumen registro de evidencia ',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}


	$query = "SELECT * FROM wp_definicion_evidencias ";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);

	$pdf->Cell(80,6,'Pregunta',1,0,'C',1);
	$pdf->Cell(110,6,'Respuesta',1,1,'C',1);
	//$pdf->Cell(70,6,'MUNICIPIO',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		
		$pdf->
		(80,6,'Nombre del indicador asociado:',1,0,'C');
		$pdf->Cell(110,6,$row['nombre_indicador_asociado_def'],1,0,'C');

		
	}
	$pdf->Output();


	
	
?>



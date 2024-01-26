<?php
	require('../fpdf.php');
	require 'conexion.php';
	require 'mc_table.php';

	class PDF extends FPDF
	{
		function Header()
		{
			//$this->Image('img/cartelera.png',0,0,280 , 210,'PNG');
		    // Line break
		    $this->Ln(24);
		}

		// Inicia la definición del formato para el texto del documento.
		function medida($texto)
		{
			// Agregamos la fuente que vamos a ocupar.
			$this->AddFont('Graphik-Bold','','graphikBold.php');
			$this->SetTextColor(4,47,65);
			$this->SetFont('Graphik-Bold','',12);

			return($texto);
		}

		function bullet($texto)
		{
			// Agregamos la fuente que vamos a ocupar.
			$this->AddFont('Graphik-Bold','','graphikBold.php');
			$this->SetTextColor(145,152,155);
			$this->SetFont('Graphik-Bold','',12);

			return($texto);
		}

		function titulo($texto)
		{
			// Agregamos la fuente que vamos a ocupar.
			$this->AddFont('Graphik-Bold','','graphikBold.php');
			$this->SetFillColor(68,181,34);
			$this->SetTextColor(255,255,255);
			$this->SetFont('Graphik-Bold','',12);

			return(utf8_decode($texto));
		}

		function subtitulo($texto)
		{
			// Agregamos la fuente que vamos a ocupar.
			$this->AddFont('Graphik-Bold','','graphikBold.php');
			$this->SetTextColor(0,0,0);
			$this->SetFont('Graphik-Bold','',14);
			
			return(utf8_decode($texto));
		}

		function contenido($texto)
		{
			// Agregamos la fuente que vamos a ocupar.
			$this->AddFont('Graphik-Regular','','graphikRegular.php');
			$this->SetFillColor(255,57,74);
			$this->SetTextColor(255,255,255);
			$this->SetFont('Graphik-Regular','',18);

			return(utf8_decode($texto));
		}
		// Termina la definición del formato para el texto del documento.
	}

	$id_cartel = $_GET["id"];
	//echo $id_covid;
	
	// "INICIO DEL DOCUMENTO"
	$pdf = new PDF();

	$query = "SELECT * FROM `carteles` WHERE `id_cartel` = '$id_cartel'";

    	$result = $mysqli->query($query);

	// Se inserta una nueva página en blanco.
	$pdf->AddPage('l','Letter','0');

	// Propiedades para la graficación del documento.
	
	//$pdf->SetDrawColor(4,47,65);
	//$pdf->SetLineWidth(0.7);

	while($imp = $result->fetch_assoc())
	{
		
		$pdf->Image('http://localhost/repositorio/cartelera/images/'.$imp['archivo'] , -20 ,15, 180 , 190);
		$pdf->Image('img/cartelera.png',0,3,280 , 210,'PNG');
		$x = $pdf->GetX();
        $y = $pdf->GetY();
        $pdf->SetXY($x=0,$y=0);
		$titulo = $pdf->titulo('LOGROS PARA CARTELERAS');
		$pdf->MultiCell(0,8,$titulo,0,'C',true);
		$pdf->Ln(3);
		$pdf->SetXY($x=30,$y=10);
		$subtitulo = $pdf->subtitulo('Cartel de ' .$imp['cartelera']);
		$pdf->MultiCell(0,5,$subtitulo,0,'C');
		$pdf->Ln(3);
		$pdf->SetXY($x=150,$y=50);
		$contenido = $pdf->contenido($imp['logro']);
		$pdf->MultiCell(0,12,$contenido,0,'J');
		/*$subtitulo = $pdf->subtitulo('¿Que se hizo?');
		$pdf->MultiCell(96,5,$subtitulo,0,'L');
		$contenido = $pdf->contenido($imp['que']);
		$pdf->MultiCell(196,5,$contenido,0,'J');
		$pdf->Ln(3);
		$subtitulo = $pdf->subtitulo('¿Cuanto se hizo?');
		$pdf->MultiCell(96,5,$subtitulo,0,'L');
		$contenido = $pdf->contenido($imp['cuanto']);
		$pdf->MultiCell(196,5,$contenido,0,'J');
		$pdf->Ln(3);
		$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
		$pdf->MultiCell(96,5,$subtitulo,0,'L');
		$contenido = $pdf->contenido($imp['aquien']);
		$pdf->MultiCell(196,5,$contenido,0,'J');
		$pdf->Ln(3);
		$titulo = $pdf->titulo('MEDIDA IMPLEMENTADA');
		$pdf->MultiCell(196,5,$titulo,0,'C',true);
		$contenido = $pdf->contenido($imp['medida']);
		$pdf->MultiCell(196,5,$contenido,0,'J');*/

		
	}

	// "FIN DEL DOCUMENTO"  
	$pdf->Output();
?>

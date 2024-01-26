<?php
	require('../fpdf.php');
	require 'conexion.php';
	require 'mc_table.php';

	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('solicitudes.png',15,10,185);
		    // Line break
		    $this->Ln(25);
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
			$this->SetTextColor(255,255,255);
			$this->SetFillColor(98,17,50);
			$this->SetFont('Graphik-Bold','',12);

			return(utf8_decode($texto));
		}

		function subtitulo($texto)
		{
			// Agregamos la fuente que vamos a ocupar.
			$this->AddFont('Graphik-Bold','','graphikBold.php');
			$this->SetTextColor(0,0,0);
			
			$this->SetFont('Graphik-Bold','',12);
			
			return(utf8_decode($texto));
		}

		function sub($texto)
		{
			// Agregamos la fuente que vamos a ocupar.
			$this->AddFont('Graphik-Bold','','graphikBold.php');
			$this->SetTextColor(255,255,255);
			$this->SetFillColor(188,149,92);
			$this->SetFont('Graphik-Bold','',12);
			
			return(utf8_decode($texto));
		}


		function contenido($texto)
		{
			// Agregamos la fuente que vamos a ocupar.
			$this->AddFont('Graphik-Regular','','graphikRegular.php');
			$this->SetTextColor(0,0,0);
			$this->SetFont('Graphik-Regular','',10);

			return(utf8_decode($texto));
		}
		// Termina la definición del formato para el texto del documento.
	}

	$id_solicitud = $_GET["id"];
	//echo $id_solicitud;
	
	// "INICIO DEL DOCUMENTO"
	$pdf = new PDF();

	$query = "SELECT * FROM `solicitudes` ORDER BY `id` DESC LIMIT 1";

    	$result = $mysqli->query($query);

	// Se inserta una nueva página en blanco.
	$pdf->AddPage('P','Letter','0');

	// Propiedades para la graficación del documento.
	
	$pdf->SetDrawColor(4,47,95);
	$pdf->SetLineWidth(0.7);

	while($imp = $result->fetch_assoc())
	{
		$contenido = $pdf->contenido($imp['fecha'].' | '.$imp['hora']);
		$pdf->MultiCell(196,5,$contenido,0,'R');
		$pdf->Ln(5);
		$titulo = $pdf->titulo('SOLICITUD DE INFORMACIÓN  ');
		$pdf->MultiCell(196,5,$titulo,0,'C',true);
		$pdf->Ln(6);
		$subtitulo = $pdf->subtitulo('Dependencia que solicita: ' .$imp['dependencia']);
		$pdf->MultiCell(196,5,$subtitulo,0,'C');
		$pdf->Ln(3);
		$subtitulo = $pdf->subtitulo('Producto:');
		$pdf->MultiCell(96,5,$subtitulo,0,'L');
		$contenido = $pdf->contenido($imp['producto']);
		$pdf->MultiCell(196,5,$contenido,0,'J');
		$pdf->Ln(3);
		$subtitulo = $pdf->subtitulo('Prioridad: ');
		$pdf->MultiCell(96,5,$subtitulo,0,'L');
		$contenido = $pdf->contenido($imp['prioridad']);
		$pdf->MultiCell(196,5,$contenido,0,'J');
		$pdf->Ln(3);
		
		$titulo = $pdf->titulo('DESCRIPCIÓN');
		$pdf->MultiCell(196,5,$titulo,0,'C',true);
		$pdf->Ln(2);
		$contenido = $pdf->contenido($imp['descripcion']);
		$pdf->MultiCell(196,5,$contenido,0,'J');
		$pdf->Ln(20);

		$pdf->Output('D', $imp['id'].'_'.$imp['dependencia'].'.pdf');
		
	}

	// "FIN DEL DOCUMENTO"  
	
?>

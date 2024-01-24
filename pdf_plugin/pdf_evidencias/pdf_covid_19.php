<?php
	require('../fpdf.php');
	require 'conexion.php';
	require 'mc_table.php';

	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('Fondo - Letter.png',0,0,216);
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
			$this->SetTextColor(255,255,255);
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

		function contenido($texto)
		{
			// Agregamos la fuente que vamos a ocupar.
			$this->AddFont('Graphik-Regular','','graphikRegular.php');
			$this->SetTextColor(0,0,0);
			$this->SetFont('Graphik-Regular','',10);

			return($texto);
		}
		// Termina la definición del formato para el texto del documento.
	}

	$id_covid = $_GET["id"];
	//echo $id_covid;
	
	// "INICIO DEL DOCUMENTO"
	$pdf = new PDF();

	$query = "SELECT * FROM `covid` WHERE `id_covid` = '$id_covid'";

    	$result = $mysqli->query($query);

	// Se inserta una nueva página en blanco.
	$pdf->AddPage('P','Letter','0');

	// Propiedades para la graficación del documento.
	
	$pdf->SetDrawColor(4,47,65);
	$pdf->SetLineWidth(0.7);

	while($imp = $result->fetch_assoc())
	{
		// Datos del documento (1 x hoja).
		/*if ($imp['semaforo'] == 'Im'){
			$pdf->SetFillColor(14,173,1);
			$bullet = $pdf->medida('IM');
			$pdf->MultiCell(10,5,$bullet,0,'C',true);
		}
		else{
			$pdf->SetFillColor(250,247,65);
			$bullet = $pdf->medida('SM');
			$pdf->MultiCell(10,5,$bullet,0,'C',true);
		}
		$pdf->SetFillColor(4,47,65);
		*/
		
		
	/*	$medida = $pdf->medida($imp['medida']);
		$pdf->MultiCell(196,5,$medida,0,'L');
		$bullet = $pdf->bullet($imp['bullet']);
		$pdf->MultiCell(196,5,$bullet,0,'L');
		$pdf->Ln(4);
	
		// FILA 1:
		$titulo = $pdf->titulo('RESILENCIA ANTE LOS RETOS DEL COVID-19');
		$pdf->MultiCell(196,5,$titulo,0,'C',true);
		$xLine1 = $pdf->GetX();
		$yLine1 = $pdf->GetY();
		$pdf->Ln(3);

		// FILA 2:
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
		$pdf->MultiCell(96,5,$subtitulo,0,'L');
		$pdf->SetXY($x+100,$y);
		$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
		$pdf->MultiCell(96,5,$subtitulo,0,'L');

		// FILA 3:
		$x = $pdf->GetX();
		$y = $pdf->GetY();
		$contenido = $pdf->contenido($imp['que']);
		$pdf->MultiCell(96,5,$contenido,0,'J');
		$y1 = $pdf->GetY();
		$pdf->SetXY($x+100,$y);
		$contenido = $pdf->contenido($imp['cuanto']);
		$pdf->MultiCell(96,5,$contenido,0,'J');
		$y2 = $pdf->GetY();

		if($y1>$y2)
			$y = $y1;

		else if($y2>$y1)
			$y = $y2;

		else
			$y = $y1;

		$pdf->Line($xLine1+98,$yLine1+1.5,$x+98,$y);
		$pdf->Line($x+1.5,$y+1.5,$x+194.5,$y+1.5);
*/
		// FILA 4:
		

		// FILA 5:
		$titulo = $pdf->titulo('RESILENCIA ANTE LOS RETOS DEL COVID-19');
		$pdf->MultiCell(196,5,$titulo,0,'C',true);
		$pdf->Ln(3);
		$subtitulo = $pdf->subtitulo('Acciones para ' .$imp['tema']);
		$pdf->MultiCell(196,5,$subtitulo,0,'C');
		$pdf->Ln(3);
		$subtitulo = $pdf->subtitulo('¿Que se hizo?');
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
		$subtitulo = $pdf->subtitulo('MEDIDA IMPLEMENTADA');
		$pdf->MultiCell(196,5,$subtitulo,0,'C');
		$pdf->Ln(2);
		$contenido = $pdf->contenido($imp['medida']);
		$pdf->MultiCell(196,5,$contenido,0,'J');

		/*// FILA 6:
		$titulo = $pdf->titulo('ELEMENTOS CUALITATIVOS');
		$pdf->MultiCell(196,5,$titulo,0,'C',true);
		$pdf->Ln(3);

		// FILA 7:
		$subtitulo = $pdf->subtitulo('<<Pregunta>>');
		$pdf->MultiCell(196,5,$subtitulo,0,'L');

		// FILA 8:
		$contenido = $pdf->contenido($imp['descripcion']);
		$pdf->MultiCell(196,5,$contenido,0,'J');
		$pdf->Ln(3);*/

		// FILA 9:
		
	}

	// "FIN DEL DOCUMENTO"  
	$pdf->Output();
?>

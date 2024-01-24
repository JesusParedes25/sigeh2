<?php
	require('../fpdf.php');
	require 'conexion.php';

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

	$id_covid = $_GET["id_covid"];

	// "INICIO DEL DOCUMENTO"
	$pdf = new PDF();

	$query = "SELECT * FROM wp_covid WHERE id_covid = $id_covid";

    	$result = $mysqli->query($query);

	// Se inserta una nueva página en blanco.
	$pdf->AddPage('P','Letter','0');

	// Propiedades para la graficación del documento.
	
	$pdf->SetDrawColor(4,47,65);
	$pdf->SetLineWidth(0.7);

	while($imp = $result->fetch_assoc())
	{
		// Datos del documento (1 x hoja).
		if ($imp['semaforo'] == 'Im'){
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
		
		
		$medida = $pdf->medida($imp['medida1']);
		$pdf->MultiCell(196,5,$medida,0,'L');
		$bullet = $pdf->bullet($imp['bullet']);
		$pdf->MultiCell(196,5,$bullet,0,'L');
		$pdf->Ln(4);

		// FILA 1:
		$titulo = $pdf->titulo('ELEMENTOS CUANTITATIVOS');
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
		$contenido = $pdf->contenido($imp['que_se_hizo']);
		$pdf->MultiCell(96,5,$contenido,0,'J');
		$y1 = $pdf->GetY();
		$pdf->SetXY($x+100,$y);
		$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
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

		// FILA 4:
		$pdf->SetXY($x,$y+3);
		$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
		$pdf->MultiCell(196,5,$subtitulo,0,'L');

		// FILA 5:
		$contenido = $pdf->contenido($imp['que_poblacion']);
		$pdf->MultiCell(196,5,$contenido,0,'J');
		$pdf->Ln(3);

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
		$titulo = $pdf->titulo('IMPACTO EN LA CONTINGENCIA');
		$pdf->MultiCell(196,5,$titulo,0,'C',true);
		$pdf->Ln(3);

		// FILA 10:
		$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
		$pdf->MultiCell(196,5,$subtitulo,0,'L');

		// FILA 11:
		$contenido = $pdf->contenido($imp['beneficia_accion']);
		$pdf->MultiCell(196,5,$contenido,0,'J');
		$pdf->Ln(3);

		// FILA 9:
		$titulo = $pdf->titulo('IMPACTO EN EL ESTADO');
		$pdf->MultiCell(196,5,$titulo,0,'C',true);
		$pdf->Ln(3);

		// FILA 10:
		$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
		$pdf->MultiCell(196,5,$subtitulo,0,'L');

		// FILA 11:
		$contenido = $pdf->contenido($imp['beneficia2']);
		$pdf->MultiCell(196,5,$contenido,0,'J');
		$pdf->Ln(3);

		// FILA 12:
		$titulo = $pdf->titulo('LUGAR');
		$pdf->MultiCell(196,5,$titulo,0,'C',true);
		$pdf->Ln(3);

		// FILA 13:
		$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
		$pdf->MultiCell(196,5,$subtitulo,0,'L');

		// FILA 14:
		if($imp['localidades_ids'] != "")
		{
			$arrayLugaresId = explode(",", $imp['localidades_ids']);
			$limite = count($arrayLugaresId);

			if ($arrayLugaresId[0] == "")
			 	$total = 1;
			else
			 	$total = 0;

			$bnd = 0;

			for ($total;$total<$limite;$total++)
			{
				$id2 = $arrayLugaresId[$total];

			    $query2 = "SELECT * FROM wp_localidades WHERE id_localidad = $id2";

			    $result2 = $mysqli->query($query2);

			    while($loc = $result2->fetch_assoc())
				{
					if($bnd==0)
					{
						$localidades = $loc['NOMGEO'];
						$bnd = 1;
					}
					else
						$localidades = $localidades.", ".$loc['NOMGEO'];
				}
			}

			$localidades = $localidades.".";
			$contenido = $pdf->contenido($localidades);
		}
		else
		{
			$contenido = $pdf->contenido($imp['donde_se_llevo']);
		}
		$pdf->MultiCell(196,5,$contenido,0,'J');
		$pdf->Ln(3);

		if($imp['existe_incidencia'] == 'Si')
		{
			// FILA 15:
			$titulo = $pdf->titulo('INCIDENCIA');
			$pdf->MultiCell(196,5,$titulo,0,'C',true);
			$pdf->Ln(3);

			// FILA 16:
			$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
			$pdf->MultiCell(196,5,$subtitulo,0,'L');

			// FILA 17:
			$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
			$pdf->MultiCell(196,5,$contenido,0,'J');
		}
	}

	// "FIN DEL DOCUMENTO"  
	$pdf->Output();
?>

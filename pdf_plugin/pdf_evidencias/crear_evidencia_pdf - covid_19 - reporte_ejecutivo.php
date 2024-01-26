<?php
	require('../fpdf.php');
	require 'conexion.php';

	class PDF extends FPDF
	{
		function obtenerFechaHora()
	    {
			$fechaSystem = getdate(); // Obtiene la fecha y hora del sistema.

			// Fecha:
			$dia = $fechaSystem['mday'];
			$mes = $fechaSystem['mon'];
			$year = $fechaSystem['year'];

			// Hora:
			$segundos = $fechaSystem['seconds'];
			$minutos = $fechaSystem['minutes'];
			$hora = $fechaSystem['hours'];

			// INICIO: Validación de la fecha.
			if($dia <= 9)
			{
				$dia = "0".$fechaSystem['mday'];
			}

			if($mes <= 9)
			{
				$mes = "0".$fechaSystem['mon'];
			}
			// FIN: Validación de la fecha.

			// INICIO: Validación de la hora.
			if($segundos <= 9)
			{
				$segundos = "0".$fechaSystem['seconds'];
			}

			if($minutos <= 9)
			{
				$minutos = "0".$fechaSystem['minutes'];
			}

			if($hora==0)
				$hora=23;
			else
				$hora=$hora-1;
			
			// FIN: Validación de la hora.

			$fecha = $dia."/".$mes."/".$year;
			$hora = $hora.":".$minutos.":".$segundos;

			$dateTime = $fecha." - ".$hora;

			return($dateTime);
		}
		
		function Header()
		{
			$this->Image('Fondo - Legal.png',0,0,216);
		    // Line break
		    $this->Ln(24);
		}

		// Inicia la definición del formato para el texto del documento.
		function principal($texto)
		{
			// Agregamos la fuente que vamos a ocupar.
			$this->AddFont('Graphik-Bold','','graphikBold.php');
			$this->SetTextColor(4,47,65);
			$this->SetFont('Graphik-Bold','',15);

			return(utf8_decode($texto));
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
			$this->SetTextColor(4,47,65);
			$this->SetFont('Graphik-Bold','',10);
			
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
		function Footer()
		{
			// Agregamos la fuente que vamos a ocupar.
			$this->AddFont('Graphik-Bold','','graphikBold.php');
			$this->SetTextColor(109,166,51);
			$this->SetFont('Graphik-Bold','',10);

			$x = $this->GetX();
			$y = $this->GetY();
			$this->MultiCell(50,5,utf8_decode('Página ').$this->PageNo(),0,'L');
			$this->SetXY($x+100,$y);
			$this->MultiCell(96,5,utf8_decode('Fecha y hora del reporte: ').$this->obtenerFechaHora(),0,'R');
		}

	}

	// "INICIO DEL DOCUMENTO"
	$pdf = new PDF();

	$query = "SELECT * FROM wp_covid";

    $result = $mysqli->query($query);

	// Se inserta una nueva página en blanco.
	$pdf->AddPage('P','Legal','0');

	// Propiedades para la graficación del documento.
	$pdf->SetFillColor(109,166,51);

	// Título del documento.
	$titulo = $pdf->principal('REPORTE EJECUTIVO');
	$pdf->MultiCell(196,5,$titulo,0,'C');
	$pdf->Ln(4);

	$cont_SEC_SALUD = 0;
	$cont_SEC_GOB = 0;
	$cont_SOPOT = 0;
	$cont_SEC_DESECON = 0;
	$cont_SEDESO = 0;
	$cont_SEC_TURISMO = 0;
	$cont_SEC_SEGUP = 0;
	$cont_SEP = 0;
	$cont_SEC_MOVYTRANS = 0;
	$cont_DIFH = 0;
	$cont_OFI_MAYOR = 0;

	while($imp = $result->fetch_assoc())
	{
		if($imp['nombre_usuario_covid'] == "SEC_SALUD")
		{
			$SEC_SALUD[$cont_SEC_SALUD] = ($imp['bullet']);
			
			$cont_SEC_SALUD = $cont_SEC_SALUD + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_GOB")
		{
			$SEC_GOB[$cont_SEC_GOB] = ($imp['bullet']);
			
			$cont_SEC_GOB = $cont_SEC_GOB + 1;
		}

		if($imp['nombre_usuario_covid'] == "SOPOT")
		{
			$SOPOT[$cont_SOPOT] = ($imp['bullet']);
			
			$cont_SOPOT = $cont_SOPOT + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_DESECON")
		{
			$SEC_DESECON[$cont_SEC_DESECON] = ($imp['bullet']);
			
			$cont_SEC_DESECON = $cont_SEC_DESECON + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEDESO")
		{
			$SEDESO[$cont_SEDESO] = ($imp['bullet']);
			
			$cont_SEDESO = $cont_SEDESO + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_TURISMO")
		{
			$SEC_TURISMO[$cont_SEC_TURISMO] = ($imp['bullet']);
			
			$cont_SEC_TURISMO = $cont_SEC_TURISMO + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_SEGUP")
		{
			$SEC_SEGUP[$cont_SEC_SEGUP] = ($imp['bullet']);
			
			$cont_SEC_SEGUP = $cont_SEC_SEGUP + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEP")
		{
			$SEP[$cont_SEP] = ($imp['bullet']);
			
			$cont_SEP = $cont_SEP + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_MOVYTRANS")
		{
			$SEC_MOVYTRANS[$cont_SEC_MOVYTRANS] = ($imp['bullet']);
			
			$cont_SEC_MOVYTRANS = $cont_SEC_MOVYTRANS + 1;
		}

		if($imp['nombre_usuario_covid'] == "DIFH")
		{
			$DIFH[$cont_DIFH] = ($imp['bullet']);
			
			$cont_DIFH = $cont_DIFH + 1;
		}

		if($imp['nombre_usuario_covid'] == "OFI_MAYOR")
		{
			$OFI_MAYOR[$cont_OFI_MAYOR] = ($imp['bullet']);
			
			$cont_OFI_MAYOR = $cont_OFI_MAYOR + 1;
		}
	}

	if($cont_SEC_SALUD>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE SALUD');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_SALUD;$i++)
		{
			$subtitulo = $pdf->subtitulo('MEDIDA');
			$num = $i+1;
			$pdf->MultiCell(196,5,$subtitulo." ".$num.":",0,'L');
			$bullet = $SEC_SALUD[$i];
			$contenido = $pdf->contenido($bullet);
			$pdf->MultiCell(196,5,$contenido,0,'J');
		}

		$pdf->Ln(3);
	}

	if($cont_SEC_GOB>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE GOBIERNO');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_GOB;$i++)
		{
			$subtitulo = $pdf->subtitulo('MEDIDA');
			$num = $i+1;
			$pdf->MultiCell(196,5,$subtitulo." ".$num.":",0,'L');
			$bullet = $SEC_GOB[$i];
			$contenido = $pdf->contenido($bullet);
			$pdf->MultiCell(196,5,$contenido,0,'J');
		}

		$pdf->Ln(3);
	}

	if($cont_SOPOT>0)
	{
		$titulo = $pdf->titulo('> SECRETARIA DE OBRAS PÚBLICAS Y ORDENAMIENTO TERRITORIAL');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SOPOT;$i++)
		{
			$subtitulo = $pdf->subtitulo('MEDIDA');
			$num = $i+1;
			$pdf->MultiCell(196,5,$subtitulo." ".$num.":",0,'L');
			$bullet = $SOPOT[$i];
			$contenido = $pdf->contenido($bullet);
			$pdf->MultiCell(196,5,$contenido,0,'J');
		}

		$pdf->Ln(3);
	}

	if($cont_SEC_DESECON>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE DESARROLLO ECONÓMICO');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_DESECON;$i++)
		{
			$subtitulo = $pdf->subtitulo('MEDIDA');
			$num = $i+1;
			$pdf->MultiCell(196,5,$subtitulo." ".$num.":",0,'L');
			$bullet = $SEC_DESECON[$i];
			$contenido = $pdf->contenido($bullet);
			$pdf->MultiCell(196,5,$contenido,0,'J');
		}

		$pdf->Ln(3);
	}

	if($cont_SEDESO>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE DESARROLLO SOCIAL');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEDESO;$i++)
		{
			$subtitulo = $pdf->subtitulo('MEDIDA');
			$num = $i+1;
			$pdf->MultiCell(196,5,$subtitulo." ".$num.":",0,'L');
			$bullet = $SEDESO[$i];
			$contenido = $pdf->contenido($bullet);
			$pdf->MultiCell(196,5,$contenido,0,'J');
		}

		$pdf->Ln(3);
	}

	if($cont_SEC_TURISMO>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE TURISMO');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_TURISMO;$i++)
		{
			$subtitulo = $pdf->subtitulo('MEDIDA');
			$num = $i+1;
			$pdf->MultiCell(196,5,$subtitulo." ".$num.":",0,'L');
			$bullet = $SEC_TURISMO[$i];
			$contenido = $pdf->contenido($bullet);
			$pdf->MultiCell(196,5,$contenido,0,'J');
		}

		$pdf->Ln(3);
	}

	if($cont_SEC_SEGUP>0)
	{
		$titulo = $pdf->titulo('> SEGURIDAD PÚBLICA');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_SEGUP;$i++)
		{
			$subtitulo = $pdf->subtitulo('MEDIDA');
			$num = $i+1;
			$pdf->MultiCell(196,5,$subtitulo." ".$num.":",0,'L');
			$bullet = $SEC_SEGUP[$i];
			$contenido = $pdf->contenido($bullet);
			$pdf->MultiCell(196,5,$contenido,0,'J');
		}

		$pdf->Ln(3);
	}

	if($cont_SEP>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE EDUCACIÓN PÚBLICA');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEP;$i++)
		{
			$subtitulo = $pdf->subtitulo('MEDIDA');
			$num = $i+1;
			$pdf->MultiCell(196,5,$subtitulo." ".$num.":",0,'L');
			$bullet = $SEP[$i];
			$contenido = $pdf->contenido($bullet);
			$pdf->MultiCell(196,5,$contenido,0,'J');
		}

		$pdf->Ln(3);
	}

	if($cont_SEC_MOVYTRANS>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE MOVILIDAD Y TRANSPORTE');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_MOVYTRANS;$i++)
		{
			$subtitulo = $pdf->subtitulo('MEDIDA');
			$num = $i+1;
			$pdf->MultiCell(196,5,$subtitulo." ".$num.":",0,'L');
			$bullet = $SEC_MOVYTRANS[$i];
			$contenido = $pdf->contenido($bullet);
			$pdf->MultiCell(196,5,$contenido,0,'J');
		}

		$pdf->Ln(3);
	}

	if($cont_DIFH>0)
	{
		$titulo = $pdf->titulo('> SISTEMA PARA EL DESARROLLO INTEGRAL DE LA FAMILIA DEL ESTADO DE HIDALGO (DIF)');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_DIFH;$i++)
		{
			$subtitulo = $pdf->subtitulo('MEDIDA');
			$num = $i+1;
			$pdf->MultiCell(196,5,$subtitulo." ".$num.":",0,'L');
			$bullet = $DIFH[$i];
			$contenido = $pdf->contenido($bullet);
			$pdf->MultiCell(196,5,$contenido,0,'J');
		}

		$pdf->Ln(3);
	}

	if($cont_OFI_MAYOR>0)
	{
		$titulo = $pdf->titulo('> OFICIALÍA MAYOR');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_OFI_MAYOR;$i++)
		{
			$subtitulo = $pdf->subtitulo('MEDIDA');
			$num = $i+1;
			$pdf->MultiCell(196,5,$subtitulo." ".$num.":",0,'L');
			$bullet = $OFI_MAYOR[$i];
			$contenido = $pdf->contenido($bullet);
			$pdf->MultiCell(196,5,$contenido,0,'J');
		}

		$pdf->Ln(3);
	}

	// "FIN DEL DOCUMENTO"
	$pdf->Output();
?>

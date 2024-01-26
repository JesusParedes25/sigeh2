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

		function medida($texto)
		{
			// Agregamos la fuente que vamos a ocupar.
			$this->AddFont('Graphik-Bold','','graphikBold.php');
			$this->SetTextColor(4,47,65);
			$this->SetFont('Graphik-Bold','',10);

			return($texto);
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
	$titulo = $pdf->principal('REPORTE AMPLIADO');
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
	$cont_CONTRALORIA = 0;
	$cont_SEC_CULTURA = 0;
	$cont_PROCURADURIA = 0;
	$cont_SEC_TRABYPS = 0;
	$cont_SEC_EJECUTIVA = 0;
	$cont_SEC_DESAGRO = 0;
	$cont_SEMARNATH = 0;
	$cont_UNI_PLANEA = 0;
	$cont_SEC_FINANZAS = 0;

	while($imp = $result->fetch_assoc())
	{
		if($imp['nombre_usuario_covid'] == "SEC_SALUD")
		{
			$SEC_SALUD[$cont_SEC_SALUD] = ($imp['id_covid']);
			
			$cont_SEC_SALUD = $cont_SEC_SALUD + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_GOB")
		{
			$SEC_GOB[$cont_SEC_GOB] = ($imp['id_covid']);
			
			$cont_SEC_GOB = $cont_SEC_GOB + 1;
		}

		if($imp['nombre_usuario_covid'] == "SOPOT")
		{
			$SOPOT[$cont_SOPOT] = ($imp['id_covid']);
			
			$cont_SOPOT = $cont_SOPOT + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_DESECON")
		{
			$SEC_DESECON[$cont_SEC_DESECON] = ($imp['id_covid']);
			
			$cont_SEC_DESECON = $cont_SEC_DESECON + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEDESO")
		{
			$SEDESO[$cont_SEDESO] = ($imp['id_covid']);
			
			$cont_SEDESO = $cont_SEDESO + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_TURISMO")
		{
			$SEC_TURISMO[$cont_SEC_TURISMO] = ($imp['id_covid']);
			
			$cont_SEC_TURISMO = $cont_SEC_TURISMO + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_SEGUP")
		{
			$SEC_SEGUP[$cont_SEC_SEGUP] = ($imp['id_covid']);
			
			$cont_SEC_SEGUP = $cont_SEC_SEGUP + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEP")
		{
			$SEP[$cont_SEP] = ($imp['id_covid']);
			
			$cont_SEP = $cont_SEP + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_MOVYTRANS")
		{
			$SEC_MOVYTRANS[$cont_SEC_MOVYTRANS] = ($imp['id_covid']);
			
			$cont_SEC_MOVYTRANS = $cont_SEC_MOVYTRANS + 1;
		}

		if($imp['nombre_usuario_covid'] == "DIFH")
		{
			$DIFH[$cont_DIFH] = ($imp['id_covid']);
			
			$cont_DIFH = $cont_DIFH + 1;
		}

		if($imp['nombre_usuario_covid'] == "OFI_MAYOR")
		{
			$OFI_MAYOR[$cont_OFI_MAYOR] = ($imp['id_covid']);
			
			$cont_OFI_MAYOR = $cont_OFI_MAYOR + 1;
		}

		if($imp['nombre_usuario_covid'] == "CONTRALORIA")
		{
			$CONTRALORIA[$cont_CONTRALORIA] = ($imp['id_covid']);
			
			$cont_CONTRALORIA = $cont_CONTRALORIA + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_CULTURA")
		{
			$SEC_CULTURA[$cont_SEC_CULTURA] = ($imp['id_covid']);
			
			$cont_SEC_CULTURA = $cont_SEC_CULTURA + 1;
		}

		if($imp['nombre_usuario_covid'] == "PROCURADURIA")
		{
			$PROCURADURIA[$cont_PROCURADURIA] = ($imp['id_covid']);
			
			$cont_PROCURADURIA = $cont_PROCURADURIA + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_TRABYPS")
		{
			$SEC_TRABYPS[$cont_SEC_TRABYPS] = ($imp['id_covid']);
			
			$cont_SEC_TRABYPS = $cont_SEC_TRABYPS + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_EJECUTIVA")
		{
			$SEC_EJECUTIVA[$cont_SEC_EJECUTIVA] = ($imp['id_covid']);
			
			$cont_SEC_EJECUTIVA = $cont_SEC_EJECUTIVA + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_DESAGRO")
		{
			$SEC_DESAGRO[$cont_SEC_DESAGRO] = ($imp['id_covid']);
			
			$cont_SEC_DESAGRO = $cont_SEC_DESAGRO + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEMARNATH")
		{
			$SEMARNATH[$cont_SEMARNATH] = ($imp['id_covid']);
			
			$cont_SEMARNATH = $cont_SEMARNATH + 1;
		}

		if($imp['nombre_usuario_covid'] == "UNI_PLANEA")
		{
			$UNI_PLANEA[$cont_UNI_PLANEA] = ($imp['id_covid']);
			
			$cont_UNI_PLANEA = $cont_UNI_PLANEA + 1;
		}

		if($imp['nombre_usuario_covid'] == "SEC_FINANZAS")
		{
			$SEC_FINANZAS[$cont_SEC_FINANZAS] = ($imp['id_covid']);
			
			$cont_SEC_FINANZAS = $cont_SEC_FINANZAS + 1;
		}
	}

	if($cont_SEC_SALUD>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE SALUD');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_SALUD;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SEC_SALUD[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_SEC_GOB>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE GOBIERNO');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_GOB;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SEC_GOB[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_SOPOT>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE OBRAS PÚBLICAS Y ORDENAMIENTO TERRITORIAL');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SOPOT;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SOPOT[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_SEC_DESECON>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE DESARROLLO ECONÓMICO');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_DESECON;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SEC_DESECON[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_SEDESO>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE DESARROLLO SOCIAL');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEDESO;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SEDESO[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_SEC_TURISMO>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE TURISMO');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_TURISMO;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SEC_TURISMO[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_SEC_SEGUP>0)
	{
		$titulo = $pdf->titulo('> SEGURIDAD PÚBLICA');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_SEGUP;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SEC_SEGUP[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_SEP>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE EDUCACIÓN PÚBLICA');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEP;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SEP[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_SEC_MOVYTRANS>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE MOVILIDAD Y TRANSPORTE');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_MOVYTRANS;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SEC_MOVYTRANS[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_DIFH>0)
	{
		$titulo = $pdf->titulo('> SISTEMA PARA EL DESARROLLO INTEGRAL DE LA FAMILIA DEL ESTADO DE HIDALGO (DIF)');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_DIFH;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $DIFH[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_OFI_MAYOR>0)
	{
		$titulo = $pdf->titulo('> OFICIALÍA MAYOR');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_OFI_MAYOR;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $OFI_MAYOR[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_CONTRALORIA>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE CONTRALORIA');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_CONTRALORIA;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $CONTRALORIA[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_SEC_CULTURA>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE CULTURA');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_CULTURA;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SEC_CULTURA[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_PROCURADURIA>0)
	{
		$titulo = $pdf->titulo('> PROCURADURÍA GENERAL DE JUSTICIA EN EL ESTADO DE HIDALGO');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_PROCURADURIA;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $PROCURADURIA[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_SEC_TRABYPS>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DEL TRABAJO Y PREVISIÓN SOCIAL');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_TRABYPS;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SEC_TRABYPS[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_SEC_EJECUTIVA>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA EJECUTIVA DE LA POLÍTICA PÚBLICA');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_EJECUTIVA;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SEC_EJECUTIVA[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_SEC_DESAGRO>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE DESARROLLO AGROPECUARIO');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_DESAGRO;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SEC_DESAGRO[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_SEMARNATH>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE MEDIO AMBIENTE Y RECURSOS NATURALES');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEMARNATH;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SEMARNATH[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_UNI_PLANEA>0)
	{
		$titulo = $pdf->titulo('> UNIDAD DE PLANEACIÓN Y PRÓSPECTIVA');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_UNI_PLANEA;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $UNI_PLANEA[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	if($cont_SEC_FINANZAS>0)
	{
		$titulo = $pdf->titulo('> SECRETARÍA DE FINANZAS');
		$pdf->MultiCell(196,5,$titulo,0,'L',true);
		$pdf->Ln(3);

		for($i=0;$i<$cont_SEC_FINANZAS;$i++)
		{
			$query = "SELECT * FROM wp_covid WHERE id_covid = $SEC_FINANZAS[$i]";

    		$result = $mysqli->query($query);

			while($imp = $result->fetch_assoc())
			{
				$medida = $pdf->medida('MEDIDA');
				$num = $i+1;
				if($imp['semaforo'] == 'Im')
				{
					$pdf->SetFillColor(14,173,1);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - IMPLEMENTADA - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - IMPLEMENTADA - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				else
				{
					$pdf->SetFillColor(250,247,65);
					if($imp['ultima_fecha_mod']=="")
						$pdf->MultiCell(196,5,$medida." ".$num.utf8_decode(" - SE MANTIENE - Sin modificación"),0,'C',true);
					else
						$pdf->MultiCell(196,5,$medida." ".$num." - SE MANTIENE - "."Modificado (".$imp['ultima_fecha_mod'].")",0,'C',true);
				}
				$contenido = $pdf->contenido($imp['medida1']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('Bullet:');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['bullet']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('ELEMENTOS CUANTITATIVOS');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Qué se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿Cuánto se hizo?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['cuanto_se_hizo']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$subtitulo = $pdf->subtitulo('¿A que población va dirigida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['que_poblacion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN LA CONTINGENCIA');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿En que beneficia la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia_accion']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('IMPACTO EN EL ESTADO');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Como afecta esta medida a la economía, al desarrollo social, a los resultados esperados en la dependencia?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
				$contenido = $pdf->contenido($imp['beneficia2']);
				$pdf->MultiCell(196,5,$contenido,0,'J');
				$pdf->Ln(3);
				$subtitulo = $pdf->subtitulo('LUGAR');
				$pdf->MultiCell(196,5,$subtitulo,0,'C');
				$subtitulo = $pdf->subtitulo('¿Dónde se lleva o llevo a cabo la medida?');
				$pdf->MultiCell(196,5,$subtitulo,0,'L');
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
				if($imp['existe_incidencia'] == 'Si')
				{
					$pdf->Ln(3);
					$subtitulo = $pdf->subtitulo('INCIDENCIA');
					$pdf->MultiCell(196,5,$subtitulo,0,'C');
					$subtitulo = $pdf->subtitulo('¿Existe alguna incidencia importante que se deba reportar?');
					$pdf->MultiCell(196,5,$subtitulo,0,'L');
					$contenido = $pdf->contenido($imp['existe_alguna_incidencia']);
					$pdf->MultiCell(196,5,$contenido,0,'J');
				}
				$pdf->Ln(3);
			}
		}

		$pdf->SetFillColor(109,166,51);
		$pdf->Ln(3);
	}

	// "FIN DEL DOCUMENTO"
	$pdf->Output();
?>

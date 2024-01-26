<?php
	require('../fpdf.php');
	require 'conexion.php';
	require 'mc_table.php';

	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('img/concurrentes6.png',0,0,216);
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

			return(utf8_decode($texto));
		}
		// Termina la definición del formato para el texto del documento.
	}
 
	$id_concurrente = $_GET["id"];
	//echo $id_covid;
	
	// "INICIO DEL DOCUMENTO"
	$pdf = new PDF();

	$query = "SELECT * FROM concurrentes_cargados where id_concurrente=$id_concurrente";
	$result = $mysqli->query($query);

	// Se inserta una nueva página en blanco.
	$pdf->AddPage('P','Letter','0');

	// Propiedades para la graficación del documento.
	
	$pdf->SetDrawColor(4,47,65);
	$pdf->SetLineWidth(0.7);

	while($imp = $result->fetch_assoc())
	{
		
		$subtitulo = $pdf->subtitulo('Politica Sectotial ' .$imp['politica_sectorial']);
		$pdf->MultiCell(196,5,$subtitulo,0,'L');
		$pdf->Ln(2);
		$subtitulo = $pdf->subtitulo('Eje ' .$imp['eje']);
		$pdf->MultiCell(196,5,$subtitulo,0,'L');
		$pdf->Ln(2);
		$subtitulo = $pdf->subtitulo('Objetivo Estratégico ' .$imp['estrategico']);
		$pdf->MultiCell(196,5,$subtitulo,0,'L');
		$pdf->Ln(2);
		$subtitulo = $pdf->subtitulo('Objetivo General ' .$imp['general']);
		$pdf->MultiCell(196,5,$subtitulo,0,'L');
		$pdf->Ln(3);
		$subtitulo = $pdf->subtitulo('Nombre del Indicador Tactico:');
		$pdf->MultiCell(196,5,$subtitulo,0,'L');
		$subtitulo = $pdf->subtitulo($imp['indicador']);
		$pdf->MultiCell(196,5,$subtitulo,0,'L');
		//$pdf->Ln(1);
		//$contenido = $pdf->contenido($imp['descripcion']);
		//$pdf->MultiCell(196,5,$contenido,0,'L');
		$pdf->Ln(3);
		$subtitulo = $pdf->subtitulo('Situacion actual:');
		$pdf->MultiCell(196,5,$subtitulo,0,'L');
		$contenido = $pdf->contenido($imp['situacion_actual']);
		$pdf->MultiCell(196,5,$contenido,0,'L');
		$pdf->Ln(3);
		$subtitulo = $pdf->subtitulo('Logro, premio y/o reconocimiento:');
		$pdf->MultiCell(196,5,$subtitulo,0,'L');
		$contenido = $pdf->contenido($imp['logro']);
		$pdf->MultiCell(196,5,$contenido,0,'L');
		$pdf->Ln(3);
		$subtitulo = $pdf->subtitulo('Resultados, Obras y Acciones:');
		$pdf->MultiCell(196,5,$subtitulo,0,'L');
		$contenido = $pdf->contenido('Obra y accion 1:');
		$pdf->MultiCell(196,5,$contenido,0,'L');
		$contenido = $pdf->contenido('	- '.$imp['res1']);
		$pdf->MultiCell(196,5,$contenido,0,'L');
		$pdf->Ln(1);
		if ($imp['res2']!= " ") {
		$contenido = $pdf->contenido('Obra y accion 2:');
		$pdf->MultiCell(196,5,$contenido,0,'L');
		$contenido = $pdf->contenido('	- '.$imp['res2']);
		$pdf->MultiCell(196,5,$contenido,0,'L');
		$pdf->Ln(1);	
		}
		if ($imp['res3']!= NULL) {
			$contenido = $pdf->contenido('Obra y accion 3:');
			$pdf->MultiCell(196,5,$contenido,0,'L');
		$contenido = $pdf->contenido('	- '.$imp['res3']);
		$pdf->MultiCell(196,5,$contenido,0,'L');	
		$pdf->Ln(1);
		}
		if ($imp['res4']!= NULL) {
			$contenido = $pdf->contenido('Obra y accion 4:');
			$pdf->MultiCell(196,5,$contenido,0,'L');
		$contenido = $pdf->contenido('	- '.$imp['res4']);
		$pdf->MultiCell(196,5,$contenido,0,'L');
		$pdf->Ln(1);	
		}
		if ($imp['res5']!= NULL) {
			$contenido = $pdf->contenido('Obra y accion 5:');
			$pdf->MultiCell(196,5,$contenido,0,'L');
		$contenido = $pdf->contenido('	- '.$imp['res5']);
		$pdf->MultiCell(196,5,$contenido,0,'L');
		$pdf->Ln(1);	
		}
		if ($imp['res6']!= NULL) {
			$contenido = $pdf->contenido('Obra y accion 6:');
			$pdf->MultiCell(196,5,$contenido,0,'L');
		$contenido = $pdf->contenido('	- '.$imp['res6']);
		$pdf->MultiCell(196,5,$contenido,0,'L');	
		$pdf->Ln(1);
		}
		if ($imp['res7']!= NULL) {
			$contenido = $pdf->contenido('Obra y accion 7:');
			$pdf->MultiCell(196,5,$contenido,0,'L');
		$contenido = $pdf->contenido('	- '.$imp['res7']);
		$pdf->MultiCell(196,5,$contenido,0,'L');	
		$pdf->Ln(1);
		}
		if ($imp['res8']!= NULL) {
			$contenido = $pdf->contenido('Obra y accion 8:');
			$pdf->MultiCell(196,5,$contenido,0,'L');
		$contenido = $pdf->contenido('	- '.$imp['res8']);
		$pdf->MultiCell(196,5,$contenido,0,'L');	
		$pdf->Ln(1);
		}
			$pdf->Ln(3);
			$subtitulo = $pdf->subtitulo('Lo que sigue:');
			$pdf->MultiCell(196,5,$subtitulo,0,'L');
		if ($imp['sigue1']!= NULL) {	
		$contenido = $pdf->contenido('	- '.$imp['sigue1']);
		$pdf->MultiCell(196,5,$contenido,0,'L');	
		$pdf->Ln(1);
		}
		if ($imp['sigue2']!= NULL) {	
		$contenido = $pdf->contenido('	- '.$imp['sigue2']);
		$pdf->MultiCell(196,5,$contenido,0,'L');	
		$pdf->Ln(1);
		}
		if ($imp['sigue3']!= NULL) {	
		$contenido = $pdf->contenido('	- '.$imp['sigue3']);
		$pdf->MultiCell(196,5,$contenido,0,'L');	
		$pdf->Ln(1);
		}
		
		 $x = $pdf->GetX();
        $y = $pdf->GetY();
		$pdf->Ln(3);
			$subtitulo = $pdf->subtitulo('Linea Base:');
			$pdf->MultiCell(80,5,$subtitulo,0,'L');
			$subtitulo = $pdf->subtitulo('Meta 2022:');
			 $pdf->SetXY($x+80,$y+3);
			$pdf->MultiCell(80,5,$subtitulo,0,'C');
			$subtitulo = $pdf->subtitulo($imp['linea_base']);
			$pdf->MultiCell(80,5,$subtitulo,0,'L');
			$subtitulo = $pdf->subtitulo($imp['meta22']);
			 $pdf->SetXY($x+80,$y+8);
			$pdf->MultiCell(80,5,$subtitulo,0,'C');
			$pdf->Ln(3);
			
			$subtitulo = $pdf->subtitulo('Resultado 2022:');
			$pdf->MultiCell(80,5,$subtitulo,0,'L');
			$subtitulo = $pdf->subtitulo('Meta 2030:');
			 $pdf->SetXY($x+80,$y+16);
			$pdf->MultiCell(80,5,$subtitulo,0,'C');
			$subtitulo = $pdf->subtitulo($imp['resultadocorte1']);
			$pdf->MultiCell(80,5,$subtitulo,0,'L');
			$subtitulo = $pdf->subtitulo($imp['meta30']);
			 $pdf->SetXY($x+80,$y+21);
			$pdf->MultiCell(80,5,$subtitulo,0,'C');
			
/*
			$pdf->Ln(3);
		$subtitulo = $pdf->subtitulo('Descripcion de la evidencia vinculada al indicador:');
		$pdf->MultiCell(196,5,$subtitulo,0,'L');
		$contenido = $pdf->contenido($imp['contiene']);
		$pdf->MultiCell(196,5,$contenido,0,'L');

		$pdf->Ln(3);
		$subtitulo = $pdf->subtitulo('Ubicación electrónica o física de la evidencia, o cómo es posible rastrearla:');
		$pdf->MultiCell(196,5,$subtitulo,0,'L');
		$contenido = $pdf->contenido($imp['rastreo']);
		$pdf->MultiCell(196,5,$contenido,0,'L');

		$pdf->Ln(3);
		$subtitulo = $pdf->subtitulo('Comentarios:');
		$pdf->MultiCell(196,5,$subtitulo,0,'L');
		$contenido = $pdf->contenido($imp['comentarios']);
		$pdf->MultiCell(196,5,$contenido,0,'L');



		
		


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

		*/

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

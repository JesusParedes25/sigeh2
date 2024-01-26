<?php
require('../fpdf.php');
require 'conexion.php';

$id_evidencia = $_GET["id_evidencia"];
$nombre_usuario = $_GET["user"];
$tipo = $_GET["tipo"];
$arr_ids_tac = $_GET["arr_ids_tacticos"];

class PDF_MC_Table extends FPDF
{

	//Cabecera y pie de página
	function Header()
	{
		// Margen del texto del documento.
		$this->SetMargins(8,40,8);
		$this->SetAutoPageBreak(true, 25);
		// Termina definición del margen.

		if($this->PageNo()!=1)
		{
			$this->Image('img/fondo.png', 0, 0, 216, 280);
		}
	}
	
	function Footer()
	{
		$this->SetY(-15);
		// Agregamos la fuente que vamos a ocupar.
		$this->AddFont('Graphik-RegularItalic','','graphikRegularItalic.php');
		$this->SetFont('Graphik-RegularItalic','',8);
		$this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'',0,0,'C' );
	}
	//Fin cabecera y pie de página

	// Formato del texto del documento.
	function titulo($texto)
	{
		// Agregamos la fuente que vamos a ocupar.
		$this->AddFont('Graphik-SemiboldItalic','','graphikSemiboldItalic.php');
		$this->SetTextColor(0,0,0);
		$this->SetFont('Graphik-SemiboldItalic','', 12);
		$this->Row(array(utf8_decode($texto)));
	}

	function subtitulo()
	{
		// Agregamos la fuente que vamos a ocupar.
		$this->AddFont('Graphik-RegularItalic','','graphikRegularItalic.php');
		$this->SetTextColor(130,130,130);
		$this->SetFont('Graphik-RegularItalic','',12);
	}

	function contenido()
	{
		// Agregamos la fuente que vamos a ocupar.
		$this->AddFont('Graphik-Regular','','graphikRegular.php');
		$this->SetTextColor(130,130,130);
		$this->SetFont('Graphik-Regular','',12);
	}
	// Termina definición del formato.

	function columnas($bandera)
	{
		if($bandera=="1")
		{
			$this->SetWidths(array(200));
		}
		else
		{
			$this->SetWidths(array(130,5,60));
		}
	}

	function imp_lugar($arreglo)
	{
		$arr_municipios = "Acatlán,Acaxochitlán,Actopan,Agua Blanca de Iturbide,Ajacuba,Alfajayucan,Almoloya,Apan,Atitalaquia,Atlapexco,Atotonilco de Tula,Atotonilco el Grande,Calnali,Cardonal,Chapantongo,Chapulhuacán,Chilcuautla,Cuautepec de Hinojosa,El Arenal,Eloxochitlán,Emiliano Zapata,Epazoyucan,Francisco I. Madero,Huasca de Ocampo,Huautla,Huazalingo,Huehuetla,Huejutla de Reyes,Huichapan,Ixmiquilpan,Jacala de Ledezma,Jaltocán,Juárez Hidalgo,La Misión,Lolotla,Metepec,Metztitlán,Mineral de la Reforma,Mineral del Chico,Mineral del Monte,Mixquiahuala de Juárez,Molango de Escamilla,Nicolás Flores,Nopala de Villagrán,Omitlán de Juárez,Pachuca de Soto,Pacula,Pisaflores,Progreso de Obregón,San Agustín Metzquititlán,San Agustín Tlaxiaca,San Bartolo Tutotepec,San Felipe Orizatlán,San Salvador,Santiago de Anaya,Santiago Tulantepec de Lugo Guerre,Singuilucan,Tasquillo,Tecozautla,Tenango de Doria,Tepeapulco,Tepehuacán de Guerrero,Tepeji del Río de Ocampo,Tepetitlán,Tetepango,Tezontepec de Aldama,Tianguistengo,Tizayuca,Tlahuelilpan,Tlahuiltepa,Tlanalapa,Tlanchinol,Tlaxcoapan,Tolcayuca,Tula de Allende,Tulancingo de Bravo,Villa de Tezontepec,Xochiatipan,Xochicoatlán,Yahualica,Zacualtipán de angeles,Zapotlán de Juárez,Zempoala,Zimapán";

		$arr_entidades = "Aguascalientes,Baja California,Baja California Sur,Campeche,Chiapas,Chihuahua,Ciudad de México,Coahuila,Colima,Durango,Estado de México,Guanajuato,Guerrero,Hidalgo,Jalisco,Michoacán,Morelos,Nayarit,Nuevo León,Oaxaca,Puebla,Querétaro,Quintana Roo,San Luis Potosí,Sinaloa,Sonora,Tabasco,Tamaulipas,Tlaxcala,Veracruz,Yucatán,Zacatecas";

		$extraer_arr_municipios = explode(',',$arr_municipios);
		$extraer_arr_entidades = explode(',',$arr_entidades);
		$valor = explode(',',$arreglo);
		$valorSeleccion = $valor[0];

		if($valorSeleccion == "Hidalgo")
		{
			$this->Row(array(utf8_decode("Hidalgo")));
		}
		
		else if($valorSeleccion == "Municipios")
		{
			$contadorMuni = 0;
			// La función "count" nos permite contar el número de valores que contiene un arreglo.
			$iteracionMuni = count($valor);
			$iteracionMuni = $iteracionMuni-1;

			for($i=0;$i<$iteracionMuni;$i++)
			{
				for($e=0;$e<84;$e++)
				{
					if($valor[$i+1] == $e)
					{
						$val_arr_muni[$contadorMuni] = $extraer_arr_municipios[$e];
						$contadorMuni = $contadorMuni+1;
					}
				}
			}

			// La función "count" nos permite contar el número de valores que contiene un arreglo.
			$iteracionMuni = count($val_arr_muni);
			$iteracionMuni = $iteracionMuni-1;
			$cont_imp_arreglo = 0;

			for($s=0;$s<$iteracionMuni;$s++)
			{
				if($cont_imp_arreglo == 0)
				{
					$imp_arreglo = $val_arr_muni[$s];
					$cont_imp_arreglo = 1;
				}

				else
					$imp_arreglo = $imp_arreglo.", ".$val_arr_muni[$s];
			}

			$this->Row(array(utf8_decode($imp_arreglo.".")));
		}

		else if($valorSeleccion == "Entidades")
		{
			$contadorEnti = 0;
			// La función "count" nos permite contar el número de valores que contiene un arreglo.
			$iteracionEnti = count($valor);
			$iteracionEnti = $iteracionEnti-1;

			for($i=0;$i<$iteracionEnti;$i++)
			{
				for($e=0;$e<32;$e++)
				{
					if($valor[$i+1] == $e)
					{
						$val_arr_enti[$contadorEnti] = $extraer_arr_entidades[$e];
						$contadorEnti = $contadorEnti+1;
					}
				}
			}

			// La función "count" nos permite contar el número de valores que contiene un arreglo.
			$iteracionEnti = count($val_arr_enti);
			$iteracionEnti = $iteracionEnti-1;
			$cont_imp_arreglo = 0;

			for($s=0;$s<$iteracionEnti;$s++)
			{
				if($cont_imp_arreglo == 0)
				{
					$imp_arreglo = $val_arr_enti[$s];
					$cont_imp_arreglo = 1;
				}

				else
					$imp_arreglo = $imp_arreglo.", ".$val_arr_enti[$s];
			}

			$this->Row(array(utf8_decode($imp_arreglo.".")));
		}

		else
		{
			$this->Row(array(utf8_decode("Localidades")));
		}
	}

	function imp_dependencia($usuario)
	{
		$arr_dependencias = "Secretaría de Contraloría,Secretaría de Cultura,Secretaría de Educación Pública de Hidalgo,Secretaría de Gobierno,Procuraduría General de Justicia del estado de Hidalgo,Secretaría de Movilidad y Transporte,Secretaría de Salud,Secretaría de Turismo,Secretaría del Trabajo y Previsión Social,Secretaría Ejecutiva de la Política Pública,Secretaría de Desarrollo Agropecuario,Secretaría de Desarrollo Económico,Secretaría de Medio Ambiente y Recursos Naturales,Unidad de Planeación y Prospectiva,Oficialía Mayor,Sistema para el Desarrollo Integral de la Familia del Estado de Hidalgo,Secretaria de Finanzas Públicas,Secretaría de Obras Públicas y Ordenamiento Territorial,Seguridad Pública,Secretaría de Desarrollo Social,Museo Interactivo para la Niñez y la Juventud Hidalguense 'El Rehilete',Consejo de Ciencia Tecnología e Innovación de Hidalgo,Secretaría de Movilidad y Transporte";

		$arr_nom_usuario = "CONTRALORIA,SEC_CULTURA,SEP,SEC_GOB,PROCURADURIA,SEC_MOVYTRANS,SEC_SALUD,SEC_TURISMO,SEC_TRABYPS,SEC_EJECUTIVA,SEC_DESAGRO,SEC_DESECON,SEMARNATH,UNI_PLANEA,OFI_MAYOR,DIFH,SEC_FINANZAS,SOPOT,SEC_SEGUP,SEDESO,REHILETE,CITNOVA,STCH";

		$extraer_arr_dependencias = explode(',',$arr_dependencias);
		$extraer_arr_nom_usuario = explode(',',$arr_nom_usuario);

		for($i=0;$i<23;$i++)
		{
			if($usuario == $extraer_arr_nom_usuario[$i])
			{
				$this->RowCenter(array(" "," ",utf8_decode($extraer_arr_dependencias[$i])));
			}
		}
	}

	function imp_organismo($usuario)
	{
		$arr_organismos = "Bachillerato del Estado de Hidalgo|Colegio de Bachilleres del Estado de Hidalgo|Colegio de Educación Profesional Técnica del Estado de Hidalgo|Universidad Intercultural del Estado de Hidalgo|Instituto Tecnológico Superior de Huichapan|Universidad Tecnológica de Tulancingo|Universidad Tecnológica de Mineral de la Reforma|Universidad Tecnológica Minera de Zimapán|Universidad Tecnológica de la Zona Metropolitana del Valle de México|Universidad Tecnológica del Valle del Mezquital|Universidad Tecnológica de Tula Tepeji|Instituto Tecnológico de Estudios Superiores del Oriente del Estado de Hidalgo|Universidad Tecnológica de la Sierra Hidalguense|Instituto Tecnológico Superior del Occidente del Estado de Hidalgo|Universidad Tecnológica de la Huasteca Hidalguense|Universidad Politécnica de Huejutla|Universidad Politécnica de Pachuca|Universidad Politécnica de Tulancingo|Universidad Politécnica de la Energía|Universidad Politécnica de Francisco I. Madero|Universidad Politécnica Metropolitana de Hidalgo|Instituto Hidalguense de Educación para Adultos|Colegio de Estudios Científicos y Tecnológicos del Estado de Hidalgo|Instituto Hidalguense de la Infraestructura Física Educativa|El Colegio del Estado de Hidalgo|Instituto Hidalguense de Financiamiento a la Educación Superior|Instituto Hidalguense del Deporte|Radio y Televisión de Hidalgo|Instituto de Capacitación para el Trabajo del Estado de Hidalgo|Régimen Estatal de Protección Social en Salud de Hidalgo|Servicios de Salud de Hidalgo|Centro Estatal de Maquinaria para el Desarrollo|Comisión Estatal de Vivienda|Comisión Estatal del Agua y Alcantarillado|Comisión de Agua y Alcantarillado de Sistemas Intermunicipales|Comisión  de Agua y Alcantarillado del Sistema Valle del Mezquital|Instituto Hidalguense de las Mujeres|Instituto Hidalguense para el Desarrollo Municipal|Centro de Justicia para Mujeres del Estado de Hidalgo|Operadora de Eventos del Estado de Hidalgo|Administradora de Teatros de la Ciudad San Francisco y Parque David Ben Gurion|Corporación Internacional Hidalgo|Instituto Hidalguense de Competitividad Empresarial|Corporación de Fomento de Infraestructura Industrial|Agencia de Desarrollo Valle de Plata|Agencia de Estatal de Energía|Sistema de Transporte Convencional de Hidalgo|Policía Industrial Bancaria del Estado de Hidalgo|Instituto para la Atención de las y los Adultos Mayores del Estado de Hidalgo|Instituto Catastral del Estado de Hidalgo|Museo Interactivo para la Niñez y la Juventud Hidalguense 'El Rehilete'|Consejo de Ciencia, Tecnología e Innovación de Hidalgo|Consejo Rector de Pachuca Ciudad del Conocimiento y la Cultura|Comisión Estatal para el Desarrollo Sostenible de los Pueblos Indígenas|Consejo Hidalguense de Café|Ciudad de las mujeres|Instituto Hidalguense de la Juventud";

		$arr_nom_usuario = "BACEH,COBAEH,COEPROTEH,UICEH,ITESHU,UTECT,UTMIR,UTMZ,UTVAM,UTVM,UTTT,ITESA,UTSH,ITSOEH,UTHH,UPH,UPP,UPT,UPENERGIA,UPFIM,UPMETRO,IHEA,CECYTEH,INHIFE,COEH,IHFES,INHIDE,RADYTVH,ICATHI,REPSS,SSH,CEN_MAQUIDES,CEVIVIENDA,CEAA,CAASIM,CAASVAM,IHM,IHDM,CENJ_MUJERES,OEEH,AT_FYBG,COINH,IHCE,COFOIN,VALLEPLATA,AE_ENERGIA,STCH,PIBEH,IAAMEH,CATASTRO,REHILETE,CITNOVA,CCYCULTURA,CEDSPI,COHI_CAFE,CMUJERES,IHJ";

		$extraer_arr_organismos = explode('|',$arr_organismos);
		$extraer_arr_nom_usuario = explode(',',$arr_nom_usuario);

		for($i=0;$i<57;$i++)
		{
			if($usuario == $extraer_arr_nom_usuario[$i])
			{
				$this->RowCenter(array(" "," ",utf8_decode($extraer_arr_organismos[$i])));
			}
		}
	}

	var $widths;
	var $aligns;

	function SetWidths($w)
	{
	    //Set the array of column widths
	    $this->widths=$w;
	}

	function SetAligns($a)
	{
	    //Set the array of column alignments
	    $this->aligns=$a;
	}

	function Row($data)
	{
	    //Calculate the height of the row
	    $nb=0;
	    for($i=0;$i<count($data);$i++)
	        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	    $h=5*$nb;
	    //Issue a page break first if needed
	    $this->CheckPageBreak($h);
	    //Draw the cells of the row
	    for($i=0;$i<count($data);$i++)
	    {
	        $w=$this->widths[$i];
	        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'J';
	        //Save the current position
	        $x=$this->GetX();
	        $y=$this->GetY();
	        //Draw the border
	       // $this->Rect($x,$y,$w,$h);
	        //Print the text
	        $this->MultiCell($w,5,$data[$i],0,$a);
	        //Put the position to the right of the cell
	        $this->SetXY($x+$w,$y);
	    }
	    //Go to the next line
	    $this->Ln($h);
	}

	function RowCenter($data)
	{
	    //Calculate the height of the row
	    $nb=0;
	    for($i=0;$i<count($data);$i++)
	        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	    $h=5*$nb;
	    //Issue a page break first if needed
	    $this->CheckPageBreak($h);
	    //Draw the cells of the row
	    for($i=0;$i<count($data);$i++)
	    {
	        $w=$this->widths[$i];
	        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
	        //Save the current position
	        $x=$this->GetX();
	        $y=$this->GetY();
	        //Draw the border
	       // $this->Rect($x,$y,$w,$h);
	        //Print the text
	        $this->MultiCell($w,5,$data[$i],0,$a);
	        //Put the position to the right of the cell
	        $this->SetXY($x+$w,$y);
	    }
	    //Go to the next line
	    $this->Ln($h);
	}

	function CheckPageBreak($h)
	{
	    //If the height h would cause an overflow, add a new page immediately
	    if($this->GetY()+$h>$this->PageBreakTrigger)
	        $this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
	    //Computes the number of lines a MultiCell of width w will take
	    $cw=&$this->CurrentFont['cw'];
	    if($w==0)
	        $w=$this->w-$this->rMargin-$this->x;
	    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	    $s=str_replace("\r",'',$txt);
	    $nb=strlen($s);
	    if($nb>0 and $s[$nb-1]=="\n")
	        $nb--;
	    $sep=-1;
	    $i=0;
	    $j=0;
	    $l=0;
	    $nl=1;
	    while($i<$nb)
	    {
	        $c=$s[$i];
	        if($c=="\n")
	        {
	            $i++;
	            $sep=-1;
	            $j=$i;
	            $l=0;
	            $nl++;
	            continue;
	        }
	        if($c==' ')
	            $sep=$i;
	        $l+=$cw[$c];
	        if($l>$wmax)
	        {
	            if($sep==-1)
	            {
	                if($i==$j)
	                    $i++;
	            }
	            else
	                $i=$sep+1;
	            $sep=-1;
	            $j=$i;
	            $l=0;
	            $nl++;
	        }
	        else
	            $i++;
	    }
	    return $nl;
	}

	function Circle($x, $y, $r, $style='D')
	{
	    $this->Ellipse($x,$y,$r,$r,$style);
	}

	function Ellipse($x, $y, $rx, $ry, $style='D')
	{
	    if($style=='F')
	        $op='f';
	    elseif($style=='FD' || $style=='DF')
	        $op='B';
	    else
	        $op='S';
	    $lx=4/3*(M_SQRT2-1)*$rx;
	    $ly=4/3*(M_SQRT2-1)*$ry;
	    $k=$this->k;
	    $h=$this->h;
	    $this->_out(sprintf('%.2F %.2F m %.2F %.2F %.2F %.2F %.2F %.2F c',
	        ($x+$rx)*$k,($h-$y)*$k,
	        ($x+$rx)*$k,($h-($y-$ly))*$k,
	        ($x+$lx)*$k,($h-($y-$ry))*$k,
	        $x*$k,($h-($y-$ry))*$k));
	    $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c',
	        ($x-$lx)*$k,($h-($y-$ry))*$k,
	        ($x-$rx)*$k,($h-($y-$ly))*$k,
	        ($x-$rx)*$k,($h-$y)*$k));
	    $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c',
	        ($x-$rx)*$k,($h-($y+$ly))*$k,
	        ($x-$lx)*$k,($h-($y+$ry))*$k,
	        $x*$k,($h-($y+$ry))*$k));
	    $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c %s',
	        ($x+$lx)*$k,($h-($y+$ry))*$k,
	        ($x+$rx)*$k,($h-($y+$ly))*$k,
	        ($x+$rx)*$k,($h-$y)*$k,
	        $op));
	}

	function Sector($xc, $yc, $r, $a, $b, $style='FD', $cw=true, $o=90)
    {
        $d0 = $a - $b;
        if($cw){
            $d = $b;
            $b = $o - $a;
            $a = $o - $d;
        }else{
            $b += $o;
            $a += $o;
        }
        while($a<0)
            $a += 360;
        while($a>360)
            $a -= 360;
        while($b<0)
            $b += 360;
        while($b>360)
            $b -= 360;
        if ($a > $b)
            $b += 360;
        $b = $b/360*2*M_PI;
        $a = $a/360*2*M_PI;
        $d = $b - $a;
        if ($d == 0 && $d0 != 0)
            $d = 2*M_PI;
        $k = $this->k;
        $hp = $this->h;
        if (sin($d/2))
            $MyArc = 4/3*(1-cos($d/2))/sin($d/2)*$r;
        else
            $MyArc = 0;
        //first put the center
        $this->_out(sprintf('%.2F %.2F m',($xc)*$k,($hp-$yc)*$k));
        //put the first point
        $this->_out(sprintf('%.2F %.2F l',($xc+$r*cos($a))*$k,(($hp-($yc-$r*sin($a)))*$k)));
        //draw the arc
        if ($d < M_PI/2){
            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
                        $xc+$r*cos($b),
                        $yc-$r*sin($b)
                        );
        }else{
            $b = $a + $d/4;
            $MyArc = 4/3*(1-cos($d/8))/sin($d/8)*$r;
            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
                        $xc+$r*cos($b),
                        $yc-$r*sin($b)
                        );
            $a = $b;
            $b = $a + $d/4;
            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
                        $xc+$r*cos($b),
                        $yc-$r*sin($b)
                        );
            $a = $b;
            $b = $a + $d/4;
            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
                        $xc+$r*cos($b),
                        $yc-$r*sin($b)
                        );
            $a = $b;
            $b = $a + $d/4;
            $this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
                        $yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
                        $xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
                        $yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
                        $xc+$r*cos($b),
                        $yc-$r*sin($b)
                        );
        }
        //terminate drawing
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='b';
        else
            $op='s';
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3 )
    {
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c',
            $x1*$this->k,
            ($h-$y1)*$this->k,
            $x2*$this->k,
            ($h-$y2)*$this->k,
            $x3*$this->k,
            ($h-$y3)*$this->k));
    }

}


if($tipo=="array_ids")
{

	$array = explode(",", $arr_ids_tac);

	$pdf=new PDF_MC_Table();

	// Agregamos las fuentes que vamos a ocupar.
	$pdf->AddFont('Graphik_Semibold','','graphikSemibold.php');
	$pdf->AddFont('Graphik-SemiboldItalic','','graphikSemiboldItalic.php');
	$pdf->AddFont('Graphik-Regular','','graphikRegular.php');
	$pdf->AddFont('Graphik-RegularItalic','','graphikRegularItalic.php');
	$pdf->AddFont('Graphik-Bold','','graphikBold.php');

	for ($i=0; $i < count($array); $i++) 
	{

		$id=$array[$i];

		$query = "SELECT * FROM wp_definicion_evidencias where 	id_indicador_asociado_def= $id";
		$resultado = $mysqli->query($query);

		$pdf->AddPage();

		while($row = $resultado->fetch_assoc())
		{
			// Selección del número de columnas: 3 columnas.
			$pdf->columnas($ban=3);

		// GRÁFICAS
		// Gráfica #1.

			// Círculo de fondo (color gris).
			$pdf->SetFillColor(196,196,196);
			$pdf->Circle(180,90,15,'F');
			// Círculo de porcentaje (color verde).
			$pdf->SetFillColor(130,200,73);
			
			$samy = "ND";

			if($samy/*$row['linea_base_2016']*/=="ND")
			{
				$pdf->Sector(180,90,15,0,0,'F');
				$imp = 0;
			}

			// La función "strpos" nos permite buscar un caracter específico en la cadena indicada, en este caso "%".
			else if(strpos($samy/*$row['linea_base_2016']*/,'%')!==false)
			{
				$valor = explode('%',$samy/*$row['linea_base_2016']*/);
				$valor2 = $valor[0];
				$imp = $valor2;
				$graf = ($valor2*360)/100;
				$pdf->Sector(180,90,15,0,$graf,'F');
			}

			else
			{
				$porcentaje = ($samy/*$row['linea_base_2016']*/*100)/600/*$row['meta_2030']*/;
				// La función "round" nos permite delimitar el número de decimales que queremos imprimir.
				$imp = round($porcentaje, 2);
				$graf = ($porcentaje*360)/100;
				$pdf->Sector(180,90,15,0,$graf,'F');
			}

			// Círculo de más pequeño (color blanco).
			$pdf->SetFillColor(255,255,255);
			$pdf->Circle(180,90,11,'F');
			// Lineas
			$pdf->SetDrawColor(255,255,255);
			$pdf->Line(180,105,180,75);
			$pdf->Line(189,78,171,102);
			$pdf->Line(189,102,171,78);
			$pdf->Line(194,95,166,85);
			$pdf->Line(194,85,166,95);
			// Texto
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Graphik-Bold','',11);
			$pdf->Text(173,91,$imp." "."%");

			$pdf->SetFont('Graphik-Regular','',8.5);
			$pdf->Text(144,89,utf8_decode("Línea base"));
			$pdf->Text(148,92,utf8_decode("2016"));

		// Gráfica #2.

			// Círculo de fondo (color gris).
			$pdf->SetFillColor(196,196,196);
			$pdf->Circle(180,127,15,'F');
			// Círculo de porcentaje (color verde).
			$pdf->SetFillColor(130,200,73);
			
			$samy = "77%";

			if($samy/*$row['avanceinforme2017']*/=="ND")
			{
				$pdf->Sector(180,127,15,0,0,'F');
				$imp = 0;
			}

			// La función "strpos" nos permite buscar un caracter específico en la cadena indicada, en este caso "%".
			else if(strpos($samy/*$row['avanceinforme2017']*/,'%')!==false)
			{
				$valor = explode('%',$samy/*$row['avanceinforme2017']*/);
				$valor2 = $valor[0];
				$imp = $valor2;
				$graf = ($valor2*360)/100;
				$pdf->Sector(180,127,15,0,$graf,'F');
			}

			else
			{
				$porcentaje = ($samy/*$row['avanceinforme2017']*/*100)/600/*$row['meta_2030']*/;
				// La función "round" nos permite delimitar el número de decimales que queremos imprimir.
				$imp = round($porcentaje, 2);
				$graf = ($porcentaje*360)/100;
				$pdf->Sector(180,127,15,0,$graf,'F');
			}

			// Círculo de más pequeño (color blanco).
			$pdf->SetFillColor(255,255,255);
			$pdf->Circle(180,127,11,'F');
			// Lineas
			$pdf->SetDrawColor(255,255,255);
			$pdf->Line(180,142,180,112);
			$pdf->Line(189,115,171,139);
			$pdf->Line(189,139,171,115);
			$pdf->Line(194,132,166,122);
			$pdf->Line(194,122,166,132);
			// Texto
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Graphik-Bold','',11);
			$pdf->Text(173,128,$imp." "."%");

			$pdf->SetFont('Graphik-Regular','',8.5);
			$pdf->Text(144,126,utf8_decode("Resultados"));
			$pdf->Text(148.5,129,utf8_decode("2017"));

		// Gráfica #3.

			// Círculo de fondo (color gris).
			$pdf->SetFillColor(196,196,196);
			$pdf->Circle(180,164,15,'F');
			// Círculo de porcentaje (color verde).
			$pdf->SetFillColor(130,200,73);

			$samy = "230";

			if($samy/*$row['meta_2018']*/=="ND")
			{
				$pdf->Sector(180,164,15,0,0,'F');
				$imp = 0;
			}

			// La función "strpos" nos permite buscar un caracter específico en la cadena indicada, en este caso "%".
			else if(strpos($samy/*$row['meta_2018']*/,'%')!==false)
			{
				$valor = explode('%',$samy/*$row['meta_2018']*/);
				$valor2 = $valor[0];
				$imp = $valor2;
				$graf = ($valor2*360)/100;
				$pdf->Sector(180,164,15,0,$graf,'F');
			}

			else
			{
				$porcentaje = ($samy/*$row['meta_2018']*/*100)/600/*$row['meta_2030']*/;
				// La función "round" nos permite delimitar el número de decimales que queremos imprimir.
				$imp = round($porcentaje, 2);
				$graf = ($porcentaje*360)/100;
				$pdf->Sector(180,164,15,0,$graf,'F');
			}

			// Círculo de más pequeño (color blanco).
			$pdf->SetFillColor(255,255,255);
			$pdf->Circle(180,164,11,'F');
			// Lineas
			$pdf->SetDrawColor(255,255,255);
			$pdf->Line(180,179,180,149);
			$pdf->Line(189,152,171,176);
			$pdf->Line(189,176,171,152);
			$pdf->Line(194,169,166,159);
			$pdf->Line(194,159,166,169);
			// Texto
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Graphik-Bold','',11);
			$pdf->Text(173,165,$imp." "."%");

			$pdf->SetFont('Graphik-Regular','',8.5);
			$pdf->Text(148.2,163,utf8_decode("Meta"));
			$pdf->Text(148.5,166,utf8_decode("2018"));

		// TEXTO
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Graphik_Semibold','',14);
			$pdf->Row(array($row['eje']," "," "));
			$pdf->Ln();
			$pdf->SetFont('Graphik_Semibold','',12);
			$pdf->Row(array(utf8_decode("OBJETIVO ESTRATÉGICO...")," "," "));
			$pdf->Row(array(utf8_decode("OBJETIVO GENERAL...")," "," "));
			$pdf->Ln();
			$pdf->Ln();

			$pdf->titulo("NOMBRE DEL INDICADOR:");
			$pdf->SetFont('Graphik_Semibold','',12);
			$pdf->Row(array($row['nombre_indicador_asociado_def']," "," "));
			$pdf->Ln();

			$pdf->titulo("BULLET DEL LOGRO:");
			$pdf->contenido();
			$pdf->Row(array($row['bullet_logro']," "," "));
			$pdf->Ln();

			$pdf->titulo("LÍNEA DISCURSIVA:");
			$pdf->contenido();
			$pdf->Row(array($row['linea_discursiva']," "," "));
			$pdf->Ln();

			$pdf->titulo("CLASIFICACIÓN DEL INDICADOR:");
			$pdf->contenido();
			$pdf->Row(array($row['indicador_estrella']," "," "));
			$pdf->Ln();

			$pdf->titulo("¿HUBO PREMIO O RECONOCIMIENTO?");
			$pdf->contenido();
			$pdf->Row(array($row['hubo_premio']," "," "));
			$pdf->Ln();

				if($row['hubo_premio']=="Si")  //campos Si
				{
					$pdf->subtitulo();
					$pdf->Row(array(utf8_decode("Premio o reconocimiento:")," "," "));
					$pdf->contenido();
					$pdf->Row(array($row['premio_reconocimiento']," "," "));
					$pdf->Ln();
				}

		// Cambio del número de columnas: De 3 columnas a 1 columna.
			$pdf->columnas($ban=1);
			$pdf->titulo("RESULTADOS, OBRAS Y ACCIONES");
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 1:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado1']));
			$pdf->Ln();
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result1']);
			$pdf->Ln();

			if ($row['resultado2'] != NULL)
			{
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Obras y acciones 2:")));
				$pdf->contenido();
				$pdf->Row(array($row['resultado2']));
				$pdf->Ln();
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Lugar:")));
				$pdf->contenido();
				$pdf->imp_lugar($row['lug_result2']);
				$pdf->Ln();
			}

			if ($row['resultado3'] != NULL)
			{
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Obras y acciones 3:")));
				$pdf->contenido();
				$pdf->Row(array($row['resultado3']));
				$pdf->Ln();
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Lugar:")));
				$pdf->contenido();
				$pdf->imp_lugar($row['lug_result3']);
				$pdf->Ln();
			}

			if ($row['resultado4'] != NULL)
			{
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Obras y acciones 4:")));
				$pdf->contenido();
				$pdf->Row(array($row['resultado4']));
				$pdf->Ln();
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Lugar:")));
				$pdf->contenido();
				$pdf->imp_lugar($row['lug_result4']);
				$pdf->Ln();
			}

			if ($row['resultado5'] != NULL)
			{
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Obras y acciones 5:")));
				$pdf->contenido();
				$pdf->Row(array($row['resultado5']));
				$pdf->Ln();
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Lugar:")));
				$pdf->contenido();
				$pdf->imp_lugar($row['lug_result5']);
				$pdf->Ln();
			}

			if ($row['resultado6'] != NULL)
			{
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Obras y acciones 6:")));
				$pdf->contenido();
				$pdf->Row(array($row['resultado6']));
				$pdf->Ln();
				//$pdf->subtitulo();
				//$pdf->Row(array(utf8_decode("Lugar:")));
				//$pdf->contenido();
				//$pdf->imp_lugar($row['lug_result6']);
				//$pdf->Ln();
			}

			if ($row['resultado7'] != " ")
			{
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Obras y acciones 7:")));
				$pdf->contenido();
				$pdf->Row(array($row['resultado7']));
				$pdf->Ln();
				//$pdf->subtitulo();
				//$pdf->Row(array(utf8_decode("Lugar:")));
				//$pdf->contenido();
				//$pdf->imp_lugar($row['lug_result7']);
				//$pdf->Ln();
			}

			$pdf->titulo("LO QUE SIGUE...");
			$pdf->contenido();
			$pdf->Row(array("-"." ".$row['lo_que_sigue_1']));
			$pdf->Ln();

			if ($row['lo_que_sigue_2'] != NULL)
			{
				$pdf->Row(array("-"." ".$row['lo_que_sigue_2']));
				$pdf->Ln();
			}

			if ($row['lo_que_sigue_3'] != NULL)
			{
				$pdf->Row(array("-"." ".$row['lo_que_sigue_3']));
				$pdf->Ln();
			}

			if ($row['lo_que_sigue_4'] != " ")
			{
				$pdf->Row(array("-"." ".$row['lo_que_sigue_4']));
				$pdf->Ln();
			}

			// -------------------------------------------------------------------------------
			// Valores para gráficas del Segundo Informe de Gobierno.

		// Cambio del número de columnas: De 1 columna a 3 columnas.
			$pdf->columnas($ban=3);
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Graphik-SemiboldItalic','', 12);
			$pdf->Row(array(utf8_decode("LÍNEA BASE 2016:")," ",utf8_decode("RESULTADOS 2017:")));
			$pdf->contenido();
			$pdf->Row(array($row['linea_base_absolutos_def' /*'linea_base_2016'*/]," ",$row['reporte_primer_informe_def' /*'avanceinforme2017'*/]));
			$pdf->Ln();

			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Graphik-SemiboldItalic','', 12);
			$pdf->Row(array(utf8_decode("META 2018:")," ",utf8_decode("RESULTADO REPORTADO 30 DE JULIO 2018:")));
			$pdf->contenido();
			$pdf->Row(array($row['meta_planteada_2018']," ",$row['resultado_2018_2']));
			$pdf->Ln();

			// -------------------------------------------------------------------------------

		// Cambio del número de columnas: De 3 columnas a 1 columna.
			$pdf->columnas($ban=1);
			$pdf->titulo("DESCRIPCIÓN DEL INDICADOR:");
			$pdf->contenido();
			$pdf->Row(array($row['descripcion_indicador_def']));
			$pdf->Ln();

			$pdf->titulo("UNIDAD DE OBSERVACIÓN DEL INDICADOR:");
			$pdf->contenido();
			$pdf->Row(array($row['unidad_observacion_indicador_def']));
			$pdf->Ln();

			$pdf->titulo("DESCRIPCIÓN DE LA UNIDAD DE LA OBSERVACIÓN:");
			$pdf->contenido();
			$pdf->Row(array($row['descripcion_observacion_ficha_tecnica_def']));
			$pdf->Ln();

			$pdf->titulo("TIPO DE INDICADOR:");
			$pdf->contenido();
			$pdf->Row(array($row['tipo_indicador_def']));
			$pdf->Ln();

			$pdf->titulo("TIPO DE EVIDENCIA PRESENTADA:");
			$pdf->contenido();
			$pdf->Row(array($row['tipo_evidencia_def']));
			$pdf->Ln();

			$pdf->titulo("¿POR QUÉ ES UNA EVIDENCIA VINCULADA AL INDICADOR?");
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("(Descripción)")));
			$pdf->contenido();
			$pdf->Row(array($row['descripcion_documento_vinculado_indicador_def']));
			$pdf->Ln();

			$pdf->titulo("FECHA CORTE:");
			$pdf->contenido();
			$pdf->Row(array($row['tipo_evidencia_fecha_def']));
			$pdf->Ln();

			$pdf->titulo("¿EXISTE EXPEDIENTE DOCUMENTAL?");
			$pdf->contenido();
			$pdf->Row(array($row['existe_expediente_doc_def']));
			$pdf->Ln();

				if($row['existe_expediente_doc_def']=="Si")  //campos Si
				{
				// Cambio del número de columnas: De 1 columna a 3 columnas.
					$pdf->columnas($ban=3);
					$pdf->subtitulo();
				  	$pdf->Row(array(utf8_decode("Serie de la evidencia:")," ",utf8_decode("Sección:")));
				  	$pdf->contenido();
				  	$pdf->Row(array($row['serie_evidencia_def']," ",$row['seccion_def']));
				  	$pdf->Ln();

				// Cambio del número de columnas: De 3 columnas a 1 columna.
					$pdf->columnas($ban=1);
				  	$pdf->subtitulo();
				  	$pdf->Row(array(utf8_decode("Guía/Inventario en el que se incluye el expediente:")));
				  	$pdf->contenido();
					$pdf->Row(array($row['guia_invetario_expediente_def']));
					$pdf->Ln();
				}
				else if($row['existe_expediente_doc_def']=="No")
				{
					$pdf->subtitulo();
				  	$pdf->Row(array(utf8_decode("Ubicación electrónica o física de la evidencia, o cómo es posible rastrearla:")));
				  	$pdf->contenido();
					$pdf->Row(array($row['medios_verificacion_evidencia_def']));
					$pdf->Ln();
				}

		  	$pdf->titulo("COMENTARIOS:");
		  	$pdf->contenido();
			$pdf->Row(array($row['comentarios_def']));
			$pdf->Ln();

			/*$pdf->titulo("DOCUMENTO ADJUNTO:");
		  	$pdf->contenido();
			$pdf->Row(array("Nombre del documento"));
			$pdf->Ln();*/

			$pdf->Ln();
			$pdf->Ln();
		// Cambio del número de columnas: De 1 columna a 3 columnas.
			$pdf->columnas($ban=3);
			$pdf->RowCenter(array(" "," ","__________________________________"));
			$pdf->imp_dependencia($row['nombre_dependencia_def']);

			//$pdf->Row(array(utf8_decode("Linea base de acuerdo al tipo de indicador"),"   ",$row['linea_base_tipo_indicador_def']));
		}
	}
}


else if($tipo=="tactico")
{

	$query = "SELECT * FROM wp_definicion_evidencias where 	id_indicador_asociado_def=$id_evidencia";
	$resultado = $mysqli->query($query);

	$pdf=new PDF_MC_Table();
	$pdf->AddPage();

	// Agregamos las fuentes que vamos a ocupar.
	$pdf->AddFont('Graphik_Semibold','','graphikSemibold.php');
	$pdf->AddFont('Graphik-SemiboldItalic','','graphikSemiboldItalic.php');
	$pdf->AddFont('Graphik-Regular','','graphikRegular.php');
	$pdf->AddFont('Graphik-RegularItalic','','graphikRegularItalic.php');
	$pdf->AddFont('Graphik-Bold','','graphikBold.php');

	while($row = $resultado->fetch_assoc())
	{
		// Selección del número de columnas: 1 columna.
		$pdf->columnas($ban=1);

		$pdf->Ln(30);
		$pdf->Image('img/fondoTactico.png', 0, 0, 216, 280);

		$pdf->SetTextColor(0,0,0);

		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array(utf8_decode("POLITICA SECTORIAL ").$row['gabinete_tac']));
		$pdf->Ln();

		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array(utf8_decode("EJE ").$row['eje_ped']));
		$pdf->Ln();

		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array(utf8_decode("OBJETIVO ESTRATÉGICO ").$row['ob_est']));
		$pdf->Ln();

		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array(utf8_decode("OBJETIVO GENERAL ").$row['ob_gen']));
		$pdf->Ln();

		$pdf->titulo("NOMBRE DEL INDICADOR:");
		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array($row['nombre_indicador_asociado_def']));
		$pdf->Ln();

		//$pdf->titulo("DESCRIPCIÓN DEL INDICADOR:");
		//$pdf->contenido();
		//$pdf->Row(array($row['descripcion_indicador_def']));
		//$pdf->Ln();

		//$pdf->titulo("UNIDAD DE OBSERVACIÓN DEL INDICADOR:");
		//$pdf->contenido();
		//$pdf->Row(array($row['unidad_observacion_indicador_def']));
		//$pdf->Ln();

		// INICIO - NUEVOS CAMPOS
		//$pdf->titulo("OBJETIVO SECTORIAL:");
		//$pdf->contenido();
		//$pdf->Row(array($row['ob_secto']));
		//$pdf->Ln();

	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik-SemiboldItalic','',12);
		$pdf->Row(array(utf8_decode("PERIODICIDAD:")," ",utf8_decode("UNIDAD:")));
		$pdf->contenido();
		$pdf->Row(array($row['periodisidad']," ",$row['unidad_observacion_indicador_def']));
		$pdf->Ln();
		// FIN - NUEVOS CAMPOS

	/*	if($row['tipo_indicador_def']!="")
		{
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Graphik-SemiboldItalic','',12);
			$pdf->Row(array(utf8_decode("TENDENCIA ESPERADA:")," ",utf8_decode("TIPO DE INDICADOR:")));
			$pdf->contenido();
			$pdf->Row(array($row['tendencia_esperada_def']," ",$row['tipo_indicador_def']));
			$pdf->Ln();
		}

		else
		{
			$pdf->columnas($ban=1);
			$pdf->titulo("TENDENCIA ESPERADA:");
			$pdf->contenido();
			$pdf->Row(array($row['tendencia_esperada_def']));
			$pdf->Ln();
		} 
			*/
	// Cambio del número de columnas: De 3 columnas a 1 columna.
		$pdf->columnas($ban=1);
		$pdf->titulo("LÍNEA DISCURSIVA:");
		$pdf->contenido();
		$pdf->Row(array($row['linea_discursiva']));
		$pdf->Ln();

		if ($row['bullet_logro'] != NULL)
		{
		$pdf->titulo("LOGRO, PREMIO Y/O RECONOCIMIENTO:");
		$pdf->contenido();
		$pdf->Row(array($row['bullet_logro']));
		$pdf->Ln();
		}

		$pdf->titulo("RESULTADOS, OBRAS Y ACCIONES");
		$pdf->subtitulo();
		$pdf->Row(array(utf8_decode("Obras y acciones 1:")));
		$pdf->contenido();
		$pdf->Row(array($row['resultado1']));
		$pdf->Ln();

		//$pdf->Row(array(utf8_decode("lugar 1:")));
		//$pdf->contenido();
		//$pdf->Row(array($row['lug_result1']));
		//$pdf->Ln();

		//$pdf->subtitulo('Lugares del resultado 1');
		//$pdf->MultiCell(196,5,$subtitulo,0,'L');

		// FILA 14: 
		if($imp['lug_result1'] != "")
		{
			$arrayLugaresId = explode(",", $imp['lug_result1']);
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
		$pdf->Ln();
		/*$pdf->subtitulo();
		$pdf->Row(array(utf8_decode("Lugar:")));
		$pdf->contenido();
		$pdf->imp_lugar($row['lug_result1']);
		$pdf->Ln();*/

		if ($row['resultado2'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 2:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado2']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result2']);
			$pdf->Ln();*/
		}

		if ($row['resultado3'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 3:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado3']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result3']);
			$pdf->Ln();*/
		}

		if ($row['resultado4'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 4:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado4']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result4']);
			$pdf->Ln();*/
		}

		if ($row['resultado5'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 5:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado5']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result5']);
			$pdf->Ln();*/
		}

		if ($row['resultado6'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 6:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado6']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result6']);
			$pdf->Ln();*/
		}

		if ($row['resultado7'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 7:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado7']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result7']);
			$pdf->Ln();*/
		}

		if ($row['resultado8'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 8:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado8']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result8']);
			$pdf->Ln();*/
		}

		/*if ($row['resultado9'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 9:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado9']));
			$pdf->Ln();
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result9']);
			$pdf->Ln();
		}*/
		
		$pdf->titulo("LO QUE SIGUE...");
		$pdf->contenido();
		$pdf->Row(array("-"." ".$row['lo_que_sigue_1']));
		$pdf->Ln();

		if ($row['lo_que_sigue_2'] != NULL)
		{
			$pdf->Row(array("-"." ".$row['lo_que_sigue_2']));
			$pdf->Ln();
		}

		if ($row['lo_que_sigue_3'] != NULL)
		{
			$pdf->Row(array("-"." ".$row['lo_que_sigue_3']));
			$pdf->Ln();
		}

		/*if ($row['lo_que_sigue_4'] != " ")
		{
			$pdf->Row(array("-"." ".$row['lo_que_sigue_4']));
			$pdf->Ln();
		}*/

		// -------------------------------------------------------------------------------
		// Valores para gráficas del Tercer Informe de Gobierno.

	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik-SemiboldItalic','',12);
		$pdf->Row(array(utf8_decode("LÍNEA BASE:")," ",utf8_decode("META 2021:")));
		$pdf->contenido();
		$pdf->Row(array($row['linea_base_tac']," ",$row['meta_2019']));
		$pdf->Ln();

		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik-SemiboldItalic','',12);
		$pdf->Row(array(utf8_decode("RESULTADO QUINTO INFORME 2021:")," ",utf8_decode("AVANCE SOBRE LA META:")));
		$pdf->contenido();
		$pdf->Row(array($row['resultado_19']," ",$row['avance_meta_planeada_def']));
		$pdf->Ln();

		// -------------------------------------------------------------------------------

	// Cambio del número de columnas: De 3 columnas a 1 columna.
		$pdf->columnas($ban=1);

		/*$pdf->titulo("TIPO DE EVIDENCIA PRESENTADA:");
		$pdf->contenido();

			if($row['tipo_evidencia_def']!="")
			{
				$pdf->Row(array($row['tipo_evidencia_def']));
			}

			if($row['tipo_evidencia_otro_def']==0)
			{
				$pdf->Row(array($row['tipo_evidencia_otro_def']));
			}

		$pdf->Ln();*/

		$pdf->titulo("¿POR QUÉ ES UNA EVIDENCIA VINCULADA AL INDICADOR?");
		$pdf->subtitulo();
		$pdf->Row(array(utf8_decode("(Descripción)")));
		$pdf->contenido();
		$pdf->Row(array($row['descripcion_documento_vinculado_indicador_def']));
		$pdf->Ln();

		$pdf->titulo("¿EXISTE EXPEDIENTE DOCUMENTAL?");
		$pdf->contenido();
		$pdf->Row(array($row['existe_expediente_doc_def']));
		$pdf->Ln();

			if($row['existe_expediente_doc_def']=="Si")  //campos Si
			{
			// Cambio del número de columnas: De 1 columna a 3 columnas.
				$pdf->columnas($ban=3);
				$pdf->subtitulo();
			  	$pdf->Row(array(utf8_decode("Serie de la evidencia:")," ",utf8_decode("Sección:")));
			  	$pdf->contenido();
			  	$pdf->Row(array($row['serie_evidencia_def']," ",$row['seccion_def']));
			  	$pdf->Ln();

			// Cambio del número de columnas: De 3 columnas a 1 columna.
				$pdf->columnas($ban=1);
			  	$pdf->Titulo();
			  	$pdf->Row(array(utf8_decode("Guía/Inventario en el que se incluye el expediente:")));
			  	$pdf->contenido();
				$pdf->Row(array($row['guia_invetario_expediente_def']));
				$pdf->Ln();
				//$pdf->Row(array($row['serie_evidencia_def']));
				//$pdf->Ln();
				//$pdf->Row(array($row['seccion_def']));
				//$pdf->Ln();
			}
			else if($row['existe_expediente_doc_def']=="No")
			{
				$pdf->Titulo();
			  	$pdf->Row(array(utf8_decode("Ubicación electrónica o física de la evidencia, o cómo es posible rastrearla:")));
			  	$pdf->contenido();
				$pdf->Row(array($row['medios_verificacion_evidencia_def']));
				$pdf->Ln();
			}

			if($row['comentarios_def']!="")
			{
			  	$pdf->titulo("COMENTARIOS:");
			  	$pdf->contenido();
				$pdf->Row(array($row['comentarios_def']));
				$pdf->Ln();
			}

		/*$pdf->titulo("CLASIFICACIÓN DEL INDICADOR:");
		$pdf->contenido();
		$pdf->Row(array($row['indicador_estrella']));
		$pdf->Ln();

		$pdf->titulo("¿HUBO PREMIO O RECONOCIMIENTO?");
		$pdf->contenido();
		$pdf->Row(array($row['hubo_premio']));
		$pdf->Ln();

			if($row['hubo_premio']=="Si")  //campos Si
			{
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Premio o reconocimiento:")));
				$pdf->contenido();
				$pdf->Row(array($row['premio_reconocimiento']));
				$pdf->Ln();
			}

		$pdf->titulo("DESCRIPCIÓN DE LA UNIDAD DE LA OBSERVACIÓN:");
		$pdf->contenido();
		$pdf->Row(array($row['descripcion_observacion_ficha_tecnica_def']));
		$pdf->Ln();

		$pdf->titulo("FECHA CORTE:");
		$pdf->contenido();
		$pdf->Row(array($row['tipo_evidencia_fecha_def']));
		$pdf->Ln();
		
		$pdf->titulo("DOCUMENTO ADJUNTO:");
	  	$pdf->contenido();
		$pdf->Row(array("Nombre del documento"));
		$pdf->Ln();*/

		$pdf->Ln();
		$pdf->Ln();
	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->RowCenter(array(" "," ","__________________________________"));
		$pdf->imp_dependencia($row['nombre_dependencia_def']);

		//$pdf->Row(array(utf8_decode("Linea base de acuerdo al tipo de indicador"),"   ",$row['linea_base_tipo_indicador_def']));
	}
}


else if($tipo=="estrategicos" || $tipo=="estrategico")
{

	$query = "SELECT * FROM wp_indicadores_estrategicos_definidos where id_ind_estrategico=$id_evidencia";
	$resultado = $mysqli->query($query);

	$pdf=new PDF_MC_Table();
	$pdf->AddPage();

	// Agregamos las fuentes que vamos a ocupar.
	$pdf->AddFont('Graphik_Semibold','','graphikSemibold.php');
	$pdf->AddFont('Graphik-SemiboldItalic','','graphikSemiboldItalic.php');
	$pdf->AddFont('Graphik-Regular','','graphikRegular.php');
	$pdf->AddFont('Graphik-RegularItalic','','graphikRegularItalic.php');

	while($row = $resultado->fetch_assoc())
    {
        // Selección del número de columnas: 1 columna.
        $pdf->columnas($ban=1);

        $pdf->Ln(30);
	$pdf->Image('img/fondoConcurrente.png', 0, 0, 216, 280);

        $pdf->SetTextColor(0,0,0);

        /*
		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array(utf8_decode("EJE: ").$row['eje_ped']));
		$pdf->Ln();
	*/

		if($row['ob_estrategico']!=NULL && $row['ob_estrategico']!="" && $row['ob_estrategico']!=" ")
		{
	        	$pdf->SetFont('Graphik_Semibold','',12);
	        $pdf->Row(array(utf8_decode("POLITICA SECTORIAL: ").$row['gabinete_est']));
			$pdf->Ln();
			$pdf->Row(array(utf8_decode("EJE: ").$row['eje_ped']));
			$pdf->Ln();
			$pdf->Row(array(utf8_decode("OBJETIVO ESTRATÉGICO: ").$row['ob_estrategico']));
			$pdf->Ln();
		}

		$pdf->titulo("NOMBRE DEL INDICADOR:");
		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array($row['nom_indicador']));
		$pdf->Ln();
		/*
		$pdf->titulo("DESCRIPCIÓN DEL INDICADOR:");
		$pdf->contenido();
		$pdf->Row(array($row['descripcion_indicador']));
		$pdf->Ln();
		*/

		$pdf->titulo("LÍNEA DISCURSIVA:");
		$pdf->contenido();
		$pdf->Row(array($row['linea_discursiva']));
		$pdf->Ln();

		
		/* brian
		if($row['linea_discursiva_2']!=NULL && $row['linea_discursiva_2']!="" && $row['linea_discursiva_2']!="")
		{
	        $pdf->titulo("LÍNEA DISCURSIVA 2:");
			$pdf->contenido();
			$pdf->Row(array($row['linea_discursiva_2']));
			$pdf->Ln();
		}

		if($row['linea_discursiva_3']!=NULL && $row['linea_discursiva_3']!="" && $row['linea_discursiva_3']!="")
		{
	        $pdf->titulo("LÍNEA DISCURSIVA 3:");
			$pdf->contenido();
			$pdf->Row(array($row['linea_discursiva_3']));
			$pdf->Ln();
		}

		$pdf->titulo("LOGRO, PREMIO Y/O RECONOCIMIENTO:");
		$pdf->contenido();
		$pdf->Row(array($row['hubo_logro']));
		$pdf->Ln();*/

		if($row['hubo_logro']!="No")  //campos Si
		{
			$pdf->titulo("LOGRO, PREMIO Y/O RECONOCIMIENTO:");
			$pdf->contenido();
			$pdf->Row(array($row['bullet_logro']));
			$pdf->Ln();
		}

		if($row['resultado1']!="")
		{
			$pdf->titulo("RESULTADO 1:");
			$pdf->contenido();
			$pdf->Row(array($row['resultado1']));
			$pdf->Ln();
		}

		if($row['resultado2']!="")
		{
			$pdf->titulo("RESULTADO 2:");
			$pdf->contenido();
			$pdf->Row(array($row['resultado2']));
			$pdf->Ln();
		}

		if($row['resultado3']!="")
		{
			$pdf->titulo("RESULTADO 3:");
			$pdf->contenido();
			$pdf->Row(array($row['resultado3']));
			$pdf->Ln();
		}

		if($row['resultado4']!="")
		{
			$pdf->titulo("RESULTADO 4:");
			$pdf->contenido();
			$pdf->Row(array($row['resultado4']));
			$pdf->Ln();
		}

		if($row['resultado5']!="")
		{
			$pdf->titulo("RESULTADO 5:");
			$pdf->contenido();
			$pdf->Row(array($row['resultado5']));
			$pdf->Ln();
		}
		if($row['est_sig1']!="")
		{
			$pdf->titulo("LO QUE SIGUE:");
			$pdf->contenido();
			$pdf->Row(array($row['est_sig1']));
			$pdf->Ln();
		}
		if($row['est_sig2']!="")
		{
			$pdf->titulo("LO QUE SIGUE 2:");
			$pdf->contenido();
			$pdf->Row(array($row['est_sig2']));
			$pdf->Ln();
		}
		if($row['est_sig3']!="")
		{
			$pdf->titulo("LO QUE SIGUE 2:");
			$pdf->contenido();
			$pdf->Row(array($row['est_sig3']));
			$pdf->Ln();
		}

		/*$pdf->titulo("¿HUBO PREMIO O RECONOCIMIENTO?");
		$pdf->contenido();
		$pdf->Row(array($row['logro_asoc_indicador']));
		$pdf->Ln();

			if($row['logro_asoc_indicador']=="Si")  //campos Si
			{
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Premio o reconocimiento:")));
				$pdf->contenido();
				$pdf->Row(array($row['descripcion_logro']));
				$pdf->Ln();

				if($row['descripcion_logro_2'] != NULL)  //campos Si
				{
					$pdf->subtitulo();
					$pdf->Row(array(utf8_decode("Premio o reconocimiento:")));
					$pdf->contenido();
					$pdf->Row(array($row['descripcion_logro_2']));
					$pdf->Ln();
				}

				if($row['descripcion_logro_3'] != "0")  //campos Si
				{
					$pdf->subtitulo();
					$pdf->Row(array(utf8_decode("Premio o reconocimiento:")));
					$pdf->contenido();
					$pdf->Row(array($row['descripcion_logro_3']));
					$pdf->Ln();
				}
			}*/

		// -------------------------------------------------------------------------------
		// Valores para gráficas del Segundo Informe de Gobierno.
			/*Brian
		$pdf->titulo("LÍNEA BASE:");
		$pdf->contenido();
		$pdf->Row(array($row['linea_base']));
		$pdf->Ln();*/

	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik-SemiboldItalic','', 12);
		$pdf->Row(array(utf8_decode("LINEA BASE INICIAL:")," ",utf8_decode("AÑO INICIAL:")));
		$pdf->contenido();
		$pdf->Row(array($row['linea_base']," ",$row['abase_admon']));
		$pdf->Ln();
/*
		$pdf->columnas($ban=3);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik-SemiboldItalic','', 12);
		$pdf->Row(array(utf8_decode("ULTIMO DATO:")," ",utf8_decode("AÑO:")));
		$pdf->contenido();
		$pdf->Row(array($row['base_aped']," ",$row['abase_aped']));
		$pdf->Ln();
*/


		$pdf->columnas($ban=3);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik-SemiboldItalic','', 12);
		$pdf->Row(array(utf8_decode("META 2022:")," ",utf8_decode("META 2030:")));
		$pdf->contenido();
		$pdf->Row(array($row['meta_2022']," ",$row['meta_2030']));
		$pdf->Ln();

	// Cambio del número de columnas: De 3 columnas a 1 columna.
		/*Brian
		$pdf->columnas($ban=1);
		$pdf->titulo("RESULTADO 2019:");
		$pdf->contenido();		
		$pdf->Row(array($row['result_abril_2018']));
		$pdf->Ln();*/

		// -------------------------------------------------------------------------------

		$pdf->Ln();
		$pdf->Ln();
	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->RowCenter(array(" "," ","__________________________________"));
		$pdf->imp_dependencia($row['dependecia_encargada']);
	}
}


else if($tipo=="pids")
{

	$query = "SELECT * FROM wp_indicadores_pids where id_tactico_pid=$id_evidencia";
	$resultado = $mysqli->query($query);

	$pdf=new PDF_MC_Table();
	$pdf->AddPage();

	// Agregamos las fuentes que vamos a ocupar.
	$pdf->AddFont('Graphik_Semibold','','graphikSemibold.php');
	$pdf->AddFont('Graphik-SemiboldItalic','','graphikSemiboldItalic.php');
	$pdf->AddFont('Graphik-Regular','','graphikRegular.php');
	$pdf->AddFont('Graphik-RegularItalic','','graphikRegularItalic.php');

	while($row = $resultado->fetch_assoc())
	{
		// Selección del número de columnas: 1 columna.
		$pdf->columnas($ban=1);

        	$pdf->Ln(30);
		$pdf->Image('img/fondoPIDS.png', 0, 0, 216, 280);

		$pdf->SetTextColor(0,0,0);

		/*if($row['eje_ped_pid']!="undefined")
		{
			$pdf->SetFont('Graphik_Semibold','',12);
			$pdf->Row(array(utf8_decode("EJE: ").$row['eje_ped_pid']));
			$pdf->Ln();
		}

		if($row['obj_estrategico_pid']!="undefined")
		{
			$pdf->SetFont('Graphik_Semibold','',12);
			$pdf->Row(array(utf8_decode("OBJETIVO ESTRATÉGICO: ").$row['obj_estrategico_pid']));
			$pdf->Ln();
		}

		if($row['obj_general_pid']!="undefined")
		{
			$pdf->SetFont('Graphik_Semibold','',12);
			$pdf->Row(array(utf8_decode("OBJETIVO GENERAL: ").$row['obj_general_pid']));
			$pdf->Ln();
		}*/

		$pdf->titulo("NOMBRE DEL INDICADOR:");
		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array($row['nom_indicador_pid']));
		$pdf->Ln();

		$pdf->titulo("DESCRIPCIÓN DEL INDICADOR:");
		$pdf->contenido();
		$pdf->Row(array($row['descripcion_indicador_pid']));
		$pdf->Ln();

		$pdf->titulo("¿HUBO LOGRO, PREMIO Y/O RECONOCIMIENTO?");
		$pdf->contenido();
		$pdf->Row(array($row['logros_indicador_pid']));
		$pdf->Ln();

			if($row['logros_indicador_pid']=="Si")
			{
				$pdf->titulo("BULLET DEL LOGRO:");
				$pdf->contenido();
				$pdf->Row(array($row['bullet_logro_pid']));
				$pdf->Ln();
			}

		/*$pdf->titulo("¿HUBO PREMIO O RECONOCIMIENTO?");
		$pdf->contenido();
		$pdf->Row(array($row['hubo_premio_pid']));
		$pdf->Ln();

			if($row['hubo_premio_pid']=="Si")
			{
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Premio o reconocimiento:")));
				$pdf->contenido();
				$pdf->Row(array($row['premio_reconocimiento_pid']));
				$pdf->Ln();
			}*/

		$pdf->titulo("RESULTADOS, OBRAS Y ACCIONES");
		$pdf->subtitulo();
		$pdf->Row(array(utf8_decode("Obras y acciones 1:")));
		$pdf->contenido();
		$pdf->Row(array($row['resultado1_pid']));
		$pdf->Ln();
		/*$pdf->subtitulo();
		$pdf->Row(array(utf8_decode("Lugar:")));
		$pdf->contenido();
		$pdf->imp_lugar($row['lug_result1_pid']);
		$pdf->Ln();*/

		if ($row['resultado2_pid'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 2:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado2_pid']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result2_pid']);
			$pdf->Ln();*/
		}

		if ($row['resultado3_pid'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 3:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado3_pid']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result3_pid']);
			$pdf->Ln();*/
		}

		if ($row['resultado4_pid'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 4:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado4_pid']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result4_pid']);
			$pdf->Ln();*/
		}

		if ($row['resultado5_pid'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 5:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado5_pid']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result5_pid']);
			$pdf->Ln();*/
		}

		$pdf->titulo("LO QUE SIGUE...");
		$pdf->contenido();
		$pdf->Row(array("-"." ".$row['lo_que_sigue_1_pid']));
		$pdf->Ln();

		if ($row['lo_que_sigue_2_pid'] != NULL)
		{
			$pdf->Row(array("-"." ".$row['lo_que_sigue_2_pid']));
			$pdf->Ln();
		}

		if ($row['lo_que_sigue_3_pid'] != NULL)
		{
			$pdf->Row(array("-"." ".$row['lo_que_sigue_3_pid']));
			$pdf->Ln();
		}

		if ($row['unidad_observacion_ind_pid'] != NULL)
		{
			$pdf->titulo("UNIDAD DE OBSERVACIÓN DEL INDICADOR:");
			$pdf->contenido();
			$pdf->Row(array($row['unidad_observacion_ind_pid']));
			$pdf->Ln();
		}

		if ($row['descripcion_observacion_ficha_tecnica_def_pid'] != NULL)
		{
			$pdf->titulo("DESCRIPCIÓN DE LA UNIDAD DE LA OBSERVACIÓN:");
			$pdf->contenido();
			$pdf->Row(array($row['descripcion_observacion_ficha_tecnica_def_pid']));
			$pdf->Ln();
		}

		if ($row['tipo_ind_pid'] != NULL)
		{
			$pdf->titulo("TIPO DE INDICADOR:");
			$pdf->contenido();
			$pdf->Row(array($row['tipo_ind_pid']));
			$pdf->Ln();
		}

		if ($row['tendencia_pid'] != NULL)
		{
			$pdf->titulo("TENDENCIA:");
			$pdf->contenido();
			$pdf->Row(array($row['tendencia_pid']));
			$pdf->Ln();
		}

		if ($row['periodicidad_pid'] != NULL)
		{
			$pdf->titulo("PERIODICIDAD:");
			$pdf->contenido();
			$pdf->Row(array($row['periodicidad_pid']));
			$pdf->Ln();
		}

		if ($row['linea_base_absolutos_pid'] != NULL)
		{
			$pdf->titulo("LÍNEA BASE:");
			$pdf->contenido();
			$pdf->Row(array($row['linea_base_absolutos_pid']));
			$pdf->Ln();
		}

		if ($row['obj_esp_prog_inst_pid'] != NULL)
		{
			$pdf->titulo("OBJETIVO ESPECIFICO:");
			$pdf->contenido();
			$pdf->Row(array($row['obj_esp_prog_inst_pid']));
			$pdf->Ln();
		}

		if ($row['fuente_pid'] != NULL)
		{
			$pdf->titulo("FUENTE:");
			$pdf->contenido();
			$pdf->Row(array($row['fuente_pid']));
			$pdf->Ln();
		}

		if ($row['referencias_Adi_pid'] != NULL)
		{
			$pdf->titulo("REFERENCIAS ADICIONALES:");
			$pdf->contenido();
			$pdf->Row(array($row['referencias_Adi_pid']));
			$pdf->Ln();
		}

		if ($row['linea_base_2017_pid'] != NULL)
		{
			$pdf->titulo("LÍNEA BASE 2017:");
			$pdf->contenido();
			$pdf->Row(array($row['linea_base_2017_pid']));
			$pdf->Ln();
		}

		/*if ($row['meta_2018_pid'] != NULL)
		{
			$pdf->titulo("META 2018:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2018_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2019_pid'] != NULL)
		{
			$pdf->titulo("META 2019:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2019_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2020_pid'] != NULL)
		{
			$pdf->titulo("META 2020:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2020_pid']));
			$pdf->Ln();
		}*/

		if ($row['meta_2021_pid'] != NULL)
		{
			$pdf->titulo("META 2021:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2021_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2022_pid'] != NULL)
		{
			$pdf->titulo("META 2022:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2022_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2030_pid'] != NULL)
		{
			$pdf->titulo("META 2030:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2030_pid']));
			$pdf->Ln();
		}

		if ($row['resultado_pid_2018'] != NULL)
		{
			$pdf->titulo("RESULTADO PID 2021:");
			$pdf->contenido();
			$pdf->Row(array($row['resultado_pid_2018']));
			$pdf->Ln();
		}

		if ($row['tipo_evidencia_pid'] != NULL)
		{
			$pdf->titulo("TIPO DE EVIDENCIA:");
			$pdf->contenido();
			$pdf->Row(array($row['tipo_evidencia_pid']));
			$pdf->Ln();
		}

		if ($row['descripcion_evidencia_pid'] != NULL)
		{
			$pdf->titulo("¿QUE CONTIENE LA EVIDENCIA?");
			$pdf->contenido();
			$pdf->Row(array($row['descripcion_evidencia_pid']));
			$pdf->Ln();
		}
/*
		if ($row['fecha_registro_pid_inicio'] != NULL)
		{
			$pdf->titulo("FECHA INICIO DE LA EVIDENCIA:");
			$pdf->contenido();
			$pdf->Row(array($row['fecha_registro_pid_inicio']));
			$pdf->Ln();
		}

		if ($row['fecha_registro_pid_fin'] != NULL)
		{
			$pdf->titulo("FECHA FIN DE LA EVIDENCIA:");
			$pdf->contenido();
			$pdf->Row(array($row['fecha_registro_pid_fin']));
			$pdf->Ln();
		}		
*/
		if ($row['comentarios_pid'] != NULL)
		{
			$pdf->titulo("COMENTARIOS:");
		  	$pdf->contenido();
			$pdf->Row(array($row['comentarios_pid']));
			$pdf->Ln();
		}

		
		$pdf->Ln();
		$pdf->Ln();
	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->RowCenter(array(" "," ","__________________________________"));
		$pdf->imp_organismo($row['nombre_usuario_pid']);
	}
}


else if($tipo=="pids2019")
{

	$query = "SELECT * FROM wp_indicadores_pids2019 where id_tactico_pid=$id_evidencia";
	$resultado = $mysqli->query($query);

	$pdf=new PDF_MC_Table();
	$pdf->AddPage();

	// Agregamos las fuentes que vamos a ocupar.
	$pdf->AddFont('Graphik_Semibold','','graphikSemibold.php');
	$pdf->AddFont('Graphik-SemiboldItalic','','graphikSemiboldItalic.php');
	$pdf->AddFont('Graphik-Regular','','graphikRegular.php');
	$pdf->AddFont('Graphik-RegularItalic','','graphikRegularItalic.php');

	while($row = $resultado->fetch_assoc())
	{
		// Selección del número de columnas: 1 columna.
		$pdf->columnas($ban=1);

        	$pdf->Ln(30);
		$pdf->Image('img/fondoPIDS_2019.png', 0, 0, 216, 280);

		$pdf->SetTextColor(0,0,0);

		if($row['eje_ped_pid']!="undefined")
		{
			$pdf->SetFont('Graphik_Semibold','',12);
			$pdf->Row(array(utf8_decode("EJE: ").$row['eje_ped_pid']));
			$pdf->Ln();
		}

		if($row['obj_estrategico_pid']!="undefined")
		{
			$pdf->SetFont('Graphik_Semibold','',12);
			$pdf->Row(array(utf8_decode("OBJETIVO ESTRATÉGICO: ").$row['obj_estrategico_pid']));
			$pdf->Ln();
		}

		if($row['obj_general_pid']!="undefined")
		{
			$pdf->SetFont('Graphik_Semibold','',12);
			$pdf->Row(array(utf8_decode("OBJETIVO GENERAL: ").$row['obj_general_pid']));
			$pdf->Ln();
		}

		$pdf->titulo("NOMBRE DEL INDICADOR:");
		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array($row['nom_indicador_pid']));
		$pdf->Ln();

		$pdf->titulo("DESCRIPCIÓN DEL INDICADOR:");
		$pdf->contenido();
		$pdf->Row(array($row['descripcion_indicador_pid']));
		$pdf->Ln();

		$pdf->titulo("¿HUBO LOGRO, PREMIO Y/O RECONOCIMIENTO?");
		$pdf->contenido();
		$pdf->Row(array($row['logros_indicador_pid']));
		$pdf->Ln();

			if($row['logros_indicador_pid']=="Si")
			{
				$pdf->titulo("BULLET DEL LOGRO:");
				$pdf->contenido();
				$pdf->Row(array($row['bullet_logro_pid']));
				$pdf->Ln();
			}

		/*$pdf->titulo("¿HUBO PREMIO O RECONOCIMIENTO?");
		$pdf->contenido();
		$pdf->Row(array($row['hubo_premio_pid']));
		$pdf->Ln();

			if($row['hubo_premio_pid']=="Si")
			{
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Premio o reconocimiento:")));
				$pdf->contenido();
				$pdf->Row(array($row['premio_reconocimiento_pid']));
				$pdf->Ln();
			}*/

		$pdf->titulo("RESULTADOS, OBRAS Y ACCIONES");
		$pdf->subtitulo();
		$pdf->Row(array(utf8_decode("Obras y acciones 1:")));
		$pdf->contenido();
		$pdf->Row(array($row['resultado1_pid']));
		$pdf->Ln();
		/*$pdf->subtitulo();
		$pdf->Row(array(utf8_decode("Lugar:")));
		$pdf->contenido();
		$pdf->imp_lugar($row['lug_result1_pid']);
		$pdf->Ln();*/

		if ($row['resultado2_pid'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 2:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado2_pid']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result2_pid']);
			$pdf->Ln();*/
		}

		if ($row['resultado3_pid'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 3:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado3_pid']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result3_pid']);
			$pdf->Ln();*/
		}

		if ($row['resultado4_pid'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 4:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado4_pid']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result4_pid']);
			$pdf->Ln();*/
		}

		if ($row['resultado5_pid'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 5:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado5_pid']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result5_pid']);
			$pdf->Ln();*/
		}

		$pdf->titulo("LO QUE SIGUE...");
		$pdf->contenido();
		$pdf->Row(array("-"." ".$row['lo_que_sigue_1_pid']));
		$pdf->Ln();

		if ($row['lo_que_sigue_2_pid'] != NULL)
		{
			$pdf->Row(array("-"." ".$row['lo_que_sigue_2_pid']));
			$pdf->Ln();
		}

		if ($row['lo_que_sigue_3_pid'] != NULL)
		{
			$pdf->Row(array("-"." ".$row['lo_que_sigue_3_pid']));
			$pdf->Ln();
		}

		if ($row['unidad_observacion_ind_pid'] != NULL)
		{
			$pdf->titulo("UNIDAD DE OBSERVACIÓN DEL INDICADOR:");
			$pdf->contenido();
			$pdf->Row(array($row['unidad_observacion_ind_pid']));
			$pdf->Ln();
		}

		if ($row['descripcion_observacion_ficha_tecnica_def_pid'] != NULL)
		{
			$pdf->titulo("DESCRIPCIÓN DE LA UNIDAD DE LA OBSERVACIÓN:");
			$pdf->contenido();
			$pdf->Row(array($row['descripcion_observacion_ficha_tecnica_def_pid']));
			$pdf->Ln();
		}

		if ($row['tipo_ind_pid'] != NULL)
		{
			$pdf->titulo("TIPO DE INDICADOR:");
			$pdf->contenido();
			$pdf->Row(array($row['tipo_ind_pid']));
			$pdf->Ln();
		}

		if ($row['tendencia_pid'] != NULL)
		{
			$pdf->titulo("TENDENCIA:");
			$pdf->contenido();
			$pdf->Row(array($row['tendencia_pid']));
			$pdf->Ln();
		}

		if ($row['linea_base_absolutos_pid'] != NULL)
		{
			$pdf->titulo("LÍNEA BASE:");
			$pdf->contenido();
			$pdf->Row(array($row['linea_base_absolutos_pid']));
			$pdf->Ln();
		}

		if ($row['obj_esp_prog_inst_pid'] != NULL)
		{
			$pdf->titulo("OBJETIVO ESPECIFICO:");
			$pdf->contenido();
			$pdf->Row(array($row['obj_esp_prog_inst_pid']));
			$pdf->Ln();
		}

		if ($row['fuente_pid'] != NULL)
		{
			$pdf->titulo("FUENTE:");
			$pdf->contenido();
			$pdf->Row(array($row['fuente_pid']));
			$pdf->Ln();
		}

		if ($row['referencias_Adi_pid'] != NULL)
		{
			$pdf->titulo("REFERENCIAS ADICIONALES:");
			$pdf->contenido();
			$pdf->Row(array($row['referencias_Adi_pid']));
			$pdf->Ln();
		}

		if ($row['linea_base_2017_pid'] != NULL)
		{
			$pdf->titulo("LÍNEA BASE 2017:");
			$pdf->contenido();
			$pdf->Row(array($row['linea_base_2017_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2018_pid'] != NULL)
		{
			$pdf->titulo("META 2018:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2018_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2019_pid'] != NULL)
		{
			$pdf->titulo("META 2019:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2019_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2020_pid'] != NULL)
		{
			$pdf->titulo("META 2020:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2020_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2021_pid'] != NULL)
		{
			$pdf->titulo("META 2021:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2021_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2022_pid'] != NULL)
		{
			$pdf->titulo("META 2022:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2022_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2030_pid'] != NULL)
		{
			$pdf->titulo("META 2030:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2030_pid']));
			$pdf->Ln();
		}

		if ($row['resultado_pid_2018'] != NULL)
		{
			$pdf->titulo("RESULTADO PID 2019:");
			$pdf->contenido();
			$pdf->Row(array($row['resultado_pid_2018']));
			$pdf->Ln();
		}

		if ($row['tipo_evidencia_pid'] != NULL)
		{
			$pdf->titulo("TIPO DE EVIDENCIA:");
			$pdf->contenido();
			$pdf->Row(array($row['tipo_evidencia_pid']));
			$pdf->Ln();
		}

		if ($row['descripcion_evidencia_pid'] != NULL)
		{
			$pdf->titulo("¿QUE CONTIENE LA EVIDENCIA?");
			$pdf->contenido();
			$pdf->Row(array($row['descripcion_evidencia_pid']));
			$pdf->Ln();
		}

		if ($row['fecha_registro_pid_inicio'] != NULL)
		{
			$pdf->titulo("FECHA INICIO DE LA EVIDENCIA:");
			$pdf->contenido();
			$pdf->Row(array($row['fecha_registro_pid_inicio']));
			$pdf->Ln();
		}

		if ($row['fecha_registro_pid_fin'] != NULL)
		{
			$pdf->titulo("FECHA FIN DE LA EVIDENCIA:");
			$pdf->contenido();
			$pdf->Row(array($row['fecha_registro_pid_fin']));
			$pdf->Ln();
		}

		$pdf->titulo("¿EXISTE EXPEDIENTE DOCUMENTAL?");
		$pdf->contenido();
		$pdf->Row(array($row['existe_expediente_doc_pid']));
		$pdf->Ln();

			if($row['existe_expediente_doc_pid']=="Si")
			{
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Serie de la evidencia:")));
				$pdf->contenido();
				$pdf->Row(array($row['serie_evidencia_pid']));
				$pdf->Ln();

				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Sección:")));
				$pdf->contenido();
				$pdf->Row(array($row['seccion_pid']));
				$pdf->Ln();
			}

		if ($row['guia_invetario_expediente_pid'] != NULL)
		{
			$pdf->titulo("GUÍA/INVENTARIO EN LA QUE SE INCLUYE EL EXPEDIENTE:");
			$pdf->contenido();
			$pdf->Row(array($row['guia_invetario_expediente_pid']));
			$pdf->Ln();
		}

		if ($row['comentarios_pid'] != NULL)
		{
			$pdf->titulo("COMENTARIOS:");
		  	$pdf->contenido();
			$pdf->Row(array($row['comentarios_pid']));
			$pdf->Ln();
		}

		if ($row['periodicidad_pid'] != NULL)
		{
			$pdf->titulo("PERIODICIDAD:");
			$pdf->contenido();
			$pdf->Row(array($row['periodicidad_pid']));
			$pdf->Ln();
		}

		$pdf->Ln();
		$pdf->Ln();
	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->RowCenter(array(" "," ","__________________________________"));
		$pdf->imp_organismo($row['nombre_usuario_pid']);
	}
}

else if($tipo=="pids2020")
{

	$query = "SELECT * FROM wp_indicadores_pids2020 where id_tactico_pid=$id_evidencia";
	$resultado = $mysqli->query($query);

	$pdf=new PDF_MC_Table();
	$pdf->AddPage();

	// Agregamos las fuentes que vamos a ocupar.
	$pdf->AddFont('Graphik_Semibold','','graphikSemibold.php');
	$pdf->AddFont('Graphik-SemiboldItalic','','graphikSemiboldItalic.php');
	$pdf->AddFont('Graphik-Regular','','graphikRegular.php');
	$pdf->AddFont('Graphik-RegularItalic','','graphikRegularItalic.php');

	while($row = $resultado->fetch_assoc())
	{
		// Selección del número de columnas: 1 columna.
		$pdf->columnas($ban=1);

        	$pdf->Ln(30);
		$pdf->Image('img/fondoPIDS2020.png', 0, 0, 216, 280);

		$pdf->SetTextColor(0,0,0);

		if($row['eje_ped_pid']!="undefined")
		{
			$pdf->SetFont('Graphik_Semibold','',12);
			$pdf->Row(array(utf8_decode("EJE: ").$row['eje_ped_pid']));
			$pdf->Ln();
		}

		if($row['obj_estrategico_pid']!="undefined")
		{
			$pdf->SetFont('Graphik_Semibold','',12);
			$pdf->Row(array(utf8_decode("OBJETIVO ESTRATÉGICO: ").$row['obj_estrategico_pid']));
			$pdf->Ln();
		}

		if($row['obj_general_pid']!="undefined")
		{
			$pdf->SetFont('Graphik_Semibold','',12);
			$pdf->Row(array(utf8_decode("OBJETIVO GENERAL: ").$row['obj_general_pid']));
			$pdf->Ln();
		}

		$pdf->titulo("NOMBRE DEL INDICADOR:");
		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array($row['nom_indicador_pid']));
		$pdf->Ln();

		$pdf->titulo("DESCRIPCIÓN DEL INDICADOR:");
		$pdf->contenido();
		$pdf->Row(array($row['descripcion_indicador_pid']));
		$pdf->Ln();

		$pdf->titulo("¿HUBO LOGRO, PREMIO Y/O RECONOCIMIENTO?");
		$pdf->contenido();
		$pdf->Row(array($row['logros_indicador_pid']));
		$pdf->Ln();

			if($row['logros_indicador_pid']=="Si")
			{
				$pdf->titulo("BULLET DEL LOGRO:");
				$pdf->contenido();
				$pdf->Row(array($row['bullet_logro_pid']));
				$pdf->Ln();
			}

		/*$pdf->titulo("¿HUBO PREMIO O RECONOCIMIENTO?");
		$pdf->contenido();
		$pdf->Row(array($row['hubo_premio_pid']));
		$pdf->Ln();

			if($row['hubo_premio_pid']=="Si")
			{
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Premio o reconocimiento:")));
				$pdf->contenido();
				$pdf->Row(array($row['premio_reconocimiento_pid']));
				$pdf->Ln();
			}*/

		$pdf->titulo("RESULTADOS, OBRAS Y ACCIONES");
		$pdf->subtitulo();
		$pdf->Row(array(utf8_decode("Obras y acciones 1:")));
		$pdf->contenido();
		$pdf->Row(array($row['resultado1_pid']));
		$pdf->Ln();
		/*$pdf->subtitulo();
		$pdf->Row(array(utf8_decode("Lugar:")));
		$pdf->contenido();
		$pdf->imp_lugar($row['lug_result1_pid']);
		$pdf->Ln();*/

		if ($row['resultado2_pid'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 2:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado2_pid']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result2_pid']);
			$pdf->Ln();*/
		}

		if ($row['resultado3_pid'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 3:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado3_pid']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result3_pid']);
			$pdf->Ln();*/
		}

		if ($row['resultado4_pid'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 4:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado4_pid']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result4_pid']);
			$pdf->Ln();*/
		}

		if ($row['resultado5_pid'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 5:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado5_pid']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result5_pid']);
			$pdf->Ln();*/
		}

		$pdf->titulo("LO QUE SIGUE...");
		$pdf->contenido();
		$pdf->Row(array("-"." ".$row['lo_que_sigue_1_pid']));
		$pdf->Ln();

		if ($row['lo_que_sigue_2_pid'] != NULL)
		{
			$pdf->Row(array("-"." ".$row['lo_que_sigue_2_pid']));
			$pdf->Ln();
		}

		if ($row['lo_que_sigue_3_pid'] != NULL)
		{
			$pdf->Row(array("-"." ".$row['lo_que_sigue_3_pid']));
			$pdf->Ln();
		}

		if ($row['unidad_observacion_ind_pid'] != NULL)
		{
			$pdf->titulo("UNIDAD DE OBSERVACIÓN DEL INDICADOR:");
			$pdf->contenido();
			$pdf->Row(array($row['unidad_observacion_ind_pid']));
			$pdf->Ln();
		}

		if ($row['descripcion_observacion_ficha_tecnica_def_pid'] != NULL)
		{
			$pdf->titulo("DESCRIPCIÓN DE LA UNIDAD DE LA OBSERVACIÓN:");
			$pdf->contenido();
			$pdf->Row(array($row['descripcion_observacion_ficha_tecnica_def_pid']));
			$pdf->Ln();
		}

		if ($row['tipo_ind_pid'] != NULL)
		{
			$pdf->titulo("TIPO DE INDICADOR:");
			$pdf->contenido();
			$pdf->Row(array($row['tipo_ind_pid']));
			$pdf->Ln();
		}

		if ($row['tendencia_pid'] != NULL)
		{
			$pdf->titulo("TENDENCIA:");
			$pdf->contenido();
			$pdf->Row(array($row['tendencia_pid']));
			$pdf->Ln();
		}

		if ($row['linea_base_absolutos_pid'] != NULL)
		{
			$pdf->titulo("LÍNEA BASE:");
			$pdf->contenido();
			$pdf->Row(array($row['linea_base_absolutos_pid']));
			$pdf->Ln();
		}

		if ($row['obj_esp_prog_inst_pid'] != NULL)
		{
			$pdf->titulo("OBJETIVO ESPECIFICO:");
			$pdf->contenido();
			$pdf->Row(array($row['obj_esp_prog_inst_pid']));
			$pdf->Ln();
		}

		if ($row['fuente_pid'] != NULL)
		{
			$pdf->titulo("FUENTE:");
			$pdf->contenido();
			$pdf->Row(array($row['fuente_pid']));
			$pdf->Ln();
		}

		if ($row['referencias_Adi_pid'] != NULL)
		{
			$pdf->titulo("REFERENCIAS ADICIONALES:");
			$pdf->contenido();
			$pdf->Row(array($row['referencias_Adi_pid']));
			$pdf->Ln();
		}

		if ($row['linea_base_2017_pid'] != NULL)
		{
			$pdf->titulo("LÍNEA BASE 2017:");
			$pdf->contenido();
			$pdf->Row(array($row['linea_base_2017_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2018_pid'] != NULL)
		{
			$pdf->titulo("META 2018:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2018_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2019_pid'] != NULL)
		{
			$pdf->titulo("META 2019:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2019_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2020_pid'] != NULL)
		{
			$pdf->titulo("META 2020:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2020_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2021_pid'] != NULL)
		{
			$pdf->titulo("META 2021:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2021_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2022_pid'] != NULL)
		{
			$pdf->titulo("META 2022:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2022_pid']));
			$pdf->Ln();
		}

		if ($row['meta_2030_pid'] != NULL)
		{
			$pdf->titulo("META 2030:");
			$pdf->contenido();
			$pdf->Row(array($row['meta_2030_pid']));
			$pdf->Ln();
		}

		if ($row['resultado_pid_2018'] != NULL)
		{
			$pdf->titulo("RESULTADO PID 2019:");
			$pdf->contenido();
			$pdf->Row(array($row['resultado_pid_2018']));
			$pdf->Ln();
		}

		if ($row['tipo_evidencia_pid'] != NULL)
		{
			$pdf->titulo("TIPO DE EVIDENCIA:");
			$pdf->contenido();
			$pdf->Row(array($row['tipo_evidencia_pid']));
			$pdf->Ln();
		}

		if ($row['descripcion_evidencia_pid'] != NULL)
		{
			$pdf->titulo("¿QUE CONTIENE LA EVIDENCIA?");
			$pdf->contenido();
			$pdf->Row(array($row['descripcion_evidencia_pid']));
			$pdf->Ln();
		}

		if ($row['fecha_registro_pid_inicio'] != NULL)
		{
			$pdf->titulo("FECHA INICIO DE LA EVIDENCIA:");
			$pdf->contenido();
			$pdf->Row(array($row['fecha_registro_pid_inicio']));
			$pdf->Ln();
		}

		if ($row['fecha_registro_pid_fin'] != NULL)
		{
			$pdf->titulo("FECHA FIN DE LA EVIDENCIA:");
			$pdf->contenido();
			$pdf->Row(array($row['fecha_registro_pid_fin']));
			$pdf->Ln();
		}

		$pdf->titulo("¿EXISTE EXPEDIENTE DOCUMENTAL?");
		$pdf->contenido();
		$pdf->Row(array($row['existe_expediente_doc_pid']));
		$pdf->Ln();

			if($row['existe_expediente_doc_pid']=="Si")
			{
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Serie de la evidencia:")));
				$pdf->contenido();
				$pdf->Row(array($row['serie_evidencia_pid']));
				$pdf->Ln();

				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Sección:")));
				$pdf->contenido();
				$pdf->Row(array($row['seccion_pid']));
				$pdf->Ln();
			}

		if ($row['guia_invetario_expediente_pid'] != NULL)
		{
			$pdf->titulo("GUÍA/INVENTARIO EN LA QUE SE INCLUYE EL EXPEDIENTE:");
			$pdf->contenido();
			$pdf->Row(array($row['guia_invetario_expediente_pid']));
			$pdf->Ln();
		}

		if ($row['comentarios_pid'] != NULL)
		{
			$pdf->titulo("COMENTARIOS:");
		  	$pdf->contenido();
			$pdf->Row(array($row['comentarios_pid']));
			$pdf->Ln();
		}

		if ($row['periodicidad_pid'] != NULL)
		{
			$pdf->titulo("PERIODICIDAD:");
			$pdf->contenido();
			$pdf->Row(array($row['periodicidad_pid']));
			$pdf->Ln();
		}

		$pdf->Ln();
		$pdf->Ln();
	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->RowCenter(array(" "," ","__________________________________"));
		$pdf->imp_organismo($row['nombre_usuario_pid']);
	}
}

else if($tipo=="concurrentes")
{

	$query = "SELECT * FROM wp_definicion_evidencias where 	id_indicador_asociado_def=$id_evidencia";
	$resultado = $mysqli->query($query);

	$pdf=new PDF_MC_Table();
	$pdf->AddPage();

	// Agregamos las fuentes que vamos a ocupar.
	$pdf->AddFont('Graphik_Semibold','','graphikSemibold.php');
	$pdf->AddFont('Graphik-SemiboldItalic','','graphikSemiboldItalic.php');
	$pdf->AddFont('Graphik-Regular','','graphikRegular.php');
	$pdf->AddFont('Graphik-RegularItalic','','graphikRegularItalic.php');
	$pdf->AddFont('Graphik-Bold','','graphikBold.php');

	while($row = $resultado->fetch_assoc())
	{
		// Selección del número de columnas: 1 columna.
		$pdf->columnas($ban=1);

		$pdf->Ln(30);
		$pdf->Image('img/fondoConcurrente.png', 0, 0, 216, 280);

		$pdf->SetTextColor(0,0,0);

		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array(utf8_decode("POLITICA SECTORIAL ").$row['gabinete_tac']));
		$pdf->Ln();

		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array(utf8_decode("EJE ").$row['eje_ped']));
		$pdf->Ln();

		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array(utf8_decode("OBJETIVO ESTRATÉGICO ").$row['ob_est']));
		$pdf->Ln();

		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array(utf8_decode("OBJETIVO GENERAL ").$row['ob_gen']));
		$pdf->Ln();

		$pdf->titulo("NOMBRE DEL INDICADOR:");
		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array($row['nombre_indicador_asociado_def']));
		$pdf->Ln();

		//$pdf->titulo("DESCRIPCIÓN DEL INDICADOR:");
		//$pdf->contenido();
		//$pdf->Row(array($row['descripcion_indicador_def']));
		//$pdf->Ln();

		//$pdf->titulo("UNIDAD DE OBSERVACIÓN DEL INDICADOR:");
		//$pdf->contenido();
		//$pdf->Row(array($row['unidad_observacion_indicador_def']));
		//$pdf->Ln();

		// INICIO - NUEVOS CAMPOS
		//$pdf->titulo("OBJETIVO SECTORIAL:");
		//$pdf->contenido();
		//$pdf->Row(array($row['ob_secto']));
		//$pdf->Ln();

	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik-SemiboldItalic','',12);
		$pdf->Row(array(utf8_decode("PERIODICIDAD:")," ",utf8_decode("UNIDAD:")));
		$pdf->contenido();
		$pdf->Row(array($row['periodisidad']," ",$row['unidad_observacion_indicador_def']));
		$pdf->Ln();
		// FIN - NUEVOS CAMPOS

	/*	if($row['tipo_indicador_def']!="")
		{
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Graphik-SemiboldItalic','',12);
			$pdf->Row(array(utf8_decode("TENDENCIA ESPERADA:")," ",utf8_decode("TIPO DE INDICADOR:")));
			$pdf->contenido();
			$pdf->Row(array($row['tendencia_esperada_def']," ",$row['tipo_indicador_def']));
			$pdf->Ln();
		}

		else
		{
			$pdf->columnas($ban=1);
			$pdf->titulo("TENDENCIA ESPERADA:");
			$pdf->contenido();
			$pdf->Row(array($row['tendencia_esperada_def']));
			$pdf->Ln();
		} 
			*/
	// Cambio del número de columnas: De 3 columnas a 1 columna.
		$pdf->columnas($ban=1);
		$pdf->titulo("LÍNEA DISCURSIVA:");
		$pdf->contenido();
		$pdf->Row(array($row['linea_discursiva']));
		$pdf->Ln();

		if ($row['bullet_logro'] != NULL)
		{
		$pdf->titulo("LOGRO, PREMIO Y/O RECONOCIMIENTO:");
		$pdf->contenido();
		$pdf->Row(array($row['bullet_logro']));
		$pdf->Ln();
		}

		$pdf->titulo("RESULTADOS, OBRAS Y ACCIONES");
		$pdf->subtitulo();
		$pdf->Row(array(utf8_decode("Obras y acciones 1:")));
		$pdf->contenido();
		$pdf->Row(array($row['resultado1']));
		$pdf->Ln();

		//$pdf->Row(array(utf8_decode("lugar 1:")));
		//$pdf->contenido();
		//$pdf->Row(array($row['lug_result1']));
		//$pdf->Ln();

		//$pdf->subtitulo('Lugares del resultado 1');
		//$pdf->MultiCell(196,5,$subtitulo,0,'L');

		// FILA 14: 
		if($imp['lug_result1'] != "")
		{
			$arrayLugaresId = explode(",", $imp['lug_result1']);
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
		$pdf->Ln();
		/*$pdf->subtitulo();
		$pdf->Row(array(utf8_decode("Lugar:")));
		$pdf->contenido();
		$pdf->imp_lugar($row['lug_result1']);
		$pdf->Ln();*/

		if ($row['resultado2'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 2:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado2']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result2']);
			$pdf->Ln();*/
		}

		if ($row['resultado3'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 3:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado3']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result3']);
			$pdf->Ln();*/
		}

		if ($row['resultado4'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 4:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado4']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result4']);
			$pdf->Ln();*/
		}

		if ($row['resultado5'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 5:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado5']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result5']);
			$pdf->Ln();*/
		}

		if ($row['resultado6'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 6:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado6']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result6']);
			$pdf->Ln();*/
		}

		if ($row['resultado7'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 7:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado7']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result7']);
			$pdf->Ln();*/
		}

		if ($row['resultado8'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 8:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado8']));
			$pdf->Ln();
			/*$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result8']);
			$pdf->Ln();*/
		}

		/*if ($row['resultado9'] != NULL)
		{
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Obras y acciones 9:")));
			$pdf->contenido();
			$pdf->Row(array($row['resultado9']));
			$pdf->Ln();
			$pdf->subtitulo();
			$pdf->Row(array(utf8_decode("Lugar:")));
			$pdf->contenido();
			$pdf->imp_lugar($row['lug_result9']);
			$pdf->Ln();
		}*/
		
		$pdf->titulo("LO QUE SIGUE...");
		$pdf->contenido();
		$pdf->Row(array("-"." ".$row['lo_que_sigue_1']));
		$pdf->Ln();

		if ($row['lo_que_sigue_2'] != NULL)
		{
			$pdf->Row(array("-"." ".$row['lo_que_sigue_2']));
			$pdf->Ln();
		}

		if ($row['lo_que_sigue_3'] != NULL)
		{
			$pdf->Row(array("-"." ".$row['lo_que_sigue_3']));
			$pdf->Ln();
		}

		/*if ($row['lo_que_sigue_4'] != " ")
		{
			$pdf->Row(array("-"." ".$row['lo_que_sigue_4']));
			$pdf->Ln();
		}*/

		// -------------------------------------------------------------------------------
		// Valores para gráficas del Tercer Informe de Gobierno.

	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik-SemiboldItalic','',12);
		$pdf->Row(array(utf8_decode("LÍNEA BASE:")," ",utf8_decode("META 2021:")));
		$pdf->contenido();
		$pdf->Row(array($row['linea_base_tac']," ",$row['meta_2019']));
		$pdf->Ln();

		/*$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik-SemiboldItalic','',12);
		$pdf->Row(array(utf8_decode("RESULTADO QUINTO INFORME 2021:")," ",utf8_decode("AVANCE SOBRE LA META:")));
		$pdf->contenido();
		$pdf->Row(array($row['resultado_19']," ",$row['avance_meta_planeada_def']));
		$pdf->Ln();*/

		// -------------------------------------------------------------------------------

	// Cambio del número de columnas: De 3 columnas a 1 columna.
		$pdf->columnas($ban=1);

		/*$pdf->titulo("TIPO DE EVIDENCIA PRESENTADA:");
		$pdf->contenido();

			if($row['tipo_evidencia_def']!="")
			{
				$pdf->Row(array($row['tipo_evidencia_def']));
			}

			if($row['tipo_evidencia_otro_def']==0)
			{
				$pdf->Row(array($row['tipo_evidencia_otro_def']));
			}

		$pdf->Ln();*/

		$pdf->titulo("¿POR QUÉ ES UNA EVIDENCIA VINCULADA AL INDICADOR?");
		$pdf->subtitulo();
		$pdf->Row(array(utf8_decode("(Descripción)")));
		$pdf->contenido();
		$pdf->Row(array($row['descripcion_documento_vinculado_indicador_def']));
		$pdf->Ln();

		$pdf->titulo("¿EXISTE EXPEDIENTE DOCUMENTAL?");
		$pdf->contenido();
		$pdf->Row(array($row['existe_expediente_doc_def']));
		$pdf->Ln();

			if($row['existe_expediente_doc_def']=="Si")  //campos Si
			{
			// Cambio del número de columnas: De 1 columna a 3 columnas.
				$pdf->columnas($ban=3);
				$pdf->subtitulo();
			  	$pdf->Row(array(utf8_decode("Serie de la evidencia:")," ",utf8_decode("Sección:")));
			  	$pdf->contenido();
			  	$pdf->Row(array($row['serie_evidencia_def']," ",$row['seccion_def']));
			  	$pdf->Ln();

			// Cambio del número de columnas: De 3 columnas a 1 columna.
				$pdf->columnas($ban=1);
			  	$pdf->Titulo();
			  	$pdf->Row(array(utf8_decode("Guía/Inventario en el que se incluye el expediente:")));
			  	$pdf->contenido();
				$pdf->Row(array($row['guia_invetario_expediente_def']));
				$pdf->Ln();
				//$pdf->Row(array($row['serie_evidencia_def']));
				//$pdf->Ln();
				//$pdf->Row(array($row['seccion_def']));
				//$pdf->Ln();
			}
			else if($row['existe_expediente_doc_def']=="No")
			{
				$pdf->Titulo();
			  	$pdf->Row(array(utf8_decode("Ubicación electrónica o física de la evidencia, o cómo es posible rastrearla:")));
			  	$pdf->contenido();
				$pdf->Row(array($row['medios_verificacion_evidencia_def']));
				$pdf->Ln();
			}

			if($row['comentarios_def']!="")
			{
			  	$pdf->titulo("COMENTARIOS:");
			  	$pdf->contenido();
				$pdf->Row(array($row['comentarios_def']));
				$pdf->Ln();
			}

		/*$pdf->titulo("CLASIFICACIÓN DEL INDICADOR:");
		$pdf->contenido();
		$pdf->Row(array($row['indicador_estrella']));
		$pdf->Ln();

		$pdf->titulo("¿HUBO PREMIO O RECONOCIMIENTO?");
		$pdf->contenido();
		$pdf->Row(array($row['hubo_premio']));
		$pdf->Ln();

			if($row['hubo_premio']=="Si")  //campos Si
			{
				$pdf->subtitulo();
				$pdf->Row(array(utf8_decode("Premio o reconocimiento:")));
				$pdf->contenido();
				$pdf->Row(array($row['premio_reconocimiento']));
				$pdf->Ln();
			}

		$pdf->titulo("DESCRIPCIÓN DE LA UNIDAD DE LA OBSERVACIÓN:");
		$pdf->contenido();
		$pdf->Row(array($row['descripcion_observacion_ficha_tecnica_def']));
		$pdf->Ln();

		$pdf->titulo("FECHA CORTE:");
		$pdf->contenido();
		$pdf->Row(array($row['tipo_evidencia_fecha_def']));
		$pdf->Ln();
		
		$pdf->titulo("DOCUMENTO ADJUNTO:");
	  	$pdf->contenido();
		$pdf->Row(array("Nombre del documento"));
		$pdf->Ln();*/

		$pdf->Ln();
		$pdf->Ln();
	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->RowCenter(array(" "," ","__________________________________"));
		$pdf->imp_dependencia($row['nombre_dependencia_def']);

		//$pdf->Row(array(utf8_decode("Linea base de acuerdo al tipo de indicador"),"   ",$row['linea_base_tipo_indicador_def']));
	}
}


else if($tipo=="acc_sn_indicador")
{

	$query = "SELECT * FROM wp_acciones_sin_indicador where id_accion_sin_ind=$id_evidencia";
	$resultado = $mysqli->query($query);

	$pdf=new PDF_MC_Table();
	$pdf->AddPage();

	// Agregamos las fuentes que vamos a ocupar.
	$pdf->AddFont('Graphik_Semibold','','graphikSemibold.php');
	$pdf->AddFont('Graphik-SemiboldItalic','','graphikSemiboldItalic.php');
	$pdf->AddFont('Graphik-Regular','','graphikRegular.php');
	$pdf->AddFont('Graphik-RegularItalic','','graphikRegularItalic.php');

	while($row = $resultado->fetch_assoc())
	{
		// Selección del número de columnas: 1 columna.
		$pdf->columnas($ban=1);

		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik_Semibold','',14);
		$pdf->Row(array($row['eje_principal']));
		$pdf->Ln();
		$pdf->SetFont('Graphik_Semibold','',12);
		$pdf->Row(array($row['objetivo_est']));
		$pdf->Row(array($row['objetivo_gen']));
		$pdf->Ln();
		$pdf->Ln();

		$pdf->titulo("ACCIÓN:");
		$pdf->contenido();
		$pdf->Row(array($row['accion_1']));
		$pdf->Ln();

		$pdf->titulo("FECHA DE REGISTRO:");
		$pdf->contenido();
		$pdf->Row(array($row['fecha_registro']));
		$pdf->Ln();

		$pdf->Ln();
		$pdf->Ln();
	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->RowCenter(array(" "," ","__________________________________"));
		$pdf->imp_dependencia($row['dependencia']);
	}
}


else if($tipo=="avance_prog")
{

	$query = "SELECT * FROM wp_avance_programatico where id_avance_programatico=$id_evidencia";
	$resultado = $mysqli->query($query);

	$pdf=new PDF_MC_Table();
	$pdf->AddPage();

	// Agregamos las fuentes que vamos a ocupar.
	$pdf->AddFont('Graphik_Semibold','','graphikSemibold.php');
	$pdf->AddFont('Graphik-SemiboldItalic','','graphikSemiboldItalic.php');
	$pdf->AddFont('Graphik-Regular','','graphikRegular.php');
	$pdf->AddFont('Graphik-RegularItalic','','graphikRegularItalic.php');

	while($row = $resultado->fetch_assoc())
	{
		// Selección del número de columnas: 1 columna.
		$pdf->columnas($ban=1);

		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik_Semibold','',14);
		$pdf->Row(array($row['eje']));
		$pdf->Ln();
		$pdf->Ln();

		$pdf->titulo("SECTOR:");
		$pdf->contenido();
		$pdf->Row(array($row['sector_fin']));
		$pdf->Ln();

		$pdf->titulo("NOMBRE DEL PROGRAMA PRESUPUESTARIO:");
		$pdf->contenido();
		$pdf->Row(array($row['nom_prog_presupuestario']));
		$pdf->Ln();

		$pdf->titulo("UNIDAD PRESUPUESTAL:");
		$pdf->contenido();
		$pdf->Row(array($row['unidad_pres_fin']));
		$pdf->Ln();

		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik_Semibold','',14);
		$pdf->Row(array(utf8_decode("PRESUPUESTO ASIGNADO")));
		$pdf->Ln();

		$pdf->titulo("2018:");
		$pdf->contenido();
		$pdf->Row(array($row['presupuesto_a']));
		$pdf->Ln();
		$pdf->Ln();

	// IMPRESIÓN DEL NIVEL FIN.

		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik_Semibold','',14);
		$pdf->Row(array($row['nivel_fin']));
		$pdf->contenido();
		$pdf->Row(array("______________________________________________________________________________________________________________________"));
		$pdf->Ln();

		$pdf->titulo("NOMBRE DEL INDICADOR:");
		$pdf->contenido();
		$pdf->Row(array($row['indicador_fin']));
		$pdf->Ln();

	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik-SemiboldItalic','', 12);
		$pdf->Row(array(utf8_decode("META PROGRAMADA 2018:")," ",utf8_decode("RESULTADO 2do TMS 2018:")));
		$pdf->contenido();
		$pdf->Row(array($row['meta_prog_2018_fin']," ",$row['result_estim_30_jun_fin']));
		$pdf->Ln();

	// Cambio del número de columnas: De 3 columnas a 1 columna.
		$pdf->columnas($ban=1);
		$pdf->titulo("% AVANCE DE LA META:");
		$pdf->contenido();
		$pdf->Row(array($row['avance_fin_meta_2018']));
		$pdf->Ln();
		$pdf->Ln();

	// IMPRESIÓN DEL NIVEL PROPÓSITO.

		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik_Semibold','',14);
		$pdf->Row(array($row['nivel_prop']));
		$pdf->contenido();
		$pdf->Row(array("______________________________________________________________________________________________________________________"));
		$pdf->Ln();

		$pdf->titulo("NOMBRE DEL INDICADOR:");
		$pdf->contenido();
		$pdf->Row(array($row['indicador_prop']));
		$pdf->Ln();

	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Graphik-SemiboldItalic','', 12);
		$pdf->Row(array(utf8_decode("META PROGRAMADA 2018:")," ",utf8_decode("RESULTADO 2do TMS 2018:")));
		$pdf->contenido();
		$pdf->Row(array($row['meta_prog_2018_prop']," ",$row['result_estim_30_jun_prop']));
		$pdf->Ln();

	// Cambio del número de columnas: De 3 columnas a 1 columna.
		$pdf->columnas($ban=1);
		$pdf->titulo("% AVANCE DE LA META:");
		$pdf->contenido();
		$pdf->Row(array($row['avance_porc_meta_2018']));
		$pdf->Ln();

		$pdf->Ln();
		$pdf->Ln();
	// Cambio del número de columnas: De 1 columna a 3 columnas.
		$pdf->columnas($ban=3);
		$pdf->RowCenter(array(" "," ","__________________________________"));
		$pdf->imp_dependencia($row['nomb_dependencia']);
	}
}


else if($tipo=="acuse")
{

	$archivo_n = $_GET["archivo_name"];

	$query = "SELECT  nombre_indicador_asociado_def,wp_archivos_dependencias.id_archivo,wp_archivos_dependencias.date,wp_archivos_dependencias.dependecia,wp_archivos_dependencias.indicador,wp_archivos_dependencias.filename
	FROM wp_definicion_evidencias INNER JOIN wp_archivos_dependencias ON wp_definicion_evidencias.id_indicador_asociado_def = wp_archivos_dependencias.indicador WHERE wp_archivos_dependencias.indicador=$id_evidencia";



	//$query = "SELECT * FROM wp_archivos_dependencias where indicador=$id_evidencia";
	$resultado = $mysqli->query($query);

	$pdf=new PDF_MC_Table();
	$pdf->AddPage();

	// Agregamos las fuentes que vamos a ocupar.
	$pdf->AddFont('Graphik_Semibold','','graphikSemibold.php');
	$pdf->AddFont('Graphik-SemiboldItalic','','graphikSemiboldItalic.php');
	$pdf->AddFont('Graphik-Regular','','graphikRegular.php');
	$pdf->AddFont('Graphik-RegularItalic','','graphikRegularItalic.php');

	while($row = $resultado->fetch_assoc())
	{
		if($archivo_n==$row['id_archivo'])
		{
			// Selección del número de columnas: 1 columna.

			// Rectángulo blanco que tapa el texto de "Resumen".
		$pdf->SetFillColor(255,255,255);
		$pdf->Rect(95,22,26,10,'F');

		$pdf->SetFillColor(4,47,65);
		$pdf->Rect(0,62,216,10,'F');

		$pdf->SetTextColor(255,255,255);
		$pdf->SetFont('Graphik-SemiboldItalic','', 14);
		$pdf->Cell(0,5,'ARCHIVOS ADJUNTOS AL INDICADOR',0,0,'C');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->columnas($ban=1);

		$pdf->titulo("Fecha de subida:");
		$pdf->contenido();
		$pdf->Row(array($row['date']));
		$pdf->Ln();
		$pdf->Ln();

		$pdf->titulo("Dependencia:");
		$pdf->contenido();
		$pdf->Row(array($row['dependecia']));
		$pdf->Ln();
		$pdf->Ln();

		$pdf->titulo("Indicador:");
		$pdf->contenido();
		$pdf->Row(array($row['nombre_indicador_asociado_def']));
		$pdf->Ln();
		$pdf->Ln();

		$pdf->titulo("Nombre del archivo:");
		$pdf->contenido();
		$pdf->Row(array($row['filename']));
		$pdf->Ln();
		$pdf->Ln();

		}
		
	}
}



$pdf->Output();
?>

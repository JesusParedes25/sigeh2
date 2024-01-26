<?php
require('../fpdf.php');
//require 'conexion.php';

class myDBC {
    public $mysqli = null;
 
    public function __construct() {
 
        include_once "dbconfig.php";
        $this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
 
        if ($this->mysqli->connect_errno) {
            echo "Error MySQLi: ("&nbsp. $this->mysqli->connect_errno.") " . $this->mysqli->connect_error;
            exit();
        }
        $this->mysqli->set_charset("utf8");
    }
 
    public function __destruct() {
        $this->CloseDB();
    }
 
    public function runQuery($qry) {
        $result = $this->mysqli->query($qry);
        return $result;
    }
 
    public function seleccionar_datos()
    {
        $q = 'select programa, res_17, inv_17, res_18, inv_18, res_19, inv_19, res_20, inv_20, res_21, inv_21, res_22, inv_22 from avance';
 
        $result = $this->mysqli->query($q);
 
        //Array asociativo que contendrá los datos
        $valores = array();
 
        if( $result->num_rows == 0)
        {
            echo'<script type="text/javascript">
                alert("ningun registro");
                </script>';
        }
 
        else{
 
            while($row = mysqli_fetch_assoc($result))
            {
                //Se crea un arreglo asociativo
                array_push($valores, $row);
            }
        }
        //Regresa array asociativo
        return $valores;
    }
}
 
class PDF extends FPDF
{

    function titulo($texto)
        {
            // Agregamos la fuente que vamos a ocupar.
            $this->AddFont('Graphik-Bold','','graphikBold.php');
            //$this->SetFillColor(2,157,116);//Fondo verde de celda
            $this->SetTextColor(255,255,255); //Letra color blanco
            $this->SetFont('Graphik-Bold','',12);

            return(utf8_decode($texto));
        }

        function subtitulo($texto)
        {
            // Agregamos la fuente que vamos a ocupar.
            $this->AddFont('Graphik-Bold','','graphikBold.php');
            $this->SetFillColor(2,157,116);//Fondo verde de celda
            $this->SetTextColor(240, 255, 240); //Letra color blanco
            $this->SetFont('Graphik-Bold','',9);
            
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

    function cabeceraHorizontal($cabecera)
    {
        $this->SetXY(10, 30);
        //$this->AddFont('Graphik-Bold','','graphikBold.php');
        $this->SetFont('Arial','B',8);
        $this->SetFillColor(2,157,116);//Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
        $ejeX = 10;
        foreach($cabecera as $fila)
        {
            //$this->RoundedRect($ejeX, 30, 320, 15, 0, 'FD');
            //$this->CellFit(20,7, utf8_decode($fila),0, 0 , 'J');
            $ejeX = $ejeX + 20;
        }
    }
 
    function datosHorizontal($datos)
    {
        $this->SetXY(10,45);
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        $ejeY = 45; //Aquí se encuentra la primer CellFitSpace e irá incrementando
        $letra = 'D'; //'D' Dibuja borde de cada CellFitSpace -- 'FD' Dibuja borde y rellena
        foreach($datos as $fila)
        {
            //Por cada 3 CellFitSpace se crea un RoundedRect encimado
            //El parámetro $letra de RoundedRect cambiará en cada iteración
            //para colocar FD y D, la primera iteración es D
            //Solo la celda de enmedio llevará bordes, izquierda y derecha
            //Las celdas laterales colocarlas sin borde
            $this->RoundedRect(10, $ejeY, 320, 20, 0, $letra);
            //$this->CellFitSpace(40,7, utf8_decode($fila['id_user']),0, 0 , 'L' );
            //$this->CellFit(20,7, utf8_decode($fila['programa']),0, 0 , 'J' );
            $this->CellFitSpace(110,20, utf8_decode($fila['programa']),0, 0 , 'L' );
            $this->CellFitSpace(15,20, utf8_decode($fila['res_17']),'LR', 0 , 'C' );
            $this->CellFitSpace(20,20, utf8_decode($fila['inv_17']),0, 0 , 'L' );
            $this->CellFitSpace(15,20, utf8_decode($fila['res_18']),'LR', 0 , 'C' );
            $this->CellFitSpace(20,20, utf8_decode($fila['inv_18']),0, 0 , 'L' );
            $this->CellFitSpace(15,20, utf8_decode($fila['res_19']),'LR', 0 , 'C' );
            $this->CellFitSpace(20,20, utf8_decode($fila['inv_19']),0, 0 , 'L' );
            $this->CellFitSpace(15,20, utf8_decode($fila['res_20']),'LR', 0 , 'C' );
            $this->CellFitSpace(20,20, utf8_decode($fila['inv_20']),0, 0 , 'L' );
            $this->CellFitSpace(15,20, utf8_decode($fila['res_21']),'LR', 0 , 'C' );
            $this->CellFitSpace(20,20, utf8_decode($fila['inv_21']),0, 0 , 'L' );
            $this->CellFitSpace(15,20, utf8_decode($fila['res_22']),'LR', 0 , 'C' );
            $this->CellFitSpace(20,20, utf8_decode($fila['inv_22']),0, 0 , 'L' );
 
            $this->Ln();
            //Condición ternaria que cambia el valor de $letra
            ($letra == 'D') ? $letra = 'FD' : $letra = 'D';
            //Aumenta la siguiente posición de Y (recordar que X es fijo)
            //Se suma 7 porque cada celda tiene esa altura
            $ejeY = $ejeY + 20;
        }
    }
 
    function tablaHorizontal($cabeceraHorizontal, $datosHorizontal)
    {
        $this->cabeceraHorizontal($cabeceraHorizontal);
        $this->datosHorizontal($datosHorizontal);
    }
 
    //**************************************************************************************************************
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='J', $fill=false, $link='', $scale=true, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);
 
        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;
 
        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }
 
        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
 
        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }
 
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }
 
    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }
//**********************************************************************************************
 
 function RoundedRect($x, $y, $w, $h, $r, $style = '', $angle = '1234')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' or $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2f %.2f m', ($x+$r)*$k, ($hp-$y)*$k ));
 
        $xc = $x+$w-$r;
        $yc = $y+$r;
        $this->_out(sprintf('%.2f %.2f l', $xc*$k, ($hp-$y)*$k ));
        if (strpos($angle, '2')===false)
            $this->_out(sprintf('%.2f %.2f l', ($x+$w)*$k, ($hp-$y)*$k ));
        else
            $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
 
        $xc = $x+$w-$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2f %.2f l', ($x+$w)*$k, ($hp-$yc)*$k));
        if (strpos($angle, '3')===false)
            $this->_out(sprintf('%.2f %.2f l', ($x+$w)*$k, ($hp-($y+$h))*$k));
        else
            $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
 
        $xc = $x+$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2f %.2f l', $xc*$k, ($hp-($y+$h))*$k));
        if (strpos($angle, '4')===false)
            $this->_out(sprintf('%.2f %.2f l', ($x)*$k, ($hp-($y+$h))*$k));
        else
            $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
 
        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2f %.2f l', ($x)*$k, ($hp-$yc)*$k ));
        if (strpos($angle, '1')===false)
        {
            $this->_out(sprintf('%.2f %.2f l', ($x)*$k, ($hp-$y)*$k ));
            $this->_out(sprintf('%.2f %.2f l', ($x+$r)*$k, ($hp-$y)*$k ));
        }
        else
            $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }
 
    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2f %.2f %.2f %.2f %.2f %.2f c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }
} // FIN Class PDF


$seleccion = new myDBC();
 
$datosReporte = $seleccion->seleccionar_datos();
 
$pdf = new PDF();
 
$pdf->AddPage('L','Legal');

        
        $pdf->Ln(3);
        $pdf->Ln(3);
        $titulo = $pdf->titulo('COMPARATIVO AVANCE ANUAL');
        $pdf->MultiCell(320,8,$titulo,0,'C',true);
        $pdf->Ln(6);
        
        $x = $pdf->GetX();
        $y = $pdf->GetY();
        $subtitulo = $pdf->subtitulo('PROGRAMA');
        $pdf->MultiCell(110,15,$subtitulo,1,'L',true);
        $pdf->SetXY($x+110,$y);
        $subtitulo = $pdf->subtitulo('Datos Informe 2017');
        $pdf->MultiCell(35,8,$subtitulo,1,'L',true);
        $subtitulo = $pdf->subtitulo('Resultado/Inversion');
        $pdf->SetXY($x+110,$y+8);
        $pdf->MultiCell(35,7,$subtitulo,1,'L',true);
        $pdf->SetXY($x+145,$y);
        $subtitulo = $pdf->subtitulo('Datos Informe 2018');
        $pdf->MultiCell(35,8,$subtitulo,1,'L',true);
        $subtitulo = $pdf->subtitulo('Resultado/Inversion');
        $pdf->SetXY($x+145,$y+8);
        $pdf->MultiCell(35,7,$subtitulo,1,'L',true);
        $pdf->SetXY($x+180,$y);
        $subtitulo = $pdf->subtitulo('Datos Informe 2019');
        $pdf->MultiCell(35,8,$subtitulo,1,'L',true);
        $subtitulo = $pdf->subtitulo('Resultado/Inversion');
        $pdf->SetXY($x+180,$y+8);
        $pdf->MultiCell(35,7,$subtitulo,1,'L',true);
        $pdf->SetXY($x+215,$y);
        $subtitulo = $pdf->subtitulo('Datos Informe 2020');
        $pdf->MultiCell(35,8,$subtitulo,1,'L',true);
        $subtitulo = $pdf->subtitulo('Resultado/Inversion');
        $pdf->SetXY($x+215,$y+8);
        $pdf->MultiCell(35,7,$subtitulo,1,'L',true);
        $pdf->SetXY($x+250,$y);
        $subtitulo = $pdf->subtitulo('Datos Informe 2021');
        $pdf->MultiCell(35,8,$subtitulo,1,'L',true);
        $subtitulo = $pdf->subtitulo('Resultado/Inversion');
        $pdf->SetXY($x+250,$y+8);
        $pdf->MultiCell(35,7,$subtitulo,1,'L',true);
        $pdf->SetXY($x+285,$y);
        $subtitulo = $pdf->subtitulo('Datos Informe 2022');
        $pdf->MultiCell(35,8,$subtitulo,1,'L',true);
        $subtitulo = $pdf->subtitulo('Resultado/Inversion');
        $pdf->SetXY($x+285,$y+8);
        $pdf->MultiCell(35,7,$subtitulo,1,'L',true);
        
        
 
$miCabecera = array(' ');
 
$pdf->tablaHorizontal($miCabecera, $datosReporte);
 
$pdf->Output(); //Salida al navegador
?>
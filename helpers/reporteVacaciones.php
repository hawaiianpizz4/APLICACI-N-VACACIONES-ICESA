<?php
require 'fpdf/fpdf.php';
require '../model/infoPersonal.php';
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(1);
    // Títulov
	$this->SetFillColor(230,230,230);
    $this->Multicell(190,7,"ICESA S.A\nSOLICITUD DE VACACIONES",1,'C',TRUE); 
    $this->Ln();
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//variables
$fechaSolicita = $_GET["fechaSolicita"];
$desde = $_GET["desde"];
$hasta= $_GET["hasta"];
$regreso = date("d/m/Y", strtotime( str_replace("/","-",$hasta)."+ 1 day"));
$dias =  $_GET["dias"];
$cedula =  $_GET["cedula"];
$infoPersonal = infoPersonal::infoPersonaluser($cedula);
$nombres = utf8_decode($infoPersonal[0]["nombres"]);
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(230,230,230);
$pdf->Line(10, 37, 210-10, 37);
$pdf->Cell(35,6,'FECHA DE SOLICITUD :',1,0,'L',true);
$pdf->Cell(40,6,$desde,0,0,'C');
$pdf->Cell(35,6,'FECHA DE INGRESO :',1,0,'L',true);
$pdf->Cell(40,6,$hasta,0,0,'C');
$pdf->Cell(35,6,'QUITO',0,1,'R');
$pdf->Ln();
$pdf->Line(10,49, 210-40, 49);
$pdf->Cell(35,6,'NOMBRE COMPLETOS :',1,0,'L',true);
$pdf->Cell(40,6,utf8_decode($infoPersonal[0]["nombres"]),0,0,'c');
$pdf->Cell(88,6,'CIUDAD :',0,0,'R');
$pdf->Cell(0,6,utf8_decode($infoPersonal[0]["ciudad"]),0,1,'R');
$pdf->Ln();
$pdf->Line(10,61, 210-10, 61);
$pdf->Cell(14,6,'CARGO :',1,0,'C',true);
$pdf->Cell(40,6,utf8_decode($infoPersonal[0]["cargo"]),0,0,'L');
$pdf->Cell(15,6,'',0,0,'C');
$pdf->Cell(28,6,'DEPARTAMENTO :',1,0,'R',true);
$pdf->Cell(40,6,utf8_decode($infoPersonal[0]["categoriaCjto"]),0,0,'C');
$pdf->Cell(20,6,'AREA :',1,0,'C',true);
$pdf->Cell(40,6,utf8_decode($infoPersonal[0]["banderaCjt"]),0,1,'C');
$pdf->Ln();
$pdf->Line(130,73, 210-50, 73);
$pdf->Cell(18,6,'PERIODOS :',1,0,'L',true);
$pdf->Cell(35,6,' A ',0,0,'C');
$pdf->Cell(8,6,'  ',1,0,'C');
$pdf->Cell(35,6,' A ',0,0,'C');
$pdf->Cell(8,6,' ',1,0,'C');
$pdf->Cell(8,6,' ',0,0,'C');
$pdf->Cell(26,8,'  a  ',0,0,'R');
$pdf->Cell(28,6,' ',0,0,'C');
$pdf->Cell(13,6,'# ',1,1,'L');
$pdf->Ln();
$pdf->Cell(70,6,'FECHA DE VACACIONES',1,0,'C');
$pdf->Cell(50,6,'',0,0,'C');
$pdf->Cell(70,6,'FECHA DE REINGRESO',1,1,'C');
$pdf->Cell(20,6,'DESDE',1,0,'C');
$pdf->Cell(20,6,'HASTA',1,0,'C');
$pdf->Cell(30,6,'No. DIAS QUE TOMA',1,0,'C');
$pdf->Cell(170,6,$regreso,0,1,'C');
// $pdf->Cell(50,6,'',0,1,'C');
$pdf->Line(130,91, 210-10, 91);
// $pdf->Cell(50,6,'Hola',0,0,'C');
$pdf->Cell(20,8,$desde,1,0,'C');
$pdf->Cell(20,8,$hasta,1,0,'C');
$pdf->Cell(30,8,$dias,1,1,'C');
$pdf->Ln();
$pdf->Cell(10,6,'  ',1,0,'C');
$pdf->Multicell(0,5,utf8_decode("Si,vencida mi licencia y/o vacaciones. no reanudate mis labores en ICESA S.A y habiendo trasncurrido más de tres dias\n
de inasistencia al trabajo, ICESA S.A me considerará comprendido en lo dispuesto en el Articulo 171 del Código del trabajo\n
vigente,para lo cual firmo el presente documento, relevando a ICESA S.A de toda responsabilidad."),'C'); 
$pdf->Ln();
$pdf->Cell(10,6,'  ',1,0,'C');
$pdf->Multicell(0,5,utf8_decode("Acumulación por un año solicita por : $nombres de acuerdo al artículo 73 del Código del Trabajo."),'C'); 
$pdf->Ln();
$pdf->Cell(10,6,'  ',1,0,'C');
$pdf->Multicell(0,5,utf8_decode("Acumulación solicitada por el empleado por el periodo  ____ -- ____    #de días:   _____    de acuerdo al artículo 474 del Código\n
del trabajo. a liquidarse de acuerdo al Articulo 70 del mismo Código : \n
                                                DIAS TOMADOS:      _____    DIAS PENDIENTES: ____\n
                                                DIAS QUE SOLICITA: _____    DIAS PENDIENTES: ____\n
                                                DIAS QUE SOLICITA: _____    DIAS PENDIENTES: ____"),'C'); 
$pdf->Ln(20);
$pdf->Cell(0,6,'FIRMAS Y SELLOS DE RESPONSABILIDAD',1,0,'C',true);
$pdf->Ln();
$pdf->Cell(30,6,'EMPLEADO',0,0,'C');
$pdf->Cell(50,6,'JEFE INMEDIATO',0,0,'C');
$pdf->Cell(60,6,'GERENTE DE AREA',0,0,'C');
$pdf->Cell(50,6,'RECURSOS HUMANOS',0,1,'C');
$pdf->Line(10,240,45,240);
$pdf->SetFont('Courier','BI',8);
$pdf->Cell(120,20,utf8_decode($infoPersonal[0]["jefe"]),0,0,'C');
$pdf->Line(50,240, 85,240);
$pdf->Line(100,240, 145,240);
$pdf->Line(155,240, 200,240);
//$pdf->Output();
$pdf->Output("SolicitudVacaciones$nombres.pdf", "D");

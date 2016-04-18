<?php
$orden=$_GET["numeroOrden"];
ob_end_clean();                           //limpia el buffer de salida para poder generar el pdf 
require('fpdf17/fpdf.php');
require('../controladores/core/core.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	//session_start();
$image1 = "../img/INTELICODE ACG.png";
 // Arial italic 8$this->Image($image1,8,8,40,20)
 $this->SetFont('Arial','B',9.8);
$this->Cell(45,6,$this->Image($image1,8,8,40,20),0,0,'C',0);   // empty cell with left,top, and right borders
$this->Cell(130,6,'ACUSE DE RECIBO DE PAGO',0,0,'C',0);
$this->Cell(60,6,date("d/m/Y"),0,0,'L',0);

$this->ln();
              

$this->Cell(45,10,'','0',0,0,0);   // empty cell with left,bottom, and right borders
$this->Cell(130,10,'',0,0,'J',0);
$this->Cell(60,10,'','0',0,'L',0);

}


// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',9.8);
    // Número de página
    $this->Cell(168,6,'Acuse de recibo de pago',0,0,'L',0);
    $this->Cell(25,6,'Rev. 1',0,0,'R',0);

}

}

$pdf=new PDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetAutoPageBreak(true,25);
$pdf->SetFont('Arial','B',9.8);

                $pdf->Ln();     $pdf->Ln();				
$pdf->Cell(50,6,utf8_decode('No. de orden: '.$orden),0,0,'L',0);
$pdf->Ln();	
$pdf->Cell(189,6,utf8_decode(''),'T',0,'L',0);
$pdf->Ln();
$pdf->Cell(189,6,utf8_decode('Cuentas para deposito '),0,0,'L',0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(80,6,utf8_decode('ATECHNOLOGY, S.A. DE C.V. '),0,0,'L',0);
$pdf->Cell(80,6,utf8_decode('SORBA CONSTRUCCIONES Y PROYECTOS, S.A. DE C.V.'),0,0,'L',0);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(80,6,utf8_decode('BANORTE  '),0,0,'L',0);
$pdf->Cell(80,6,utf8_decode('BANAMEX'),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(80,6,utf8_decode('CUENTA: 833332305  '),0,0,'L',0);
$pdf->Cell(80,6,utf8_decode('CUENTA:  97828'),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(189,6,utf8_decode('CLABE:   072052008333323050  '),0,0,'L',0);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(189,6,utf8_decode('BANCOMER  '),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(189,6,utf8_decode('CUENTA: 174533364 '),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(189,6,utf8_decode('CLABE:   012628001745333647 '),0,0,'L',0);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(189,6,utf8_decode('BANAMEX'),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(189,6,utf8_decode('CUENTA:  881202'),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(189,6,utf8_decode('SUC:  7004'),0,0,'L',0);
$pdf->Ln();
$pdf->Cell(189,6,utf8_decode('CLABE:  002052700408812023'),0,0,'L',0);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(189,6,utf8_decode('Envie este recibo con copia del voucher de pago al correo: finanzas@inteli-code.com.mx '),0,0,'L',0);
                $pdf->Ln();     $pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(35, 8, 'CODIGO', 0); 
$pdf->Cell(40, 8, 'PRODUCTO', 0);
$pdf->Cell(90, 8, 'DESCRIPCION', 0);
$pdf->Cell(10, 8, 'PRECIO', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);

$c=new dal();
$c->conectar();
$sql="select * from clienteventadetalle c inner join producto p on p.idProducto=c.moduloCompra where noVenta='".$orden."'";
$misDatos=$c->ejecutar($sql);
//CONSULTA

$item = 0;
$total=0;
while($rep = mysqli_fetch_array($misDatos)){
	$item = $item+1;
	$pdf->Cell(35, 6,$rep['moduloCompra'], 0);
	$pdf->Cell(40, 6, $rep['moduloNombre'], 0);
	$pdf->Cell(90, 6,$rep['moduloDescripcion'], 0);
	$pdf->Cell(10, 6, '$'.$rep['costo'], 0);
	$pdf->Ln(6);
	$total+=$rep['costo'];
}
$pdf->Ln(8);
$pdf->Cell(140,6,'',0,0,'L',0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50,8,utf8_decode('PAGO TOTAL : $'.$total),'T',0,'R',0);

// Show PDF   
$pdf->Output();
?>


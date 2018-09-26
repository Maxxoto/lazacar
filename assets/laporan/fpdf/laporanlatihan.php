<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
 
    // Arial bold 15
    $this->SetFont('Arial','B',24);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'CV.LAZACAR',0,0,'C');
    // Line break
    $this->Ln(20);

    $this->Line(80,80,80,80);
    

}

    

function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}   

function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 35, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
// Column headings
$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
// Data loading
$data = $pdf->LoadData('tutorial/countries.txt');
$pdf->SetFont('Arial','',18);
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->Output();

?>
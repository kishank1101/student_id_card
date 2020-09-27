<?php
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$id=$_POST['id'];
$course=$_POST['course'];
$stream=$_POST['stream'];
$address=$_POST['address'];
$city=$_POST['city'];
$mobile=$_POST['mobile'];

require('fpdf181/fpdf.php');
class PDF extends FPDF
{

// Page header
function Header()
{
	
    // Logo
    $this->Image('logo.png',0,0,10);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
 $this->SetTextColor(220,50,50);
$this->Cell(20);
    // Title
    $this->Cell(20,-2,'ID CARD',0,0,'C');
	//$this->Image($pic,50,6,30);
    // Move to the right
    //$this->Cell(35);

    // Title
    //$this->Cell(4,1,'ID CARD');
    // Line brea    
	$this->Ln(5);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
$this->SetTextColor(0,0,255);

    // Page number
    $this->Cell(0,19,'Issued by Coensobec',0,0,'C');
}
}
function AcceptPageBreak()
{
    // Method accepting or not automatic page break
    if($this->col<2)
    {
        // Go to next column
        $this->SetCol($this->col+1);
        // Set ordinate to top
        $this->SetY($this->y0);
        // Keep on page
        return false;
    }
    else
    {
        // Go back to first column
        $this->SetCol(0);
        // Page break
        return true;
    }
}
$pdf = new PDF('L','mm',array(50,85));
//$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(false);
$pdf->SetFont('Times','',10,'C');
//$pdf->SetDrawColor(230,80,180);
//$pdf->SetFillColor(230,230,0);
//$pdf->Cell(70,10,'ID CARD');
$pdf->Cell(-5,20,'');
$pdf->Cell(15,0,'Name:');
$pdf->Cell(10,0,$fname);
$pdf->Cell(2,30,'');
$pdf->Cell(10,0,$lname);
$pdf->Ln(5);
$pdf->Cell(-5,20,'');
$pdf->Cell(15,0,'Course:');
$pdf->Cell(10,0,$course);
//$pdf->Cell(-10,0,'-');
$pdf->Cell(3,30,'');
$pdf->Cell(10,0,$stream);
$pdf->Ln(5);
$pdf->Cell(-5,20,'');
$pdf->Cell(15,0,'ID:');
$pdf->Cell(10,0,$id);
/*$pdf->Cell(3,0,'');
$pdf->Cell(10,0,'B. Group:');
$pdf->Cell(10,0,$blood);
$pdf->Cell(10,30,'');
$pdf->Cell(30,30,'DOB:');
$pdf->Cell(10,30,$dob);*/
$pdf->Ln(5);
$pdf->Cell(-5,30,'');
$pdf->AcceptPageBreak();
$pdf->Cell(16,0,'Address:');
$pdf->Cell(10,0,$address);
$pdf->Ln(5);
$pdf->Cell(-5,30,'');
$pdf->Cell(10,0,'City:');
$pdf->Cell(10,0,$city);
//$pdf->Cell(5,30,'');
//$pdf->Cell(30,30,'Pin:');
//$pdf->Cell(10,30,$pincode);
$pdf->Ln(5);
$pdf->Cell(-5,10,'');
$pdf->Cell(15,0,'Mobile:');
$pdf->Cell(10,0,$mobile);
$split_name = explode(".",$_FILES["upfile"]["name"]);
$pdf->Image($_FILES['upfile']['tmp_name'],62,12,15,15,end($split_name)); 
$pdf->Output(); 
?>

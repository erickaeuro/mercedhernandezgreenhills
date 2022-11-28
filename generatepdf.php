<?php
require_once('tcpdf.php');
require 'connection.php';


/*if (isset($_POST['pdf'])){

        $dateloan= $_POST['date_loan_granted'];
        $exdate= $_POST['expiry_date'];
        $maturity= $_POST['maturity_date'];
        $desc= $_POST['item_desc'];
        $inte= $_POST['interest'];
        $appval= $_POST['appraised_value'];
        $prin= $_POST['principal'];
        

        $pdfprint = "SELECT * FROM loantbl";
        $printpdf = mysqli_query($con, $pdfprint);
       while ($row = mysqli_fetch_array($printpdf));


        
}*/

   //                    
class PDF extends TCPDF
{
   public function Header()
   {
      
   }
   public function Footer(){
        
}
}

if (isset($_GET['id'])){
     $id = $_GET['id'];
     $query = "SELECT * FROM loantbl INNER JOIN customertbl ON loantbl.customer_no = customertbl.customer_no WHERE loantbl.loan_id='$id'";
     $query_run = mysqli_query($con, $query);
     $row = mysqli_fetch_array($query_run);

     $date_loan_granted = $row['date_loan_granted'];
     $firstn = $row['first_name'];
     $middlen = $row['middle_name'];
     $lastn = $row['last_name'];
     $fulln = "$firstn $middlen $lastn";
     $maturity_date = $row['maturity_date'];
     $expiry_date = $row['expiry_date'];
     $interest = $row['interest'];
     $item_desc = $row['item_desc'];
     $principal = $row ['principal'];
     $appraised_value = $row['appraised_value'];

      //PUT DECRYPTION FUNCTION HERE
      $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
      function decryptthis($data, $key){
        $encryption_key = base64_decode($key);
        list($encryption_data, $iv) = array_pad(explode('::',base64_decode($data),2),2,null);
        return openssl_decrypt($encryption_data, 'aes-256-cbc',$encryption_key,0,$iv);
      }

      foreach($query_run as $row)
      {
        $addr = $row['address'];
        $cpn = $row['cpnum'];

        //DECRYPT VARIBLES HERE WITH THE RETURN OF DECRYPTION FUNCTION
        $Address = decryptthis($addr, $key);
        $cpnum = decryptthis($cpn, $key);
        

}
     
$pdf = new PDF('l', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Merced Hernandez Green Hills');
$pdf->SetTitle('Pawnshop');
$pdf->SetSubject('');
$pdf->SetKeywords('');


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// pdf$pdf method has several options, check the source code documentation for more information.
$pdf->AddPage();
$pdf->Cell(230, 15, ''.$maturity_date.'', 0, 1, 'R');
$pdf->Cell(230, 15, ''.$expiry_date.'', 0, 1, 'R');
$pdf->Cell(50, 10,''.$date_loan_granted.'',0,1,'R');
$pdf->Ln(5);
$pdf->Cell(100,10,''.$fulln.'',0,0,'R');
$pdf->Cell(200,3,''.$Address.'',0,0,'R');
$pdf->Ln(10);
$pdf->Ln(15);
$pdf->Cell(210,15,'(P '.$principal.')',0,0,'R');
$pdf->Ln(15);
$pdf->Cell(100,3,'( '.$interest.' % )',0,1,'R');
$pdf->Ln(10);
$pdf->Cell(130,3,' (P '.$appraised_value.')',0,0,'R');
$pdf->Ln(4);
$pdf->Ln(20);
$pdf->Cell(40,3,''.$item_desc.'',0,0,'R');
$pdf->Ln(2);
$pdf->Ln(9);
$pdf->Cell(249,7,'(P '.$principal.')',0,0,'R');
$pdf->Ln(8);
$pdf->Cell(250,3,'('.$interest.' %)',0,1,'R');



ob_start();
// Close and output PDF document
$pdf->Output('pawnticket.pdf', 'I');

}
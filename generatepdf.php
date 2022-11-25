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
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(270, 2, 'MERCED HERNANDEZ GREEN HILLS', 0, 1, 'C');
$pdf->SetFont('helvetica', '',8);
$pdf->Cell(270,3,'Unit 153 G/F Starmall, EDSA cor. Shaw Blvd., Mandaluyong City',0,1,'C');
$pdf->Cell(270,3,'Tel. No: 796-1652 . NONVAT REG TIN 001-925-729-000',0,1,'C');
$pdf->Cell(270,3,'MONDAY TO SATURDAY: 10:00 AM TO 8:00 PM',0,1,'C');
$pdf->Cell(270,3,'GCASH - 0998 070 3238',0,1,'C');
$pdf->SetFont('helvetica', 'B', 11);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(270, 5, 'PAWN TICKET', 0, 1, 'L');
$pdf->Cell(230, 5, 'Maturity Date:  '.$maturity_date.'', 0, 1, 'R');
$pdf->Cell(257, 5, 'Expiry Date of Redemption:  '.$expiry_date.'', 0, 1, 'R');

$pdf->Cell(51,1,'Date of Loan Granted:   '.$date_loan_granted.'',0,0);
$pdf->Ln(8);
$pdf->Cell(27,1,'Mr./Ms./Miss:                                                                               '.$fulln.'',0,0,);
$pdf->Cell(15,0,'_____________________________________________________________________________________________',0,0);
$pdf->Ln(5);
$pdf->Cell(155, 3, '                                                                                                    (Name Of Pawner)',0,1,'C');
$pdf->Ln(2);
$pdf->Cell(26,3,'a resident of                                                                             '.$Address.'',0,0);
$pdf->Cell(15,0,'_____________________________________________________________________________________________',0,0);
$pdf->Ln(10);
$pdf->Cell(51,3,'TIN: ________________________________________ Business Style ______________________________________________',0,0);
$pdf->Ln(7);
$pdf->Cell(40,3,'for a loan of PESOS                                                 (P '.$principal.')                                                                                    with an interest of',0,0);

$pdf->Cell(100,2,'________________________________________________________________________',0,0);
$pdf->Ln(10);
$pdf->Cell(16,3,'Percent        ( '.$interest.' % )                      for (30 Days/Month) P.M/P.A) has pledge to this Pawnee in security for the loan the article(s)',0,0);
$pdf->Cell(20,3,'______________________',0,0);
$pdf->Ln(10);
$pdf->Cell(80,3,'described below appraised at PESOS                                                                                  (P '.$appraised_value.')',0,0);
$pdf->Cell(50,3,'______________________________________________________________________',0,0);
$pdf->Ln(5);
$pdf->Cell(215, 5, '                                                                                                                            (APPRAISED VALUE)',0,1,'C');
$pdf->Ln(4);
$pdf->Cell(51, 5, 'subject to the terms and conditions stated on the reverse side hereof.',0,1,);
$pdf->Ln(2);
$pdf->Cell(220, 5, 'DESCRIPTION OF THE PAWN',0,1,'C');
$pdf->Ln(3);
$pdf->Cell(1,3,'                                                                                  '.$item_desc.'',0,0);
$pdf->Cell(50,3,'________________________________________________________________________________________________________',0,0);
$pdf->Ln(2);
$pdf->Ln(9);
$pdf->Cell(51,3,'Contact No: '.$cpnum.'',0,0);
$pdf->Ln(12);
$pdf->Cell(20,1,'____________________________________________',0,0);
$pdf->Cell(118,1,'',0,0);
$pdf->Cell(51,1,'____________________________________________',0,1);
$pdf->Cell(20, 5, '(Signature or Thumbmark) Pawner ',0,0);
$pdf->Cell(118,1,'',0,0);
$pdf->Cell(55, 5, 'Pawnshops Authorized Representative', 0, 0);

$pdf->SetFont('times', '', 10);
$pdf->AddPage();
$left_column = '<b>TERMS AND CONDITION</b><br>
1.  The pawner hereby accepts the pawnshops appraisal as proper.<br>
2.  The interest rate stipulated herein is in accordance with the existing policy of the Monetary Board. The pawnshop hereby agrees not to collect in advance interest for a period of more than one (1) year. For purposes of computing the amount of interest for pledge loans paid after the maturity date, a fraction of (less than) a month shall be considered as one whole month.<br>
3.  The service charge is equivalent to one percent (1%) of the principal loan, but not to exceed five pesos (P5.00). No other charges shall be collected.<br>
4.  This loan is renewable for such amount and period as may be agreed upon between the pawnshop and the pawner, subject to the requirements of P.D. 114 for a new loan.<br>
5.  Upon maturity of this loan, as indicated on the face of this ticket, the pawner still has ninety (90) days from maturity date within which to redeem the pawn by paying the principal loan plus the interest that shall have accrued thereon. The amount of interest due and payable after the maturity date of the loan and during the redemption period shall be computed upon redemption at the same rate of interest provided in No.2 above based on the sum of the principal loan and interest earned as of the date of maturity.
In case of pre-payment of this loan by pawner, the interest collected in advance shall accrue in full to the pawnshop.<br>
6.  The pawner and the pawnshop agree that the notice of auction sale shall be delivered via ( ) e-mail or ( ) SMS. In case no mode of notification is agreed upon, the default shall be via ordinary mail. The pawnshop shall have the right to sell or dispose of the pawn in public auction if the pawner fails to redeem the pawn within ninety (90) days grace period.
The pawnshop shall send the reminder on or before the expiration of ninety (90) day grace period.<br>
7.  The parties hereby agree that this ticket shall be surrendered at maturity date upon payment of the loan. In case of loss or destruction of this ticket, the pawner hereby undertakes to personally present an affidavit to the pawnshop before the redemption period expires. It is hereby agreed that the pawnshop has a period of two (2) days within which to verify from its record before ( ) indicating of the affidavit that it shall take the place of the original pawn ticket for purposes of redemption or ( ) issuing a substitute ticket, the original pawn ticket being deemed cancelled.<br>
8.  The pawner hereby agrees not to assign, sell or in any other way alienate the pawn securing this loan as evidenced by the pawn ticket without prior written consent of the pawnshop subject to the terms and conditions of this contract.';

$right_column = '9. The pawner shall not be entitled to the excess of the public auction sale price over the amount of principal, interest and service fee; neither shall the pawnshop be entitled to recover the deficiency from the pawner.<br><br>
10. In case this loan is not paid on maturity date, the pawner hereby agrees to pay in addition to accrued interest, 2% per month of the principal, as liquidated damages. For purpose of computing the amount of liquidated damages, a fraction of a month shall be considered as one (1) full month. The pawnshop may, at its sole option, allow redemption of pawn after expiration of the 90-day grace period upon payment by the pawner of the loan principal plus interest due and liquidated damage at the rates and manner of computation herein prescribed.<br><br>
11. The pawnshop shall not be liable for loss or damage of the pawn due to fortuitous events without fault or negligence on its part, while the pawn is in its possession.<br><br>
12. The pawnshop shall exercise reasonable care and caution that an ordinary prudent person would as to his own property over the thing pawned in accordance with Republic Act No. 386 (Civil Code of the Philippines), as amended. Accordingly, the pawnshop shall insure all pawned items, except those which are kept inside a fireproof vault, in accordance with the pertinent regulation of the Bangko Sentral ng Pilipinas. Claims for retitution by pawner in case of loss, destruction or defect of the pawn due to robbery, fire and other directors and officers are cognizable by the regular courts.<br><br>
13. Venue of all judicial and administrative cases or proceedings and other legal incidents arising out of or in connection with this contract shall solely and exclusively be brought before the appropriate courts, departments, offices or agencies of the government situated in Mandaluyong City.<br><br>
14. The authorized representative must present valid identification papers.<br><br>
15. The pawner shall advise the pawnshop of any change of address.<br>
16. Acknowledgment: I hereby declare that the above mentioned article(s) is/are my personal property and are free from liens and encumbrances.<br><br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_____________________<br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;PAWNER';

// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// get current vertical position
$y = $pdf->getY();

// set color for background
$pdf->SetFillColor(255, 255, 200);

// set color for text
$pdf->SetTextColor(0, 63, 127);

// write the first column
$pdf->writeHTMLCell(130, '', '', $y, $left_column, 1, 0, 1, true, 'J', true);

// set color for background
$pdf->SetFillColor(215, 235, 255);

// set color for text
$pdf->SetTextColor(127, 31, 0);

// write the second column
$pdf->writeHTMLCell(140, '', '', '', $right_column, 1, 1, 1, true, 'J', true);
// reset pointer to the last page
$pdf->lastPage();

ob_start();
// Close and output PDF document
$pdf->Output('pawnticket.pdf', 'I');

}
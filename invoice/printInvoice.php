<?php
//print_invoice.php
if(isset($_GET["pdf"]) && isset($_GET["id"]))
{
 require_once 'pdf.php';
 include('db_config.php');
 $output = '';
 $statement = $connect->prepare("SELECT * FROM inv_order WHERE order_id = :order_id LIMIT 1");
 $statement->execute(
  array(
   ':order_id'       =>  $_GET["id"]
  )
 );
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '
   <table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr style="background: #32CD32; color: #fff">
     <td colspan="2" align="center" style="font-size:18px"><b>Merced Hernandez GreenHills Invoice</b></td>
    </tr>
    <tr>
     <td colspan="2">
      <table width="100%" cellpadding="5">
       <tr>
        <td width="65%" style="background: #32CD32; color: #fff">
         To,<br />
         <b>RECEIVER (BILL TO)</b><br />
         Name : '.$row["order_receiver_name"].'<br /> 
         Invoice Address : '.$row["order_receiver_address"].'<br />
        </td>
        <td width="35%" style="background: #32CD32; color: #fff">
         Invoice Details<br />
         Invoice No. : '.$row["order_no"].'<br />
         Invoice Date : '.$row["order_date"].'<br />
        </td>
       </tr>
      </table>
      <br />
      <table width="100%" border="1" cellpadding="5" cellspacing="0">
       <tr>
        <th>S/N</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total Sales</th>
        <th colspan="2">Interest (%)</th>
        <th colspan="2">Principal (%)</th>
        <th colspan="2">Total Payment Due (%)</th>
        <th rowspan="2">Total</th>
       </tr>
       <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>Rate</th>
        <th>Amount</th>
        <th>Rate</th>
        <th>Amount</th>
        <th>Rate</th>
        <th>Amount</th>
       </tr>';
  $statement = $connect->prepare("SELECT * FROM inv_order_item WHERE order_id = :order_id");
  $statement->execute(
   array(
    ':order_id'       =>  $_GET["id"]
   )
  );
  $item_result = $statement->fetchAll();
  $count = 0;
  foreach($item_result as $sub_row)
  {
   $count++;
   $output .= '
   <tr>
    <td>'.$count.'</td>
    <td>'.$sub_row["item_name"].'</td>
    <td>'.$sub_row["order_item_quantity"].'</td>
    <td>'.$sub_row["order_item_price"].'</td>
    <td>'.$sub_row["order_item_actual_amount"].'</td>
    <td>'.$sub_row["order_item_tax1_rate"].'</td>
    <td>'.$sub_row["order_item_tax1_amount"].'</td>
    <td>'.$sub_row["order_item_tax2_rate"].'</td>
    <td>'.$sub_row["order_item_tax2_amount"].'</td>
    <td>'.$sub_row["order_item_tax3_rate"].'</td>
    <td>'.$sub_row["order_item_tax3_amount"].'</td>
    <td>'.$sub_row["order_item_final_amount"].'</td>
   </tr>
   ';
  }
  $output .= '
  <tr>
   <td align="right" colspan="11"><b>Total</b></td>
   <td align="right"><b>'.$row["order_total_after_tax"].'</b></td>
  </tr>
  <tr>
   <td colspan="11"><b>Total Amount Before Tax :</b></td>
   <td align="right">'.$row["order_total_before_tax"].'</td>
  </tr>
  <tr>
   <td colspan="11">Add : Tax1 :</td>
   <td align="right">'.$row["order_total_tax1"].'</td>
  </tr>
  <tr>
   <td colspan="11">Add : Tax2 :</td>
   <td align="right">'.$row["order_total_tax2"].'</td>
  </tr>
  <tr>
   <td colspan="11">Add : Tax3 :</td>
   <td align="right">'.$row["order_total_tax3"].'</td>
  </tr>
  <tr>
   <td colspan="11"><b>Total Tax Amount  :</b></td>
   <td align="right">'.$row["order_total_tax"].'</td>
  </tr>
  <tr style="background: #2196f3; color: #fff">
   <td colspan="11"><b>Total Amount After Tax :</b></td>
   <td align="right">PHP '.$row["order_total_after_tax"].'</td>
  </tr>
  
  ';
  $output .= '
      </table>
     </td>
    </tr>
   </table>
  ';
 }
 $pdf = new Pdf();
 $file_name = 'Invoice_'.$row["order_receiver_name"].'.pdf';
 $pdf->loadHtml($output);
 $pdf->render();
 ob_end_clean();
 $pdf->stream($file_name, array("Attachment" => false));
}
?>


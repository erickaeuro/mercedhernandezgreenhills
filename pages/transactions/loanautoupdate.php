
<!--MODAL ALERT-->
<div id="myModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>LOAN UPDATE</b></h4>
                <button type="button" class="btn-close" id="close" data-bs-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
            <p>
                Loan IDs <?php if($matvalid==1){foreach($matrec as $recup){ echo "$recup "; } echo 'is past its Maturity date, interest rate and renewal due updated and added 2% penalty to renewal due'; }?>
                <?php if($mattvalid == 1 && $matvalid == 1){echo 'and Loan IDs ';} if($mattvalid==1){foreach($mattrec as $recup){ echo "$recup "; } echo 'is past 2 months of its Maturity date, additional 2% penalty added to renewal due'; }?>
                <?php if($delvalid == 1 && $matvalid == 1){echo 'and Loan IDs ';}if($delvalid==1){foreach($exprec as $drecup){ echo "$drecup "; } echo 'is expired and is now up for auction  ';}?> 
            </p>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="close2">Okay</button>
            </div>
        </div>
    </div>

<!--SQL UPDATE & DELETE -->


<?php



if($matsql == 1 ){
    foreach($matrec as $recup){
        $mquery = "SELECT renewal_due, principal FROM loantbl WHERE loan_id = '$recup'";
        $mquery_run = mysqli_query($con, $mquery);
        foreach($mquery_run as $run){

            $principal = $run['principal'];

            $amtdue = $run['renewal_due'] + ($principal * 0.02);

            $query = "UPDATE loantbl SET renewal_due ='$amtdue', loan_status = 'Late' WHERE loan_id = '$recup'";
            $query_run = mysqli_query($con, $query);
        
        }
    }
}

if($mattsql == 1 ){
    foreach($mattrec as $recup){
        $mquery = "SELECT renewal_due, principal FROM loantbl WHERE loan_id = '$recup'";
        $mquery_run = mysqli_query($con, $mquery);
        foreach($mquery_run as $run){

            $principal = $run['principal'];

            $amtdue = $run['renewal_due'] + ($principal * 0.06);

            $query = "UPDATE loantbl SET renewal_due ='$amtdue', loan_status = 'Two Months Late' WHERE loan_id = '$recup'";
            $query_run = mysqli_query($con, $query);
        
        }
    }
}


if($delsql == 1 ){
    foreach($exprec as $xrecup){        
        $xquery = "SELECT item_type, item_desc, appraised_value FROM loantbl WHERE loan_id = '$xrecup'";
        $xquery_run = mysqli_query($con, $xquery);
        foreach($xquery_run as $run){
            //VARIABLES FOR CHANGE
            $itype = $run['item_type'];
            $idesc = $run['item_desc'];
            $appr = $run['appraised_value'];

                //UPDATE LOAN TABLE
                $upquery = "UPDATE loantbl SET loan_status = 'Auctionted' WHERE loan_id = '$xrecup'";
                $upquery_run = mysqli_query($con, $upquery);

                //INSERT AUCTION TABLE
                $inquery = "INSERT INTO auctiontbl (auctionid, item_type, item_desc, price, date_sold, status)
                    VALUES (NULL, '$itype', '$idesc', '$appr', NULL, 'Available')";
                $inquery_run = mysqli_query($con, $inquery);
        }
    }
}
?>






<script>
   var modal = document.getElementById("myModal");
   var del = document.getElementById("close");
   var del1 = document.getElementById("close2");

   modal.style.display = "block";

   

   del.onclick = function(){
    modal.style.display = "none";
   }

   del1.onclick = function(){
    modal.style.display = "none";
   }

</script>



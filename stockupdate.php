<!--MODAL ALERT-->
<div id="myModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Stock Update</b></h4>
                <button type="button" class="btn-close" id="close" data-bs-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
            <p>
                Stock Number <?= $sold?> has been sold!!
            </p>            
            </div>
            <div class="modal-footer">
                <a href="stocks.php" class="btn text-white btn-md" style="background-color: #DE9185;"> Okay </a>
            </div>
        </div>
    </div>


<!--Stock Update-->
            <?php
                if($soldvalid == 1)
                {                                      
                    $id = "UPDATE inventorytbl set move = '1' WHERE stock_no = '$sold'";
                    $query_run = mysqli_query($con, $id);
                    
                }
              ?>

<script>
   var modal = document.getElementById("myModal");
   var del = document.getElementById("close");
   //var del1 = document.getElementById("close2");

   modal.style.display = "block";

   

   del.onclick = function(){
    modal.style.display = "none";
   }

   del1.onclick = function(){
    modal.style.display = "none";
   }

</script>

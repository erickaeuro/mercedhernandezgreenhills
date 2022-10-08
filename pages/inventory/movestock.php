<?php
if(isset($_POST['move']))
                    { 
                        $stock = $row['stock_no'];
                        
                        $move = "Update inventorytbl set move = '1' where stock_no = '$stock'";
                        $insert_row = $con->query($move) or die ($con->error.__LINE__);
                        //echo '<script>alert("Moved")</script>';

                        
                    }

?>
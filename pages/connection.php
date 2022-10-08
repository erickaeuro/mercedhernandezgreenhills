<?php 
     $con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
     if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
?> 

<?php
$connect = new PDO('mysql:host=localhost;dbname=mercedhernandezgreenhills','root', '');
?> 


<?php 

 // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($item_type)) { array_push($errors, "Item Type is required"); }
  if (empty($karat_gold)) { array_push($errors, "Karat/Gold is required"); }
  if (empty($kindofstone)) { array_push($errors, "Kind of Stone is required"); }
  if (empty($tagprice)) { array_push($errors, "Tag Price is required"); }
  

?> 
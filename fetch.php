<?php
//fetch.php
$con = mysqli_connect("localhost","root","","mercedhernandezgreenhills");
if(mysqli_connect_errno()) {echo "Error: " . mysqli_connect_errno();}
$columns = array('stock_no', 'item_type', 'karat_gold', 'kindofstone', 'weight','itemqty','tagprice','date_sold');
$query = "SELECT * FROM inventorytbl WHERE ";
if($_POST["is_date_search"] == "yes")
{
 $query .= 'date_created BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}
if(isset($_POST["search"]["value"]))
{
 $query .= '
  (stock_no LIKE "%'.$_POST["search"]["value"].'%"
  OR item_type LIKE "%'.$_POST["search"]["value"].'%"
  OR karat_gold LIKE "%'.$_POST["search"]["value"].'%"
  OR date_sold LIKE "%'.$_POST["search"]["value"].'%")
 ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
 ';
}
else
{
 $query .= 'ORDER BY stock_no ASC ';
}
$query1 = '';
if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$number_filter_row = mysqli_num_rows(mysqli_query($con, $query));
$result = mysqli_query($con, $query . $query1);
$data = array();
while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["stock_no"];
 $sub_array[] = $row["item_type"];
 $sub_array[] = $row["karat_gold"];
 $sub_array[] = $row["kindofstone"];
 $sub_array[] = $row["weight"];
 $sub_array[] = $row["itemqty"];
 $sub_array[] = $row["tagprice"];
 $sub_array[] = $row["date_sold"];
 $data[] = $sub_array;
}
function get_all_data($con)
{
 $query = "SELECT * FROM inventorytbl";
 $result = mysqli_query($con, $query);
 return mysqli_num_rows($result);
}
$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($con),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);
echo json_encode($output);
?>
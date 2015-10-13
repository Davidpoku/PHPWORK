

<?php

session_start();

$cid = $_SESSION['uid'];

$sid = $_GET['id'];

echo $cid;
echo $sid;
//echo  "'".$song."' , '".$year."' , '".$label."' , '".$new_release."' , '".$os_price."' , '".$release_data."' '".$price."' , '".$artists."' , '".$img."'";

$DBconnection = pg_connect("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580");
pg_query($DBconnection,"INSERT INTO customer_likes (cid , sid) VALUES ('".$cid."' , '".$sid."') ");
header("location:shop.php");



?>

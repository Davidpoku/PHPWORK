

<?php

		$address = $_POST['address'];
    	$name = $_POST['name'];
    	$sex = $_POST['sex'];
    	$phone = $_POST['phone'];
    	$pass = $_POST['password'];

//echo  "'".$song."' , '".$year."' , '".$label."' , '".$new_releases."' , '".$os_price."' , '".$release_data."' '".$price."' , '".$artists."' , '".$img."'";

$DBconnection = pg_connect("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580");
pg_query($DBconnection,"INSERT INTO customer (address, name, phone, sex, password) VALUES ('".$address."', '".$name."', '".$phone."', '".$sex."', '".$pass."')");
header("location:userregistration.php");



?>



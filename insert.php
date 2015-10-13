

<?php

$song = $_POST['song'];
$year = $_POST['year'];
$label = $_POST['label'];
$new_releases = $_POST['new_releases'];
$price = $_POST['price'];
$artists = $_POST['artists'];
$os_price = $_POST['on_sell_price'];
$release_data = $_POST['release_data'];
$img = $_POST['img'];


//echo  "'".$song."' , '".$year."' , '".$label."' , '".$new_releases."' , '".$os_price."' , '".$release_data."' '".$price."' , '".$artists."' , '".$img."'";

$DBconnection = pg_connect("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580");
pg_query($DBconnection,"INSERT INTO catalogue (song , year , label , new_releases , on_sell_price , release_data , price , artists , img) VALUES ('".$song."' , '".$year."' , '".$label."' , '".$new_releases."' , '".$os_price."' , '".$release_data."' , '".$price."' , '".$artists."' , '".$img."') ");
header("location:adminstration_system.php");


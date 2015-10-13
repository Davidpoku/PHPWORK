

<?php

$song = $_POST['song'];
$jazz = $_POST['jazz'];
$house = $_POST['house'];
$other = $_POST['other'];
$album = $_POST['album'];



//echo  "'".$song."' , '".$year."' , '".$label."' , '".$new_releases."' , '".$os_price."' , '".$release_data."' '".$price."' , '".$artists."' , '".$img."'";

$DBconnection = pg_connect("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580");
pg_query($DBconnection,"INSERT INTO music_genres (song , jazz, house, other, album) VALUES ('".$song."' , '".$jazz."' , '".$house."' , '".$other."' , '".$album."')");
header("location:adminstration_system.php");



?>

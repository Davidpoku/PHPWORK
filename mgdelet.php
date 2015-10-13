
<?php
$sid = $_GET['id'];
 $DBconnection = pg_connect("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580");
pg_query($DBconnection,"delete from music_genres where id='".$sid."'");
header("location:adminstration_system.php");
?>

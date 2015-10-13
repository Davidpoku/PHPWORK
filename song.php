
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Shop</title>


<style>
		* { margin: 0; padding: 0; }
		
		html { 
			background: url(shop-.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		
		#page-wrap { width: 400px; margin: 40px auto; padding: 20px; background: white; -moz-box-shadow: 0 0 20px black; -webkit-box-shadow: 0 0 20px black; box-shadow: 0 0 20px black; }
		p { font: 15px/2 Georgia, Serif; margin: 0 0 30px 0; text-indent: 40px; }
	</style>


</head>

<?php
$sid = $_GET['id'];
 $DBconnection = pg_connect("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580");
$result = pg_query($DBconnection,"select * from catalogue where id='".$sid."'");
echo "<table border='1'>";
echo "<tr><td>id</td><td>song</td><td>price</td></tr>";
while($row=pg_fetch_assoc($result))
{	
	echo "<td>";
	echo $row['id'];
	echo "</td>";
	echo "<td>";
	echo $row['song'];
	echo "</td>";
	echo "<td>";
	echo $row['price'];
	echo "</td>";
 	echo "<td>";
	echo "<a href='song.php?id=".$row['id']."'>Details</a>";
	echo "</td>";
	echo "<td>";
	echo "<img width='400' src='images/".$row['img']."'/>";
	echo "</td>";
	echo "</tr>";
	
}
echo "</table>";


?>


<body>

<p>&nbsp;</p>
<p>&nbsp;</p>




<p>&nbsp;</p>
<p>&nbsp;</p>

</div>

</body>
</html>

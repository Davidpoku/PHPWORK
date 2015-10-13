<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>administration system</title>
</head>






<body>
<p align="center">&nbsp;</p>
<p align="center">Update Catalogue</p>
<p>&nbsp;</p>

<?php
if($_REQUEST['song'] && $_REQUEST['year'] && $_REQUEST['label'] && $_REQUEST['new_releases'] && $_REQUEST['on_sell_price'] && $_REQUEST['release_data']&& $_REQUEST['price']&& $_REQUEST['artists']&& $_REQUEST['img'])// Check to see if All of the Fields were Filled Out
{
   $DBconnection = pg_connect
("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580"); // Connect to the Database
  $query = sprintf("INSERT INTO catalogue VALUES('%s','%s','%s')",$_REQUEST['song'],$_REQUEST['year'],$_REQUEST['label'],$_REQUEST['new_releases'],$_REQUEST['on_sell_price'],$_REQUEST['release_data'],$_REQUEST['price'],$_REQUEST['artists'],$_REQUEST['img']);// Form the Query
/* Quick Lesson on Sprintf:
 
 */
  
  
  $query = pg_query($query);
  if($query)
    echo "You were successfully added to the database!";
  else
    echo "Some Error Occured! ".pg_last_error();
}
else{ // If we dont have all of the fields, show the form
?>
<form METHOD="POST" ACTION="insert.php"> 
song: <input type="text" name="song"><br />
year: <input type="text" name="year"><br />
label: <input type="text" name="label"><br />
new_releases: <input type="text" name="new_releases"><br />
on_sell_price: <input type="text" name="on_sell_price"><br />
release_data: <input type="text" name="release_data"><br />
price: <input type="text" name="price"><br />
artists: <input type="text" name="artists"><br />
img: <input type="text" name="img"><br />
<input type="submit" value ="Upadate">
</form>
<?php
   }
?>









<p align="center">Delete from Catalogue</p>

<?php
 $DBconnection = pg_connect("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580");
$result = pg_query($DBconnection,"select * from catalogue");
echo "<table border='1'>";
echo "<td><td>id</td><td>song</td><td>artists</td><td>price</td></tr>";
while($row=pg_fetch_assoc($result))
{	
	echo "<td><td>";
	echo $row['id'];
	echo "</td>";
	echo "<td>";
	echo $row['song'];
	echo "</td>";
	echo "<td>";
	echo $row['artists'];
	echo "</td>";
 	echo "<td>";
 	echo $row['price'];
	echo "</td>";
 	echo "<td>";
	echo "<a href='delete.php?id=".$row['id']."'>Delete</a>";
	echo "</td>";
	echo "</tr>";
	
}
echo "</table>";


?>



<p align="center">Update Music_genres</p>
<p>&nbsp;</p>

<?php
if($_REQUEST['song'] && $_REQUEST['jazz'] && $_REQUEST['house'] && $_REQUEST['other'] && $_REQUEST['album'])// Check to see if All of the Fields were Filled Out
{
   $DBconnection = pg_connect
("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580"); // Connect to the Database
  $query = sprintf("INSERT INTO music_genres VALUES('%s','%s','%s')",$_REQUEST['song'],$_REQUEST['jazz'],$_REQUEST['house'],$_REQUEST['album']);// Form the Query


  $query = pg_query($query);
  if($query)
    echo "You were successfully added to the database!";
  else
    echo "Some Error Occured! ".pg_last_error();
}
else{ // If we dont have all of the fields, show the form
?>
<form METHOD="POST" ACTION="gminsert.php"> 
soul: <input type="text" name="song"><br />
jazz: <input type="text" name="jazz"><br />
house: <input type="text" name="house"><br />
other: <input type="text" name="other"><br />
album: <input type="text" name="album"><br />
<input type="submit" value ="Upadate">
</form>
<?php
   }
?>




<p align="center">Delete from Muisc Genres</p>

<?php
 $DBconnection = pg_connect("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580");
$result = pg_query($DBconnection,"select * from music_genres");
echo "<table border='1'>";
echo "<tr><td>id</td><td>song</td><td>jazz</td><td>house</td><td>other</td><td>album</td></tr>";
while($row=pg_fetch_assoc($result))
{	
	echo "<td><td>";
	echo $row['song'];
	echo "</td>";
	echo "<td>";
	echo $row['jazz'];
	echo "</td>";
	echo "<td>";
	echo $row['house'];
	echo "</td>";
 	echo "<td>";
 	echo $row['other'];
	echo "</td>";
 	echo "<td>";
	echo $row['album'];
	echo "</td>";
 	echo "<td>";
	echo "<a href='mgdelet.php?id=".$row['id']."'>Delete</a>";
	echo "</td>";
	echo "</tr>";
	
}
echo "</table>";


?>













</body>
</html>

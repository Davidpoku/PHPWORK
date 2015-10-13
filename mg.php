<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Search Music genres</title>
</head>
<body>
<p><a href="shop.php"><img src="images/SHOPI.jpg" width="191" height="130" alt="SHOPI" /></a><a href="search.php"><img src="images/searchi.jpg" width="191" height="130" alt="searchi" /></a><a href="customerlikes.php"><img src="images/likesi.jpg" width="191" height="130" /></a></p>
<p>
<h2>Search Music genres</h2> 
 <form name="search" method="post" action="<?=$PHP_SELF?>">
 Seach for: <input type="text" name="find" /> in 
 <Select NAME="field">
 <Option VALUE="song">soul</option>
 <Option VALUE="jazz">jazz</option>
 <Option VALUE="house">house</option>
  <Option VALUE="other">other</option>
  <Option VALUE="album">album</option>
 </Select>
 <input type="hidden" name="searching" value="yes" />
 <input type="submit" name="search" value="Search" />
 </form>
 
 
 
<?php 

	//variables $searching, $field , $find so the code gets the data
	// from the form and puts it into variables

  $searching = $_POST['searching'];
  $field = $_POST['field'];
  $find = $_POST['find'];

  	// delete the comments after you read them as you don't need them :)

 if ($searching =="yes") 
 { 
 	echo "<h2>Results</h2><p>"; 
 

	 if ($find == "") 
	 { 
	 echo "<p>You forgot to enter a search term"; 
	 exit; 
	 } 
 
 // connect to our Database 
	$DBconnection = pg_connect("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580");
	 
	 // preform a bit of filtering  
	 $find = strip_tags($find); 
 
 
 //search for our search term, in the field the user specified 
 $data = pg_query("SELECT * FROM music_genres WHERE $field LIKE '%$find%' "); 
 
 // display the results 
 while($result = pg_fetch_array( $data )) 
 { 
 echo $result['song']; 
 echo " "; 
 echo $result['jazz']; 
 echo "<br>"; 
 echo $result['house']; 
 echo "<br>";
 echo $result['other']; 
 echo "<br>";
 echo $result['album']; 
 echo "<br>"; 
 echo "<br>"; 
 } 
 
 //This counts the number or results - and if there wasn't any it gives them a little message explaining that 
 $anymatches=pg_num_rows($data); 
 if ($anymatches == 0) 
 { 
 echo "Sorry, but we can not find an entry to match your query<br><br>"; 
 } 
 
 //remind them what they searched for 
 echo "<b>Searched For:</b> " .$find; 
 } 
?> 




</body>
</html>
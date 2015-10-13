<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>search</title>
</head>
<body>
<p><a href="shop.php"><img src="images/SHOPI.jpg" width="191" height="130" alt="SHOPI" /></a><a href="search.php"><img src="images/searchi.jpg" width="191" height="130" alt="searchi" /></a><a href="customerlikes.php"><img src="images/likesi.jpg" width="191" height="130" /></a><a href="mg.php"><img src="images/searchimg.jpg" width="191" height="130"/></a></p>
<p>&nbsp;</p>
<p>
<p>
<p>
<h2>Search</h2> 
 <form name="search" method="post" action="<?=$PHP_SELF?>">
 Seach for: <input type="text" name="find" /> in 
 <Select NAME="field">
 <Option VALUE="year">year</option>
 <Option VALUE="price">price</option>
 <Option VALUE="release_data">release date</option>
  <Option VALUE="new_releases">new releases</option>
  <Option VALUE="artists">artists</option>
 </Select>
 <input type="hidden" name="searching" value="yes" />
 <input type="submit" name="search" value="Search" />
 </form>
 
<p>
  <?php 

	

  $searching = $_POST['searching'];
  $field = $_POST['field'];
  $find = $_POST['find'];

  	

 if ($searching =="yes") 
 { 
 	echo "<h2>Results</h2><p>"; 
 

	 if ($find == "") 
	 { 
	 echo "<p>You forgot to enter a search term"; 
	 exit; 
	 } 
 
 //  connect to our Database 
	$DBconnection = pg_connect("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580");
	 
	 // preform a bit of filtering  
	 $find = strip_tags($find); 
 
 
 // search term, in the field the user specified 
 $data = pg_query("SELECT * FROM catalogue WHERE $field LIKE '%$find%' "); 
 
 //display the results 
 while($result = pg_fetch_array( $data )) 
 { 
 echo $result['year']; 
 echo " "; 
 echo $result['price']; 
 echo "<br>"; 
 echo $result['release_data']; 
 echo "<br>";
 echo $result['new_releases']; 
 echo "<br>";
 echo $result['artists']; 
 echo "<br>"; 
 echo "<br>"; 
 } 
 
 //This counts the number or results 
 $anymatches=pg_num_rows($data); 
 if ($anymatches == 0) 
 { 
 echo "Sorry, but we can not find an entry to match your query<br><br>"; 
 } 
 
 
 echo "<b>Searched For:</b> " .$find; 
 } 
?>




</body>
</html>
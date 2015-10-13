<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>User Registration</title>

<style>
		* { margin: 0; padding: 0; }
		
		html { 
			background: url(userreistration.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		
		#page-wrap { width: 400px; margin: 40px auto; padding: 20px; background: white; -moz-box-shadow: 0 0 20px black; -webkit-box-shadow: 0 0 20px black; box-shadow: 0 0 20px black; }
		p { font: 15px/2 Georgia, Serif; margin: 0 0 30px 0; text-indent: 40px; }
	body,td,th {
	font-family: "Times New Roman", Times, serif;
	font-size: 24px;
}
</style>



</head>

<body>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">Sign up to shop</p>



<div align="center">
  <?php
if($_REQUEST['Address'] && $_REQUEST['Name'] && $_REQUEST['Phone'] && $_REQUEST['Sex'] && $_REQUEST['Password'])// Check to see if All of the Fields were Filled Out
{
   $DBconnection = pg_connect
("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580"); // Connect to the Database
  $query = sprintf("INSERT INTO customer VALUES('%s','%s','%s')",$_REQUEST['Address'],$_REQUEST['Name'],$_REQUEST['Phone'],$_REQUEST['Sex'],$_REQUEST['Password']); // Form the Query
/* Quick Lesson on Sprintf:
 * Sprintf Will take a string and format it. In this case use %s which means that the Next parameter will be A string, and It
 * Should be put into wherever the %s is. The parameters will fill the %s's respectively
 */
  // echo $query;
  // Uncomment the previous line to see what $query Contains. Everything that follows is just some simple error checking.
  $query = pg_query($query);
  if($query)
    echo "You were successfully added to the database!";
  else
    echo "Some Error Occured! ".pg_last_error();
}
else{ // If we dont have all of the fields, show the form
?>
</div>
<form METHOD="POST" ACTION="uca.php"> 
  <div align="center">Address:
    <input type="text" name="address"><br />
    Name: <input type="text" name="name"><br />
    Phone: <input type="text" name="phone"><br />
    Sex: <input type="text" name="sex"><br />
    Password: <input type="text" name="password"><br />
    <input type="submit" value ="Register">
  </div>
</form>
<p align="center">
  <?php
   }
?>
  </p>
<p align="center"><a href="memberlog.php">Please log in as a member now</a></p> 



</body>
</html>

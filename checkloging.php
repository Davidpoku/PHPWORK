<?php

session_start();

// Connect to server and select databse.
   $DBconnection = pg_connect("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580");
   
	// Define $myusername and $mypassword
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

echo "<p>User: ".$myusername."</p>";
echo "<p>Pass: ".$mypassword."</p>";

// To protect MySQL injection (more detail about MySQL injection)
/*$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);*/

$sql="SELECT * FROM members WHERE username='".$myusername."' and password='".$mypassword."'";
$result=pg_query($sql);

// Mysql_num_row is counting table row
$count=pg_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['username'] = $myusername;
$_SESSION['password'] = $mypassword;
header("location:mloginsuccess.php ");
} else {
	echo "Wrong Username or Password";
}
?>
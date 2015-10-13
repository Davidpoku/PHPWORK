<?php

$host="alexandria.sanm.hull.ac.uk"; // Host name    
$username="431580"; // Mysql username
$password="<david333>"; // Mysql password
$db_name="431580"; // Database name
$tbl_name="customer"; // Table name

// Connect to server and select databse.
$con = pg_connect("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580") or die("cannot connect");



// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

echo $myusername;
echo $mypassword;

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = pg_escape_string($myusername);
$mypassword = pg_escape_string($mypassword);

$sql="SELECT * FROM customer WHERE name='$myusername' and password='$mypassword'" or die(pg_last_error($con));
$result=pg_query($con,$sql);

$row=pg_fetch_assoc($result);



$uid = $row['id'];

// Mysql_num_row is counting table row
$count=pg_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

	session_start();
	$_SESSION['loged'] = true;
	$_SESSION['uid'] = $uid;
	// Register $myusername, $mypassword and redirect to file "login_success.php"
	header("location:shop.php");
}

else {
	echo "Wrong Username or Password";
}
?>

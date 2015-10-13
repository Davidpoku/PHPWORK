<html>
<head>
    <style type="text/css">
        <!--
            body{font-family: sans-serif;}
            table {border:1px inset black; background-color:white;}
            th,td{padding: 0.2em;}
            th {background-color: #DDD; border-bottom: 2px solid black;}
            td {border: 1px outset black;}
        -->
    </style>
    <title>IM > Database access example</title>
</head>    
<body>
<?
    // connect to the database using pg_connect(host=alexandria.sanm.hull.ac.uk user=<username> password='' dbname=<username>
    // notice that the password section is two single quotes - ' - not double quotes - ".
    // this sets up a connection to the DB ready to execute a query
    $DBconnection = pg_connect("host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=431580");
    if (!$DBconnection) // a basic 'if' statement to check that the connection hasn't failed
    {
        print"<h3>Error connecting to the database!</h3>";
    }
    else
    {
    	$address = $_POST['address'];
    	$name = $_POST['name'];
    	$sex = $_POST['sex'];
    	$phone = $_POST['phone'];
    	$pass = $_POST['password'];
        // create an sql query and store it in a variable
        $SQLquery = "INSERT INTO customer (address, name, phone, sex, password) VALUES ('".$address."', '".$name."', '".$phone."', '".$sex."', '".$pass."');";
        
        //execute the query on the database - notice that the parameters passed to the function are the connection object and the string variable containing the query
        // the results of pg_query are returned as a 'result resource' that is stored in this case as $resultSet and which needs to be processed to extract the data from it
       $resultSet = pg_query($DBconnection, $SQLquery);
        
        // count the number of rows that have been returned
         $result = pg_query("SELECT * FROM customer");
        // $resultset = pg_query($conn, "SELECT 'id','address','name','phone','sex','password' FROM customer");
        // $array = pg_fetch_all($resultset);

        // print the heading and start of the table
        print "<h3>The contents of the customer table are:</h3>\n";
        print "<table cellpadding=\"0\" cellspacing=\"0\"><tr><th>Customer ID</th><th>Address</th><th>Name</th><th>Phone</th><th>Sex</th><th>Password</th></tr>\n";
    
		while($row =pg_fetch_array($result)){    
            // this is where the actual values are extracted from the result set
            // pg_fetch_row() gets an array of values from the result set for the specified row number (in this case whatever $i has got to)
            // 'list ()' creates separate named variables for each item in an array
            print"<tr><td>".$row['id']."</td><td>".$row['address']."</td><td>".$row['name']."</td><td>".$row['phone']."</td><td>".$row['sex']."</td><td>".$row['password']."</td></tr>\n";
        }
        print "</table>\n";
    }
?>


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



?>





</body>
</html>
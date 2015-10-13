

The source code for selectAndDisplay.php is as follows:

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
    // connect to the database using pg_connect(host=alexandria.sanm.hull.ac.uk user=<431580> password='<david333>' dbname=<431580>
    // notice that the password section is two single quotes - ' - not double quotes - ".
    // this sets up a connection to the DB ready to execute a query
    $DBconnection = pg_connect("host=alexandria.sanm.hull.ac.uk user=testdb password='testdb' dbname=testdb");
    if (!$DBconnection) // a basic 'if' statement to check that the connection hasn't failed
    {
        print"<h3>Error connecting to the database!</h3>";
    }
    else
    {
        // create an sql query and store it in a variable
        $SQLquery = "select * from w31customer";
        
        //execute the query on the database - notice that the parameters passed to the function are the connection object and the string variable containing the query
        // the results of pg_query are returned as a 'result resource' that is stored in this case as $resultSet and which needs to be processed to extract the data from it
        $resultSet = pg_query($DBconnection, $SQLquery);
        
        // count the number of rows that have been returned
        $rowCount = pg_numrows($resultSet);
        
        // print the heading and start of the table
        print "<h3>The contents of the product table are:</h3>\n";
        print "<table cellpadding=\"0\" cellspacing=\"0\"><tr><th>Product ID</th><th>Customer Name</th><th>Address</th><th>Phone</th></tr>\n";
        
        // set up a loop that will repeat as many times as there are results returned from the DB
        for ($i=0; $i<$rowCount; $i++)
        {
            // this is where the actual values are extracted from the result set
            // pg_fetch_row() gets an array of values from the result set for the specified row number (in this case whatever $i has got to)
            // 'list ()' creates separate named variables for each item in an array
            list($id, $name, $category, $price) = pg_fetch_row($resultSet,$i);
            print"<tr><td>$id</td><td>$name</td><td>$category</td><td>". $price ."</td></tr>\n";
        }
        print "</table>\n";

		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$cid = $id+2;
			$query = "INSERT INTO w31customer (cid, cname, caddress, ctel) VALUES (".$cid.",'".$name."','".$address."','".$phone."')";
			pg_query($DBconnection, $query);
			echo '<font color="red">Query was successfull, please refesh the page to view the results</font>';
		}
    }
?>

<p>View the <a href="selectAndDisplaySource.php" title="PHP source code for this page">PHP source code</a> for this page.</p>
</body>
</html>

<?php
   
    // connect to the database using pg_connect(host=alexandria.sanm.hull.ac.uk user=431580 password='<david333>' dbname=<431580>
    // notice that the password section is two single quotes - ' - not double quotes - ".
    // this sets up a connection to the DB ready to execute a query
   
    $DBconnection = pg_connect("host=150.237.105.37 port=5432 user=431580 password='<david333>' dbname=431580");
   
    if (!$DBconnection) // a basic 'if' statement to check that the connection hasn't failed
    {
        print"<h3>Error connecting to the database!</h3>";
    }
    else
    {
       // create an sql query and store it in a variable
       $SQLquery = "select * from customer";
        
       //execute the query on the database - notice that the parameters passed to the function are the connection object and the string variable containing the query
       // the results of pg_query are returned as a 'result resource' that is stored in this case as $resultSet and which needs to be processed to extract the data from it
       $resultSet = pg_query($DBconnection, $SQLquery);
        
       // count the number of rows that have been returned
       $rowCount = pg_num_rows($resultSet);
        
       echo $rowCount;
       echo "it's ok";
    } 
?>

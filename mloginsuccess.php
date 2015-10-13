<?php
session_start();
if(!isset($_SESSION['loged'])){
header("location:memberlogin.php");
}
?>

<html>
<body>
Login Successful
</body>
</html>
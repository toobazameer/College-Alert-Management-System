<?php
//including the database connection file
include("config1.php");

//getting id of the data from url
$e_id = $_GET['id'];
 
//deleting the row from table
$result = mysql_query("DELETE FROM event WHERE e_id=$e_id");
 
//redirecting to the display page (index.php in our case)
header("Location:index2.php");
?>
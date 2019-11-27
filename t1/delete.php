<?php
//including the database connection file
include("config1.php");

//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
$result = mysql_query("DELETE FROM enrolment WHERE id=$id");
 
//redirecting to the display page (index.php in our case)
header("Location:index1.php");
?>
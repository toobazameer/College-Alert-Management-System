<?php
//including the database connection file
include ("config.inc");
 
//fetching data in descending order (lastest entry first)
$result = mysql_query("SELECT email FROM site_user_info"); // mysql_query is deprecated
//$result = mysqli_query($mysqli, "SELECT * FROM tbl_uploads ORDER BY id DESC"); // using mysqli_query instead
        $t="";
        while($res = mysql_fetch_array($result)) 
        {  
            //echo "<td>".$res['email']."</td>";
            $t=$t+$res['email'];
            echo $t;
        }
?>
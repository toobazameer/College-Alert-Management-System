<?php
include('config.inc');
$to[]="";
 $result=mysql_query("SELECT email FROM site_user_info"); 
 while($res = mysql_fetch_array($result)) 
 {
    $email[]=$res['email'];
 $to=implode($email,",");  

 }

echo $to;
$url = "http://51.15.140.149/mail.php?body=hello+from+php+latest&to=".$to."&subject=%22hello+from+email&fname=College+Alert+Management+System&from=toobazameer99@gmail.com";

    file_get_contents($url);
    // echo $to; 
?>
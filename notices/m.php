<?php
$subject="Test mail";
$to="sumaiyyabano974@gmail.com";
$body="This is a test mail";
if(mail($to,$subject,$body))
echo "Mail sent successfully";
else
echo "Mail not sent";
?>
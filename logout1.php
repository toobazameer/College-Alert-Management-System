<html>
  <head><link rel="shortcut icon" href="image/CAMS Logo.jpg">
     <title>Redirect</title>
  </head>
  <body bgcolor="#FFFFFF">
<h2>You Successfully Logout Your Session...</h2>
<?php
session_start();
   {
    header('Refresh: 5; URL=main.php?redirect='.$_SERVER['PHP_SELF']);
    echo '<p>You will be redirected to the home page in 5 seconds.</p>';
    echo '<p> If your browser doesn\'t redirect you properly automatically,'.'<a href="main.php?redirect='.$_SERVER['PHP_SELF'].'">Click Here </a>.</p>';
    die();
   }
?>
</body>
</html>
<html>
  <head>
     <title>auth</title>
  </head>
  <body bgcolor="#DFDFDF">
<?php
//start or continue session
session_start();
   if(!isset($_SESSION['logged']))
   {
    header('Refresh: 5; URL=home.php?redirect='.$_SERVER['PHP_SELF']);
    echo '<p>You will be redirected to the home page in 5 seconds.</p>';
    echo '<p> If your browser doesn\'t redirect you properly automatically,'.'<a href="home.php?redirect='.$_SERVER['PHP_SELF'].'">Click Here </a>.</p>';
    die();
   }
?>
</body>
</html>
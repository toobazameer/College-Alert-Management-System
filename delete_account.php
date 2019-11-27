<?php
include ('auth.inc');
include('config.inc');

if(isset($_POST['submit'])&& $_POST['submit']=='Yes')
{
   // $query='DELETE FROM site_user,user_pass,site_user_info WHERE u.user_name="'.mysql_real_escape_string($_SESSION['user_name'],$db).'"';
     //  mysql_query($query,$db) or die(mysql_error($db));
       
    //$query='DELETE FROM site_user WHERE user_name="'.mysql_real_escape_string($_SESSION['user_name'],$db).'"';
    $query='DELETE FROM site_user WHERE user_name="'.mysql_real_escape_string($_SESSION['user_name'],$db).'"';
    mysql_query($query,$db) or die(mysql_error($db));
    
     $query='DELETE FROM user_pass WHERE user_name="'.mysql_real_escape_string($_SESSION['user_name'],$db).'"';
    mysql_query($query,$db) or die(mysql_error($db));
    
    $_SESSION['logged']=null;
    $_SESSION['user_name']=null;
?>
<html>
 <head><link rel="shortcut icon" href="image/CAMS Logo.jpg">
   <title>Delete Account</title>
 </head>
  <body bgcolor="#FFFFFF" vlink="blue" alink="blue" link="blue" >
  <?php include 'header1.php' ; ?>
        <TABLE cellSpacing=0 cellPadding=0 width="100%" height="68%" border="" background="image1/bg.jpg">
          <TBODY>
              <TR>
                <TD vAlign=center align=center width="80%" bgColor=#FFFFFF  background="image1/bg.jpg" height="200">
                       <p><strong>Your Account has been deleted.</strong></p>
                       <p><a href="main.php">Click here</a> to return to the main page.</p>
                </TD>
              </TR>
          </TBODY>
        </TABLE>
     <?php include 'footer.php'; ?>
  </body>
</html>
<?php
   mysql_close($db);
   die();
}
else
{
?>
<html>
  <head>
    <title>Delete Account</title>
    <script type="text/javascript">
      window.onload=function()
      {
        document.getElementById('cancel').onclick=goBack;
      }
      function goBack()
      {
        history.go(-1);
      }
    </script>
  </head>
   <body bgcolor="#FFFFFF" vlink="blue" alink="blue" link="blue" >
  <?php include 'header1.php' ; ?>
  
        <TABLE cellSpacing=0 cellPadding=0 width="100%" border="" height="68%">
          <TBODY>
              <TR>
                <TD vAlign=center align=center width="80%" bgColor=#FFFFFF  background="image1/bg.jpg">
                     <p>Are you sure you want to delete your account?</p>
                     <p>There is no way to retrieve your account once you confirm!...</p>
                     <form action="delete_account.php" method="post">
                     <div>
                       <input type="submit" name="submit" value="Yes" />
                       <input  type="button" name="cancel" value="No" onclick="history.go(-1)"/>
                     </div>
                     </form>
                 </TD>
              </TR>
          </TBODY>
        </TABLE>
     <?php include 'footer.php'; ?>
  </body>
</html>
<?php    
}

?>
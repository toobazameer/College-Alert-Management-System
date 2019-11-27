<?php
  
  session_start();
  include ('config.inc');
?>
<html>
  <head><link rel="shortcut icon" href="image/CAMS Logo.jpg">
     <title>Main Page</title>
  </head>
  <body bgcolor="#DFDFDF" vlink="white" alink="white" link="white" >
  <?php include 'header1.php' ; ?>
  <?php include 'header_menu.php' ; ?>
        <TABLE cellSpacing=0 cellPadding=0 width="100%" border="">
          <TBODY>
              <TR>
                <TD vAlign=center align=center width="80%" bgColor=#E0E3FE  background="image1/bg.jpg" height="200">
                                    
                    <h1>Welcome to the home page!</h1>
                    
                    <?php
                        if(isset($_SESSION['logged'])&&$_SESSION['logged']==1)
                        {
                            //user is logged in
                        $query='SELECT admin_level FROM site_user WHERE email like "'.$_SESSION['email'].'"';
                        $result=mysql_query($query,$db);
                        //echo $result;
                    ?>
                        
                         <p>Thank You for logging into our system, <!--<b><?php echo $_SESSION['user_name']; ?>-->.</b></p>
                         <p>You may now <a href="user_personal.php">Click here</a> to go your own personal information area and update or remove your information should you wish to do so.</p>
                    <?php
                        
                        if($_SESSION['admin_level']>0)
                        {
                            echo '<p><a href="admin_area.php">Click here</a> to access your administrative tools....</p>';
                            echo '<p><a href="reg_id.php">Click here</a> to update student registration forms....</p>';
                        }
                        }
                        else
                        {
                    ?>
                      <p> <a href="register.php">Click here</a> to register as a new user.</p>
                      <p>You are currently not logged in to our system.Once you log in, you will have access to your personal area along with other user information.</p>
                      <p>If you have already registered,<a href="login.php">Click Here</a> to Login.</p>
                    <?php        
                        }
                    ?>
                 </TD>
              </TR>
          </TBODY>
          </TABLE>
     <?php include 'footer.php'; ?>
  </body>
</html>
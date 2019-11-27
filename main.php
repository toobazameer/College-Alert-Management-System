<?php
  
  session_start();
  include ('config.inc');
?>
<html>
  <head><link rel="shortcut icon" href="image/CAMS Logo.jpg">
     <title>Main Page</title>
  </head>
  <body bgcolor="#FFF8F7" vlink="blue" alink="blue" link="blue" >
  <?php include 'header1.php' ; ?>
   

        <TABLE cellSpacing=0 cellPadding=0 width="100%" border="">
          <TBODY>
              <TR>
              
                <TD vAlign=center align=center width="80%" bgColor="white" background="image1/bg.jpg" height="460">
                                    
                    <h1>Welcome to the Home Page!</h1>
                    <?php
                        if(isset($_SESSION['logged'])&&$_SESSION['logged']==1)
                        {
                            //user is logged in
                        $query='SELECT admin_level FROM site_user WHERE email like "'.$_SESSION['email'].'"';
                        $result=mysql_query($query,$db);
                        //echo $result;
                    ?>
                        
                         <p>Thank You for logging into our system, <!--<b><?php echo $_SESSION['user_name']; ?>-->.</b></p>
                                            <p><a href="notices/index3.php"">Click here </a>to go to the Notification Page</p>
                                            
                                             
<p><a href="user_personal.php">Update</a> your own personal information</p>
<p>Click here to<a href="logout.php?log=out">&nbsp;Logout</a></p> 
                    
                    <?php
                        
                        if($_SESSION['admin_level']>0)
                        {
                            echo '<p><a href="admin_area.php">Click here</a> to access your administrative tools....</p>';
                            echo'<p><a href="t1/add.html">Click Here</a> to add new records</p>';
                            echo'<p><a href="notices/add5.php">Click Here</a> to make any new update</p>';
                          
                           
                        }
                        }
                        else
                        {
                    ?>
                      <p> <a href="register.php">Click here</a> to register as a new user.</p>
                      <p>You are currently not logged in to our system.</p>
                      <p><h3>Already Registered?<a href="login.php">Click Here</a> to Login.</p></h3>
                     
                    <?php        
                        }
                    ?>
                   
                    <br /> <br /><br /> <br />
                 </TD>
              </TR>
          </TBODY>
          </TABLE>
      
     <?php include 'footer.php'; ?>
     
  </body>
</html>
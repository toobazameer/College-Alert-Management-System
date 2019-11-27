<?php
 // session_start();
  include('auth.inc');
  include ('config.inc');
?>
<html>
  <head><link rel="shortcut icon" href="image/CAMS Logo.jpg">
     <title>User Page</title>
  </head>
  <body bgcolor="#FFFFFF" vlink="blue" alink="blue" link="blue" >
  <?php include 'header1.php' ; ?>
        <TABLE cellSpacing=0 cellPadding=0 width="100%"  background="image1/bg.jpg" border="0">
           <TBODY>
               <TR>
                  <TD vAlign=center align=left width="100%" background="image1/bg.jpg" bgColor=#FFFFFF >
<table width="100%" border="0">
                <tr>
                             <td width="50%">&nbsp;</td>
                             <td width="50%" valign="right"><div align="right">Click here to<a href="logout.php?log=out">&nbsp;Logout</a></div></td>
                           </tr>           
                         </table>                     
<table  bgcolor="#FFFFFF"  background="image1/bg.jpg" border="0">
                         <tr>
                           <!--<td valign="right"  width="500"><DIV align="right"><b><font size="8">Hii<!--<?php echo $_SESSION['user_name']; ?>--><!--</font></b></DIV></td>-->
                           <td width="50%">&nbsp;</td>

                         </tr>
                    </table>
                 </TD>
              </TR>
              <TR>
                <TD vAlign=center align=center width="80%" bgColor=#FFFFFF  background="image1/bg.jpg" height="450">
                    <h1>Welcome to your personal information area</h1>
                    <p>Here you can update your personal information, or delete your account.</p>
                    <p>Your information as you currently have it is shown below.</p>
                    <p><a href="main.php">Click here</a> to return to the home page.</p>
                     <?php
                         //$a=mysql_real_escape_string($_SESSION['user_name'],$db);
                         //echo $a;
                         $query='SELECT u.user_name,first_name,last_name,email,city,state,country,branch FROM user_pass u JOIN site_user_info i ON u.user_id=i.user_id WHERE  email = "'.mysql_real_escape_string($_SESSION['email'],$db).'"';
                         $result=mysql_query($query,$db) or die(mysql_error($db));
                         $row=mysql_fetch_array($result);
                         extract($row);
                         mysql_free_result($result);
                        
                     ?>
                    <table bgcolor="#FFFFFF" background="image1/bg.jpg" border="1">
                        <tr>
                         <td valign="top"  height="40" width="400"><DIV align=right><font size="4">Enrollment No:&nbsp; </font></DIV></td>
                         <td width="400" valign="top" align="left">&nbsp;<input  type="text" name="user_name" value="<?php echo $user_name; ?> " disabled=""/>
                         </td>
                       </tr>   
                      <tr>
                         <td valign="top"  height="40" width="400"><DIV align=right><font size="4">First Name:&nbsp; </font></DIV></td>
                         <td width="400" valign="top" align="left">&nbsp;<input  type="text" name="first_name" value="<?php echo $first_name; ?> " disabled=""/></td>
                      </tr>  
                      <tr>
                         <td valign="top"  height="40" width="400"><DIV align=right><font size="4">Last Name:&nbsp; </font></DIV></td>
                         <td width="400" valign="top" align="left">&nbsp;<input  type="text" name="last_name" value="<?php echo $last_name; ?> " disabled=""/></td>
                      </tr> 
                      <tr>
                         <td valign="top"  height="40" width="400"><DIV align=right><font size="4">Email:&nbsp; </font></DIV></td>
                         <td width="400" valign="top" align="left">&nbsp;<input  type="text" name="email" value="<?php echo $email; ?> " disabled=""/></td>
                      </tr>
                      <tr>
                         <td valign="top"  height="40" width="400"><DIV align=right><font size="4">City:&nbsp; </font></DIV></td>
                         <td width="400" valign="top" align="left">&nbsp;<input  type="text" name="city" value="<?php echo $city; ?> " disabled=""/></td>
                      </tr>
                      <tr>
                         <td valign="top"  height="40" width="400"><DIV align=right><font size="4">State:&nbsp; </font></DIV></td>
                         <td width="400" valign="top" align="left">&nbsp;<input  type="text" name="state" value="<?php echo $state; ?> " disabled=""/></td>
                      </tr>
                      <tr>
                         <td valign="top"  height="40" width="400"><DIV align=right><font size="4">Country:&nbsp; </font></DIV></td>
                         <td width="400" valign="top" align="left">&nbsp;<input  type="text" name="country" value="<?php echo $country; ?> " disabled=""/></td>
                      </tr>
                      <tr>
                         <td valign="top"  height="40" width="400"><DIV align=right><font size="4">Branch:&nbsp; </font></DIV></td>
                         <td width="400" valign="top" align="left">&nbsp;<input  type="text" name="branch" value="<?php echo $branch; ?> " disabled=""/></td>
                      </tr>
                    </table>
                    <p><a href="update_account.php">Update Account</a>
                       <a href="delete_account.php">Delete Account</a></p>
                   
                       <br />
                       <br />
                    
                </TD>
              </TR>
          </TBODY>
        </TABLE>
     
  <?php include 'footer.php'; ?>
 
  </body>
</html>
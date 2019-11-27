<?php
  session_unset();
  include('config.inc');
  $branch_list=array('Computer','Electronics','IT','Other than listed');
?>
<html>
  <head><link rel="shortcut icon" href="image/CAMS Logo.jpg">
     <title>Register</title>
      <style type="text/css">
       td{vertical-align: top;}
      </style>
  </head>
  <body bgcolor="#FFFFFF" vlink="blue" alink="blue" link="blue" >
                       
  <?php include 'header1.php' ; ?>
  
<TABLE cellSpacing=0 cellPadding=0 width="100%"  background="image1/bg.jpg" border="">
  <TBODY>
  <TR>
    <TD vAlign=top align=center width="80%" background="image1/bg.jpg" bgColor=#FFFFFF >
       <blockquote>
    
    
    <form action="commit_fr_reg.php?action=submit" method="post">    
      <table border="1" bgcolor="#FFFFFF">
        
        <tr>
           <table  bgcolor="#FFFFFF" background="image1/bg.jpg" border="0">
             
               <td width="40%">&nbsp;</td>
               <td valign="top" background="image1/bg.jpg" height="40"><DIV align=center><b><font size="8">Register</font></b></DIV></td>
               <td width="30%">&nbsp;</td>
             </tr>
           </table>
           <br />
           <br />
           <p> <a href="main.php">Click here</a> Go to Home Page</p> 
           <table bgcolor="#FFFFFF" background="image1/bg.jpg" border="1">
         
          <tr>  
             <td valign="top"  height="40" width="400"><DIV align=right><font size="4"><label for="first_name">First name:&nbsp;</label> </font></DIV></td>
             <td><input type="text" name="first_name" id="first_name" size="20" maxlength="20"  /></td>
           </tr>
             <tr>
             <td valign="top"  height="40" width="400"><DIV align=right><font size="4"><label for="last_name">Last name:&nbsp;</label> </font></DIV></td>
             <td><input type="text" name="last_name" id="last_name" size="20" maxlength="20"  /></td>
           </tr>
           <tr>
             <td valign="top"  height="40" width="400"><DIV align=right><font size="4"><label for="dob">Date of Birth(yyyy-mm-dd) :&nbsp;</label> </font></DIV></td>
             <td width="400" valign="top" align="left">&nbsp;
              <select name="year">
                    
                   <?php
                        echo '<option value=" ">Year</option>';
                        for($yr=date('Y');$yr>1970;$yr--)
                           {
                                echo '<option value="' . $yr . '">' . $yr . '</option>';
                           }
                   ?>
             </select>
             
             <select name="month">
                  <?php
                        echo '<option value=" ">month</option>';
                        for($month=1;$month<=9;$month++)
                           {
                                echo '<option value="' . $month . '">0' . $month . '</option>';
                           }
                           for($month=10;$month<=12;$month++)
                           {
                                echo '<option value="' . $month . '">' . $month . '</option>';
                           }
                        
                   ?>
             </select>
             
              <select name="day">
                    
                   <?php
                        echo '<option value=" ">day</option>';
                        for($day=1;$day<=31;$day++)
                           {
                                echo '<option value="' . $day . '">' . $day . '</option>';
                           }
                   ?>
             </select>
                                       
           </tr>
           <tr>
             <td valign="top"  height="40" width="400"><DIV align=right><font size="4"><label for="user_name">Enrollment No:&nbsp;</label></font></DIV></td>
             <td><input type="text" name="user_name" id="user_name" size="20" maxlength="20" /></td>
           </tr>  
           <tr>
             <td valign="top"  height="40" width="400"><DIV align=right><font size="4"><label for="u_pass">Password:&nbsp;</label> </font></DIV></td>
            <td><input type="password" name="u_pass" id="u_pass" size="20" maxlength="20"  /></td>
           </tr>
           <tr>
             <td valign="top"  height="40" width="400"><DIV align=right><font size="4"><label for="u_pass1">Confirm Password:&nbsp;</label> </font></DIV></td>
            <td><input type="password" name="u_pass1" id="u_pass1" size="20" maxlength="20"  /></td>
           </tr> 
            <tr>
            <td valign="top"  height="40" width="400"><DIV align=right><font size="4"><label for="email">Email:&nbsp;</label> </font></DIV></td>
             
             <td width="400" valign="top" align="left"><input type="text" name="email" id="email" size="20" maxlength="50"  />&nbsp;</td>
           </tr>  
           
            <tr>
             <td valign="top"  height="40" width="400"><DIV align=right><font size="4"><label for="city">City:&nbsp;</label> </font></DIV></td>
              <td><input type="text" name="city" id="city" size="20" maxlength="20"  /></td>
           </tr>
            <tr>
             <td valign="top"  height="40" width="400"><DIV align=right><font size="4"><label for="state">State:&nbsp;</label> </font></DIV></td>
             <td><input type="text" name="state" id="state" size="20" maxlength="20" /></td>
           </tr>
           <tr>
             <td valign="top"  height="40" width="400"><DIV align=right><font size="4"><label for="country">Country:&nbsp;</label> </font></DIV></td>
             <td><input type="text" name="country" id="state" size="20" maxlength="20" /></td>
           </tr>
            <tr>
             <td valign="top"  height="40" width="400"><DIV align=right><font size="4"><label for="branch">Branch:&nbsp;</label> </font></DIV></td>
             <td>
                   <select name="branch[]" id="branch" >
                       <?php
                           foreach($branch_list as $hobby)
                           {
                                if(in_array($hobby,$branch))
                                {
                                    echo '<option value="'.$hobby.'" selected="selected" >'.$hobby.'</option>';
                                }
                                else
                                {
                                    echo '<option value="'.$hobby.'">'.$hobby.'</option>';
                                }
                           }
                       ?>
                   </select>
           </tr>  
           <tr>
             <td valign="top"  height="40" width="100%" colspan="2" valign="top">&nbsp;<div align="center"><input type="submit" name="submit" value="Submit" /></div> </td>
           </tr>    
           </table>
           <br />
           <br />
           <p> <a href="main.php">Click here</a> Go to Home Page</p>
           
           </table>
        </tr>
      </table>
      
      </form>
      </blockquote>
    
    </TD>
  </TR>
  </TBODY>
  </TABLE>
     
  <?php include 'footer.php'; ?>
 
  </body>
</html>
<?php
session_start();
include('config.inc');
//filter incoming values
$email=(isset($_POST['email']))?trim($_POST['email']):'';
$u_pass=(isset($_POST['u_pass']))?trim($_POST['u_pass']):'';
$redirect=(isset($_REQUEST['redirect']))?trim($_REQUEST['redirect']):'main.php';

//protecting from mysql injection
$email=stripslashes($email);
$u_pass=stripslashes($u_pass);
?>
<html>
  <head><link rel="shortcut icon" href="image/CAMS Logo.jpg">
     <title>Log In</title>
  </head>
  <body bgcolor="#FFFFFF" vlink="blue" alink="blue" link="blue" >
  <?php include 'header1.php' ; ?>

  <TABLE cellSpacing=0 cellPadding=0 width="100%" border="" >
  <TBODY>
      <TR>
      <TD vAlign=center align=center width="80%" bgColor="white" background="image1/bg.jpg" height="460">
       <blockquote>
        <p> <h1>Welcome To the Login Page</h1></p> 
        <?php
        $error[]=array();
        

        if(isset($_POST['submit']))
        {
             $query='SELECT admin_level FROM site_user  WHERE '.'email="'.mysql_real_escape_string($email,$db).'" AND '.'u_pass=PASSWORD("'.mysql_real_escape_string($u_pass,$db).'")';
             $result=mysql_query($query,$db) or die(mysql_error($db));
             //echo $we=mysql_num_rows($result);
             if(mysql_num_rows($result)>0)
             {
                    //echo $user_name;
                  $row=mysql_fetch_assoc($result);//fetch the current user if it is admin with level 1
                  $_SESSION['email']=$email;
                  $_SESSION['logged']=1;
                  $_SESSION['admin_level']=$row['admin_level'];//making current user as admin  if admin level=1 
                  header('Refresh: 1;URL='.$redirect);
                  echo '<p>You will be redirected to your original page request.</p>';
                  echo '<p>if your browser doesn\'t redirect you properly automatically, '.'<a href="'.$redirect.'">Click here</a>.</p>';
             }
             else
             {
               header('Refresh: 10;URL='.$redirect);
                //echo 'hiiii';
                $_SESSION['email']='';
                $_SESSION['logged']=0;
                $_SESSION['admin_level']=0;
                               header('Refresh: 10;URL='.$redirect);
                //echo '2hiiii';
                echo '<p><strong>You have supplied an invalid username and/or'.' password! </strong>Please <a href="main.php">Click here'.'</a> to return  to the home page</p>';
                echo '<p><strong>Register as a new user </strong><a href="register.php">Click here'.'</a></p>';
         
            }
         }
?>

        <form action="login.php" method="post">
            <table>
		  <tr>
                     <td>Email Id: </td>
                     <td><input  type="text" name="email" maxlength="40" size="20" value="<?php echo $email; ?>"/></td>
                   </tr>
                   <tr>
                     <td>Password: </td>
                     <td><input  type="password" name="u_pass" maxlength="20" size="20" value="<?php echo $u_pass; ?>"/></td>
                   </tr>
                   <tr>
                     <td>
                     <input type="hidden"  name="redirect" value="<?php echo $redirect; ?>"/>
                     <input type="submit" name="submit" value="Login"/>
                     </td>
                   </tr>
            </table>
  </form>
        
        
        
        </TD>
      </TR>
  </TBODY>
  </TABLE>
     
  <?php include 'footer.php'; ?>
 
  </body>
</html>
<?php     
 include ('config.inc');
 //filter incoming values
$first_name =(isset($_POST['first_name']))?trim($_POST['first_name']):'';
$last_name =(isset($_POST['last_name']))?trim($_POST['last_name']):'';
$user_name=(isset($_POST['user_name']))?trim($_POST['user_name']):'';
$u_pass=(isset($_POST['u_pass']))?trim($_POST['u_pass']):'';
$y=(isset($_POST['year']))?trim($_POST['year']):'';
$m=(isset($_POST['month']))?trim($_POST['month']):'';
$d=(isset($_POST['day']))?trim($_POST['day']):'';
$email=(isset($_POST['email']))?trim($_POST['email']):'';
$city=(isset($_POST['city']))?trim($_POST['city']):'';
$state=(isset($_POST['state']))?trim($_POST['state']):'';
$country=(isset($_POST['country']))?trim($_POST['country']):'';
$branch=(isset($_POST['branch'])&&is_array($_POST['branch']))?$_POST['branch']:array();
$cpass=(isset($_POST['u_pass1']))?trim($_POST['u_pass1']):'';
?>
<html>
  <head><link rel="shortcut icon" href="image/CAMS Logo.jpg">
     <title>Commit from office</title>
  </head>
  <body bgcolor="#FFFFFF" vlink="blue" alink="blue" link="blue" >
  <?php include 'header1.php' ; ?>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border="" background="image1/bg.jpg">
  <TBODY>
      <TR >
      <TD vAlign=center align=center width="80%" bgColor=#FFFFFF background="image1/bg.jpg" height="450">
  <?php
      switch($_GET['action'])
      {
        case 'submit':
              $dob=$y."-".$m."-".$d;
              $error=array();
                //make sure mandatory fields have been entered
                if(empty($user_name))
                {
                    $error[]='Enrollment cannot be blank.';
                }
                //check if email  is already present
                $query='SELECT email FROM site_user_info WHERE email="'.mysql_real_escape_string($email,$db).'"';
                $result=mysql_query($query,$db) or die(mysql_error($db));
                if(mysql_num_rows($result)>0)
                {
                    $error[]='Email '.$email.' is already registered';
                    //$email='';
                }
                mysql_free_result($result);
                
                 if(empty($first_name))
                {
                    $error[]='Firstname can not be blank.';
                }
                
                if(empty($last_name))
                {
                    $error[]='Lastname can not be blank.';
                }
                
                if(empty($u_pass) || $cpass!=$u_pass)
                {
                    $error[]='Password is Blank or Not Match';
                }
                    
                if(empty($email))
                {
                    $error[]='Email can not be blank.';
                }
            
                if(count($error)>0)
                  {

                    echo '<p><strong style="color:#FF0000;">Unable to process your'.' registration. </strong></p>';
                    echo '<p>Please fix the following: </p>';
                    echo '<ul>';
                    foreach($error as $error)
                    {
                      echo '<li>'.$error.'</li>';
                    }
                    echo '</ul>';
                    echo '<DIV align="center"><FONT face="Arial Rounded MT Bold" color=#11132F  size=4><a href="register.php">Click here</a> to return.</p></FONT></DIV>';
                  }
                else
                 {//no error so enter the information into the database
                    
                     $query='INSERT INTO user_pass(user_id,user_name,u_pass) VALUES(NULL,"'.mysql_real_escape_string($user_name,$db).'","'.mysql_real_escape_string($u_pass,$db).'")';
                      $result=mysql_query($query,$db) or die(mysql_error());
                      $user_id=mysql_insert_id($db);
                      
                      $query='INSERT INTO site_user(user_id,user_name,email,u_pass) VALUES(NULL,"'.mysql_real_escape_string($user_name,$db).'","'.mysql_real_escape_string($email,$db).'",'.'PASSWORD("'.mysql_real_escape_string($u_pass,$db).'"))';
                      $result=mysql_query($query,$db) or die(mysql_error());
                      $user_id=mysql_insert_id($db);
                      
                      $query='INSERT INTO site_user_info(user_id,first_name,last_name,dob,email,city,state,country,branch)
                              VALUES('.$user_id.','.'"'.mysql_real_escape_string($first_name,$db).'",
                                                  '.'"'.mysql_real_escape_string($last_name,$db).'",
                                                  '.'"'.$dob.'",
                                                  '.'"'.mysql_real_escape_string($email,$db).'",
                                                  '.'"'.mysql_real_escape_string($city,$db).'",
                                                  '.'"'.mysql_real_escape_string($state,$db).'",
                                                  '.'"'.mysql_real_escape_string($country,$db).'",
                                                  '.'"'.mysql_real_escape_string(join(',',$branch),$db).'")';
                      $result=mysql_query($query,$db)or die(mysql_error());
                      echo '<DIV align="center"><FONT face="Arial Rounded MT Bold" color=#11132F size=7><p>Done!</p></FONT></DIV>';
                      echo '<DIV align="center"><FONT face="Arial Rounded MT Bold" color=#11132F size=4><a href="main.php">Click here</a> to return to home page.</p></FONT></DIV>';
                  }
                  break;       
        }
              
 ?>
 </TD>
      </TR>
  </TBODY>
  </TABLE>
      <?php include 'footer.php'; ?>
 </body>
 </html>
<?php
  include ('auth.inc');
  include ('config.inc');
  
  //$branch_list=array('Computer','Electronics','IT','Other than listed');
  if(isset($_POST['submit'])&& $_POST['submit']=='Update')
  {
    $user_name="123";
    //(isset($_POST['user_name']))?trim($_POST['user_name']):'';
    $user_id=(isset($_POST['user_id']))?$_POST['user_id']:'';
    //$password=(isset($_POST['password']))?trim($_POST['password']):'';
    $first_name=(isset($_POST['first_name']))?trim($_POST['first_name']):'';
    $last_name=(isset($_POST['last_name']))?trim($_POST['last_name']):'';
    $email=(isset($_POST['email']))?trim($_POST['email']):'';
    $city=(isset($_POST['city']))?trim($_POST['city']):'';
    $state=(isset($_POST['state']))?trim($_POST['state']):'';
    $branch=(isset($_POST['branch'])&&is_array($_POST['branch']))?$_POST['branch']:array();
    
    $error=array();
    //make sure the username and user_id is a valid  pair (we don't want people to try  and manipulate the form to hack someone else's account)
    //echo $user_id;
    $name = mysql_real_escape_string($_SESSION['email'],$db);
    $uname = mysql_real_escape_string($_POST['user_name'],$db);
    //echo $name;
    $query='SELECT email FROM site_user WHERE user_id='.(int)$user_id;
    $result=mysql_query($query,$db) or die(mysql_error($db));
    $query='SELECT email FROM site_user WHERE email like "'.mysql_real_escape_string($name,$db).'"';
    $result=mysql_query($query,$db) or die(mysql_error($db));
    if(!isset($result))
    {
        $error[]='invalid user id...try again!';
    }
    if(mysql_num_rows($result)==0)
    {
?>
 <html>
  <head><link rel="shortcut icon" href="image/CAMS Logo.jpg">
     <title>Update Account Info</title>
  </head>
  <body bgcolor="#FFFFFF" vlink="blue" alink="blue" link="blue" >
  <?php include 'header1.php' ; ?>
 
        <TABLE cellSpacing=0 cellPadding=0 width="100%" border="" background="image1/bg.jpg">
          <TBODY>
              <TR>
                <TD vAlign=center align=center width="80%" bgColor=#E0E3FE  background="image1/bg.jpg" height="200">
               <p><strong>Don't try to break out form!...</strong></p>
                 </TD>
              </TR>
          </TBODY>
          </TABLE>
    
  </body>
</html>
<?php
    mysql_free_result($result);
    mysql_close_db($db);
    die();
    }
    
    mysql_free_result($result);       
     if(empty($first_name))
    {
        $error[]='first_name can not be blank.';
    }
    
    if(empty($last_name))
    {
        $error[]='last_name can not be blank.';
    }
    
    if(empty($email))
    {
        $error[]='email can not be blank.';
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
      }
    else
    {
      //no error so enter the information into the database.
      //echo $user_id;
      $query='UPDATE site_user_info SET 
              first_name="'.mysql_real_escape_string($_POST['first_name'],$db).'",
              last_name="'.mysql_real_escape_string($_POST['last_name'],$db).'",
              email="'.mysql_real_escape_string($_POST['email'],$db).'",
              city="'.mysql_real_escape_string($_POST['city'],$db).'",
              state="'.mysql_real_escape_string($_POST['state'],$db).'",
              country="'.mysql_real_escape_string($_POST['country'],$db).'",
              branch="'.mysql_real_escape_string($_POST['branch'],$db).'"
              WHERE
                   user_id='.$user_id;
          //echo $last_name;         
       $result=mysql_query($query,$db) or die(mysql_error($db));
      // echo $last_name;
      
 mysql_close($db);
?>

  <html>
  <head><link rel="shortcut icon" href="image/CAMS Logo.jpg">
     <title>Update Account Info</title>
  </head>
  <body bgcolor="#FFFFFF" vlink="blue" alink="blue" link="blue" >
  <?php include 'header1.php' ; ?>

        <TABLE cellSpacing=0 cellPadding=0 width="100%" border="" height="68%" background="image1/bg.jpg">
          <TBODY>
              <TR>
                <TD vAlign=center align=center width="80%" bgColor=#FFFFFF  height="100%"  background="image1/bg.jpg" >
                     <p><strong>Your account information has been updated.</strong></p>
                     <p><a href="user_personal.php">Click here</a> to return to your account. </p>
                </TD>
              </TR>
              
          </TBODY>
          </TABLE>
          
     <?php include 'footer.php'; ?>
  </body>
</html>
<?php   
     die();
    }
  }
  else
  {
    $query='SELECT site_user_info.user_id,site_user_info.user_name,first_name,last_name,email,city,state,country,branch AS my_branch FROM user_pass,site_user_info WHERE site_user_info.user_id=user_pass.user_id and email="'.mysql_real_escape_string($_SESSION['email'],$db).'" ';
    $result=mysql_query($query,$db) or die(mysql_error($db));
    $row=mysql_fetch_assoc($result);
    
    extract($row);
    $branch=explode(',',$my_branch);
    mysql_close($db);
  }
?>
<html>
  <head>
    <title>Update Account Info</title>
    <style type="text/css">
    td{vertical-align: top;}
    </style>
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

        <TABLE cellSpacing=0 cellPadding=0 width="100%" border="">
          <TBODY>
              <TR>
                <TD vAlign=center align=center width="80%" bgColor=#FFFFFF background="image1/bg.jpg" height="200">
                      <h1>Update Account Information</h1>
                      <form action="update_account.php" method="post">
                      <table>
                          <tr>
                            <td><label for="user_name">Enrolment No:</label> </td>
                            <td><input type="text" name="user_name" id="user_name" size="20" maxlength="20" value="<?php echo $user_name; ?>"  /></td>
                          </tr>
                          
                          <tr>
                            <td><label for="email">Email:</label></td>
                            <td><input type="text" name="email" id="email" size="20" maxlength="20" value="<?php echo $email; ?>" /></td>
                          </tr>
                           <tr>
                            <td><label for="first_name">First name:</label></td>
                            <td><input type="text" name="first_name" id="first_name" size="20" maxlength="20" value="<?php echo $first_name; ?>" /></td>
                          </tr>
                          <tr>
                            <td><label for="last_name">Last name:</label></td>
                            <td><input type="text" name="last_name" id="last_name" size="20" maxlength="20" value="<?php echo $last_name; ?>" /></td>
                          </tr>
                          <tr>
                            <td><label for="city">City:</label></td>
                            <td><input type="text" name="city" id="city" size="20" maxlength="20" value="<?php echo $city; ?>" /></td>
                          </tr>
                          <tr>
                            <td><label for="state">State:</label></td>
                            <td><input type="text" name="state" id="state" size="20" maxlength="20" value="<?php echo $state; ?>" /></td>
                          </tr>
                           <tr>
                            <td><label for="state">Country:</label></td>
                            <td><input type="text" name="country" id="country" size="20" maxlength="20" value="<?php echo $country; ?>" /></td>
                          </tr>
                          <tr>
                           <td><label for="branch">Branch:</label></td>
                           <td>
                           <select name="branch" id="branch" >
                             <option value="">Select Branch</option>
                             <option value="Computer">Computer</option>
                             <option value="Electronics">Electronics</option>
                             <option value="IT">IT</option>
                             <option value="Other">Other than list</option>
                           </select>
                           </td>
                          </tr>
                          <tr>
                          <td></td>
                          <td>
                           <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                          <input  type="submit" name="submit" value="Update"/>
                          <input  type="button" id="cancel" value="Cancel"/>
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
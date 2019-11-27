
<?php
include('auth.inc');

  if($_SESSION['admin_level']<1)
  {
    header('Refresh: 3; URL=user_personal.php');
     echo '<p><strong>You are not authorized for this page.</strong></p>';
     echo '<p>You are now being redirected to the main page.If your browser '.'doesn\'t redirect you automatically,<a href="main.php">Click here</a></p>';
     die();
  }
  include('config.inc');
  
  //$branch_list=array('Computer','Electronics','IT','Other than listed');
  if(isset($_POST['submit'])&& $_POST['submit']=='Update')
  {
    $user_name=(isset($_POST['user_name']))?trim($_POST['user_name']):'';
    $user_id=(isset($_POST['user_id']))?$_POST['user_id']:'';
    $u_pass=(isset($_POST['u_pass']))?trim($_POST['u_pass']):'';
    $first_name=(isset($_POST['first_name']))?trim($_POST['first_name']):'';
    $last_name=(isset($_POST['last_name']))?trim($_POST['last_name']):'';
    $email=(isset($_POST['email']))?trim($_POST['email']):'';
    $city=(isset($_POST['city']))?trim($_POST['city']):'';
    $state=(isset($_POST['state']))?trim($_POST['state']):'';
    $country=(isset($_POST['country']))?trim($_POST['country']):'';
    $branch=(isset($_POST['branch'])&&is_array($_POST['branch']))?$_POST['branch']:array();
    
    
    //delete user record
    if(isset($_POST['delete']))
    {
        $query='DELETE FROM site_user WHERE user_id='.$user_id;
        mysql_query($query,$db) or die(mysql_error());
        
        $query='DELETE FROM site_user_info WHERE user_id='.$user_id;
        mysql_query($query,$db) or die(mysql_error());
        
        $query='DELETE FROM user_pass WHERE user_id='.$user_id;
        mysql_query($query,$db) or die(mysql_error());
        
?>
<html>
  <head><link rel="shortcut icon" href="image/CAMS Logo.jpg">
    <title>Update Account Info</title>
  </head>
  <body bgcolor="#FFFFFF" vlink="blue" alink="blue" link="blue" >
  <?php include 'header1.php' ; ?>
  
        <TABLE cellSpacing=0 cellPadding=0 width="100%" border="">
          <TBODY>
              <TR>
                <TD vAlign=center align=center width="80%" bgColor=#FFFFFF  background="image1/bg.jpg"  height="450">
                     <p><strong>The account has been deleted.</strong></p>
                     <p><a href="admin_area.php">Click here</a> to return to the admin area.</p>
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
    $error=array();
    if(empty($user_name))
    {
        $error[]='Enrollment No can not be blank.';
    }
    
    //check if username already is registered
    $query='SELECT user_name FROM site_user WHERE user_name="'.$user_name.'" AND user_id!='.$user_id;
    $result=mysql_query($query,$db) or die(mysql_error($db));
    if(mysql_num_rows($result)>0)
    {
        $error[]='Enrollment No '.$user_name.' is already registered.';
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
    
    if(empty($city))
    {
        $error[]='City field can not be blank.';
    }
    
    if(empty($state))
    {
        $error[]='State field can not be blank.';
    }
    if(empty($country))
    {
        $error[]='Country field can not be blank.';
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
        //no errror
        if(!empty($u_pass))
        {
            
            $query='UPDATE user_pass SET u_pass="'.mysql_real_escape_string($u_pass,$db).'" WHERE u.user_id='.$user_id;
            $result=mysql_query($query,$db) or die(mysql_error($db));
        }
         $query='UPDATE site_user_info SET 
              first_name="'.mysql_real_escape_string($_POST['first_name'],$db).'",
              last_name="'.mysql_real_escape_string($_POST['last_name'],$db).'",
              email="'.mysql_real_escape_string($_POST['email'],$db).'",
              city="'.mysql_real_escape_string($_POST['city'],$db).'",
              state="'.mysql_real_escape_string($_POST['state'],$db).'",
              country="'.mysql_real_escape_string($_POST['city'],$db).'",
              branch="'.mysql_real_escape_string($_POST['branch'],$db).'"
              WHERE user_id='.$user_id;         
       $result=mysql_query($query,$db) or die(mysql_error());
       
        $query='UPDATE site_user SET 
             user_name="'.mysql_real_escape_string($_POST['user_name'],$db).'"
              WHERE user_id='.$user_id;         
       $result=mysql_query($query,$db) or die(mysql_error());
       
       $query='UPDATE user_pass SET 
             user_name="'.mysql_real_escape_string($_POST['user_name'],$db).'"
              WHERE user_id='.$user_id;         
       $result=mysql_query($query,$db) or die(mysql_error());
       mysql_close($db);
       ?>
 <html>
   <head>
     <title>Update Account Info</title>
   </head>
      <body bgcolor="FFFFFF" vlink="blue" alink="blue" link="blue" >
      <?php include 'header1.php' ; ?>
     
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border="">
              <TBODY>
                  <TR>
                    <TD vAlign=center align=center width="80%" bgColor=#FFFFFF background="image1/bg.jpg" height="450">
                     <p><strong>Account information has been updated.</strong></p>
                     <p><a href="admin_area.php">Click here</a> to return to the admin area. </p>
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
    $user_id=(isset($_GET['id']))? $_GET['id']:0;
    if($user_id==0)
    {
        header('Location: admin_area.php');
        die();
    }
    //echo $user_id;
     $query='SELECT u.user_name,u_pass,first_name,last_name,email,city,state,country,branch AS my_branch 
             FROM user_pass u JOIN site_user_info i ON u.user_id=i.user_id 
             WHERE u.user_id='.$user_id;
     $result=mysql_query($query,$db) or die(mysql_error($db));
     if(mysql_num_rows($result)==0)
     {
        header('Location: admin_area.php');
        die();
     }
     $row=mysql_fetch_assoc($result);
     //echo $user_name;
     extract($row);
     //echo $password;
     $u_pass='';
     $branch=explode(',',$my_branch);
     
     mysql_free_result($result);
     mysql_close($db);
  }
?>
<html>
  <head><link rel="shortcut icon" href="image/CAMS Logo.jpg">
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
  
        <TABLE cellSpacing=0 cellPadding=0 width="100%" background="image1/bg.jpg" border="">
          <TBODY>
              <TR>
                <TD vAlign=center align=center width="80%" bgColor=#FFFFFF background="image1/bg.jpg" height="450">
                      <h1>Update Account Information</h1>
                      <form action="update_user.php" method="post">
                      <table>
                          <tr>
                            <td><label for="user_name">Enrollment No:</label> </td>
                            <td><input type="text" name="user_name" id="user_name" size="20" maxlength="20" value="<?php echo $user_name; ?>" /></td>
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
                            <td><label for="country">Country:</label></td>
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
                    <?php
                    if($_SESSION['admin_level']==1)
                    {
                        echo '</tr><tr>';
                        echo'<td></td>';
                        echo '<td><input type="checkbox" id="delete" name="delete"/>'.'<label for="delete">Delete</label></td>';
                    }
                    ?>
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
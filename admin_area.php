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
?>
<html>
 <head>
   <title>Administration Area</title>
   <style type="text/css">
    th{background-color: #DFDFDF;}
    .odd_row{background-color:  #DEDEDE;}
    .even_rowa{background-color: #12D342;}
   </style>
 </head>
 <body bgcolor="#FFFFFF" vlink="blue" alink="blue" link="blue">
    <?php include 'header1.php' ; ?>
 
   <TABLE cellSpacing=0 cellPadding=0 width="100%" border="2">
          <TBODY>
              <TR>
                <TD vAlign=center align=center width="80%" bgColor=#FFFFFF background="image1/bg.jpg" height="450">
                   <h1>Welcome to the Administrative section.</h1>
                   <p>Here you can view and manage other users.</p>
                   <p><a href="main.php">Click here </a>to return to the home page.</p>
                   <table style="width: 70%;">
                     <tr><th>Enrollment</th><th>First Name</th><th>Last Name</th><th>Email</th><th>City</th><th>State</th><th>Country</th><th>Branch</th></tr>
                <?php
                  $query='SELECT u.user_id,u.user_name,first_name,last_name,email,city,state,country,branch FROM user_pass u JOIN site_user_info i  ON u.user_id=i.user_id where u.user_id>1 ORDER BY user_name ASC';
                  $result=mysql_query($query,$db) or die(mysql_error($db));
                  $odd=true;
                  while($row=mysql_fetch_array($result))
                   {
                    echo ($odd==true)?'<tr class="odd_row">':'<tr class="class_even">';
                    $odd=!$odd;
                    echo '<td><a href="update_user.php?id='.$row['user_id'].'">'.$row['user_name'].'</td>';
                    echo '<td>'.$row['first_name'].'</td>';
                    echo '<td>'.$row['last_name'].'</td>';
                    echo '<td>'.$row['email'].'</td>'; 
                    echo '<td>'.$row['city'].'</td>';
                    echo '<td>'.$row['state'].'</td>';
                    echo '<td>'.$row['country'].'</td>';
                    echo '<td>'.$row['branch'].'</td>';
          
                  }
                  mysql_free_result($result);
                  mysql_close($db);
                ?>
   
                </TD>
              </TR>
          </TBODY>
          </TABLE>
    
   </table>
    <?php include 'footer.php'; ?>
 </body>
</html>
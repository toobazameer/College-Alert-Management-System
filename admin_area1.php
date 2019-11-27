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
                <TD vAlign=center align=center width="80%" bgColor=#E0E3FE background="image1/bg.jpg" height="200">
                   <h1>Welcome to the Administrative section.</h1>
                   <p>Here you can view and manage other users.</p>
                   <p><a href="main.php">Click here </a>to return to the home page.</p>
                   <table style="width: 70%;">
                     <tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Password</th></tr>
                <?php
                  $query='SELECT u.user_id,user_name,first_name,last_name,u_pass FROM user_pass u JOIN site_user_info i ON u.user_id=i.user_id ORDER BY user_name ASC';
                  $result=mysql_query($query,$db) or die(mysql_error($db));
                  $odd=true;
                  while($row=mysql_fetch_array($result))
                  {
                    echo ($odd==true)?'<tr class="odd_row">':'<tr class="class_even">';
                    $odd=!$odd;
                    echo '<td><a href="update_user.php?id='.$row['user_id'].'">'.$row['user_name'].'</a></td>';
                    echo '<td>'.$row['first_name'].'</td>';
                    echo '<td>'.$row['last_name'].'</td>';
                   // $a=PASSWORD("$row['password']");    
                    echo '<td>'.$row['u_pass'].'</td>';
                  }
                  mysql_free_result($result);
                  mysql_close($db);
                ?>
   
                </TD>
              </TR>
          </TBODY>
          </TABLE>
     <?php include 'footer.php'; ?>
   </table>
 </body>
</html>
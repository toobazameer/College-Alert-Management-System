<?php
//including the database connection file
include_once("config1.php");
 $result = mysql_query("SELECT * FROM notice ORDER BY n_id DESC"); // mysql_query is deprecated

?>
 
<html>
 <DIV align=center>
<TABLE class=lr cellSpacing=0 cellPadding=0 width="100%" border=0  background="sai/image1/bg.jpg" bgcolour=#000000>
  <TBODY>
  <TR>
    <TD width="75%" bgColor=#396097>
    <IMG height=200 src="logoh.jpg" width="100%"></IMG></TD>
  </TR>
  </TBODY>
</TABLE>
 <TABLE cellSpacing=0 cellPadding=0 width="100%"  background="image1/bg.jpg" border="">
          <TBODY>
              <TR>
              
                <TD vAlign=center align=center width="80%"  background="image1/bg.jpg" bgColor="white" height="">
                <head>    
    <title>Homepage</title>
</head>
 
<body>

    <a href="add5.php">Add New Data</a><br/><br/>
 
    <table width='100%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td width="80%">Notice</td>
             <td width="20%">Update</td>
        </tr>
        <?php 
        while($res= mysql_fetch_array($result))
         { 

            ?>
            
            <tr>
            <td> <?php echo $res['notice'];?> </td>
            <td> <a href="<?php echo 'uploads/'.$res['file'];?>" target="_blank"> View </a> | 
            <a href="<?php echo 'edit1.php?id='.$res['n_id']?> " > Edit </a> | 
            <a href="<?php echo 'delete1.php?id='.$res['n_id'];?>" onclick="return confirm('Are you sure you want to delete?');"> Delete </a> </td>
                     
   <?php
  } 
  
  ?>
  <?php
 
 
   // events index
//including the database connection file
include_once("config1.php");
 $result = mysql_query("SELECT * FROM event ORDER BY e_id DESC"); // mysql_query is deprecated

?>
       <table width='100%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td width="80%">Event</td>
             
            <td width="20%">Update</td>
        </tr>
        </tr>
        <?php 
           while($res= mysql_fetch_array($result))
         {  
            ?>
            
             <tr>
            <td> <?php echo $res['event'];?> </td>
            <td> <a href="<?php echo 'uploads/'.$res['file'];?>" target="_blank"> View </a> | 
            <a href="<?php echo 'edit2.php?id='.$res['e_id']?> " > Edit </a> | 
            <a href="<?php echo 'delete2.php?id='.$res['e_id'];?>" onclick="return confirm('Are you sure you want to delete?');"> Delete </a> </td>
                     
   <?php
  } 
  ?>
  <?php
         
         // marks index
//including the database connection file
include_once("config1.php");
 $result = mysql_query("SELECT * FROM marks ORDER BY m_id DESC"); // mysql_query is deprecated

?>
         <table width='100%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td width="80%">Marks</td>
             
            <td width="20%">Update</td>
        </tr>
        </tr>
        <?php 
           while($res= mysql_fetch_array($result))
         {  
            ?>
            
             <tr>
            <td> <?php echo $res['marks'];?> </td>
            <td> <a href="<?php echo 'uploads/'.$res['file'];?>" target="_blank"> View </a> | 
            <a href="<?php echo 'edit3.php?id='.$res['m_id']?> " > Edit </a> | 
            <a href="<?php echo 'delete3.php?id='.$res['m_id'];?>" onclick="return confirm('Are you sure you want to delete?');"> Delete </a> </td>
                   
   <?php
  } 
  ?>
  <?php
  
   //attendance index
//including the database connection file
include_once("config1.php");
 $result = mysql_query("SELECT * FROM attendance ORDER BY a_id DESC"); // mysql_query is deprecated

?>
<table width='100%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td width="80%">Attendance</td>
             
            <td width="20%">Update</td>
        </tr>
        </tr>
        <?php 
           while($res= mysql_fetch_array($result))
         {  
            ?>
            
             <tr>
            <td> <?php echo $res['attendance'];?> </td>
            <td> <a href="<?php echo 'uploads/'.$res['file'];?>" target="_blank"> View </a> | 
            <a href="<?php echo 'edit4.php?id='.$res['a_id']?> " > Edit </a> | 
            <a href="<?php echo 'delete4.php?id='.$res['a_id'];?>" onclick="return confirm('Are you sure you want to delete?');"> Delete </a> </td>
                        
   <?php
  } 
  ?>
  
    </table>
    </TD>
              </TR>
          </TBODY>
          </TABLE>
    <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0 align="center" width="100%">
        <TR>
        <TD align="center"><B>Copyright &copy;2016-17,Women's Polytechnic A.M.U All Rights Reserved</B></TD>    
    </TR>
    <TR>
        <TD align="center"><B>       Designed by:Sumaiyya Bano  &amp; Tooba Zameer   </B></TD>
        
    </TR>
</TABLE>
</body>
</html>
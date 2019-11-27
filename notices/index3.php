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
<br/>
    <p font align="center" ><h2>Welcome to the Notification Page</h2></p>
 
    <table width='100%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td width="80%">Notice</td>
             <td width="20%">View File</td>
        </tr>
        <?php 
        while($res= mysql_fetch_array($result))
         { 

            ?>
            
            <tr>
            <td> <?php echo $res['notice'];?> </td>
            <td> <a href="<?php echo 'uploads/'.$res['file'];?>" target="_blank"> View </a> </td></tr>
              
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
             
            <td width="20%">View File</td>
        </tr>
        </tr>
        <?php 
           while($res= mysql_fetch_array($result))
         {  
            ?>
            
             <tr>
            <td> <?php echo $res['event'];?> </td>
            <td> <a href="<?php echo 'uploads/'.$res['file'];?>" target="_blank"> View </a> </td></tr> 
                  
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
             
            <td width="20%">Marks</td>
        </tr>
        </tr>
        <?php 
           while($res= mysql_fetch_array($result))
         {  
            ?>
            
             <tr>
            <td> <?php echo $res['marks'];?> </td>
            <td> <a href="<?php echo 'uploads/'.$res['file'];?>" target="_blank"> View </a></td></tr>
               
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
             
            <td width="20%">View File</td>
        </tr>
        </tr>
        <?php 
           while($res= mysql_fetch_array($result))
         {  
            ?>
            
             <tr>
            <td> <?php echo $res['attendance'];?> </td>
            <td> <a href="<?php echo 'uploads/'.$res['file'];?>" target="_blank"> View </a> </td></tr>
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
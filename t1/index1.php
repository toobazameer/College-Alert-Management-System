<?php
//including the database connection file
include_once("config1.php");
 $result = mysql_query("SELECT * FROM enrolment ORDER BY id DESC"); // mysql_query is deprecated
?>
 
<html>
<head>    
<DIV align=center>
<TABLE class=lr cellSpacing=0 cellPadding=0 width="100%" border=0  bgcolour=#000000>
  <TBODY>
  <TR>
    <TD width="75%" bgColor=#396097>
    <IMG height=175 src="image1/logoh.png" width="100%"></IMG></TD>
  </TR>
  </TBODY>
</TABLE>
 <TABLE cellSpacing=0 cellPadding=0 width="100%" border="">
          <TBODY>
              <TR>
              
                <TD vAlign=center align=left width="100%" bgColor="white"  background="image1/bg.jpg"  height="100%">
                
<head>    
    <title>Homepage</title>
</head>
 
<body>
<br />
    <a href="add.html">Add New Data</a><br/><br/>
 
    <table width='100%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Enrollment</td>
            <td>Update</td>
        </tr>
        <?php 
        while($res = mysql_fetch_array($result)) 
        {  
            echo "<tr>";
            echo "<td>".$res['enr']."</td>";
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
      </TR>
          </TBODY>
          </TABLE>
</body>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0 align="center" width="100%">
        <TR>
        <TD align="center"><B>Copyright &copy;2016-17,Women's Polytechnic A.M.U All Rights Reserved</B></TD>    
    </TR>
    <TR>
        <TD align="center"><B>       Designed by:Sumaiyya Bano  &amp; Tooba Zameer   </B></TD>
        
    </TR>
</TABLE>
</html>
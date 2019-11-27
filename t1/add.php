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
              
                <TD vAlign=center align=center width="80%" bgColor="white" background="image1/bg.jpg" height="460">
                
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config1.php");
 
if(isset($_POST['Submit'])) {    
    $enr = $_POST['enr'];
        
    // checking empty fields
    if(empty($enr)) 
    {                
        if(empty($enr)) 
        {
            echo "<font color='red'>issue field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 
    else 
    { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysql_query("INSERT INTO enrolment(enr) VALUES('$enr')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index1.php'>View Result</a>";
    }
}
?>
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
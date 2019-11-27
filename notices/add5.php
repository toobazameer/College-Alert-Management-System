<html>
<head>
  <DIV align=center>
<TABLE class=lr cellSpacing=0 cellPadding=0 width="100%" border=0  bgcolour=#000000>
  <TBODY>
  <TR>
    <TD width="75%" bgColor=#396097>
    <IMG height=175 src="logoh.jpg" width="100%"></IMG></TD>
  </TR>
  </TBODY>
</TABLE>
 <TABLE cellSpacing=0 cellPadding=0 width="100%" border="">
 <a href="index2.php">Home</a>  
          <TBODY>
              <TR>
              
                <TD vAlign=center align=center width="" bgColor="white" height="460">
               
            
    <title>Add Data</title>
 
   <TD width="1%" bgColor=#354066>&nbsp;</TD>
    <TD vAlign=top align=left width="24%" bgColor=#FFFFFF  background="image1/bg.jpg" height="100%">
      
    </head>
    
    <form action="add1.php" method="post" name="form1" enctype="multipart/form-data">
    <br />
    <br />    
    <br />
    <br/> <table width="25%" border="0">
            <tr> 
          <br />
                <td>Notice</td>
                <td><input type="text" name="notice"></td>
            </tr>
          <tr>
          
          <input type="file" name="photo" />
          <td><input type="submit" name="Submit" value="Add"></td>
          
          </tr>
        </table>
 
     </form>
     
     </form>
    
   
</head>

 <TD width="1%" bgColor=#354066>&nbsp;</TD>
    <TD vAlign=top align=left width="24%" bgColor=#FFFFFF  background="image1/bg.jpg" height="100%">    
<body>
   
    <br/><br/>
 
    <form action="add2.php" method="post" name="form1" enctype="multipart/form-data">
       
    <br/><br/>
    <br/> <table width="25%" border="0">
            <tr> 
          <br />
                <td>Events</td>
                <td><input type="text" name="event"></td>
            </tr>
          <tr>
          
          <input type="file" name="photo" />
          <td><input type="submit" name="Submit" value="Add"></td>
          
          </tr>
        </table>
 
     </form>
       
      </form>
  </head>
     <TD width="1%" bgColor=#354066>&nbsp;</TD>
    <TD vAlign=top align=left width="24%" bgColor=#FFFFFF  background="image1/bg.jpg" height="100%">   
<body>
    
 
    <form action="add3.php" method="post" name="form1" enctype="multipart/form-data">
        
    <br/><br/>
    
    <br/>
        <table width="25%" border="0">
            <tr> 
            <br /><br />
               <td>Marks</td>
                <td><input type="text" name="marks"></td>
            </tr>
          <tr>
          
          <input type="file" name="photo" />
          <td><input type="submit" name="Submit" value="Add"></td>
          
          </tr>
        </table>
 
     </form>
     </form>
      
  </head>
  
   <TD width="1%" bgColor=#354066>&nbsp;</TD>
    <TD vAlign=top align=left width="24%" bgColor=#FFFFFF  background="image1/bg.jpg" height="100%">   
<body>
 
    <form action="add4.php" method="post" name="form1" enctype="multipart/form-data">
       
    <br/><br/><br/>
        <table width="25%" border="0">
            <tr> 
              <br /><br />
              <td>Attendance</td>
                <td><input type="text" name="attendance"></td>
            </tr>
          <tr>
          
          <input type="file" name="photo" />
          <td><input type="submit" name="Submit" value="Add"></td>
          
          </tr>
        </table>
 
     </form>
     </form>
      
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Problem While File Uploading !</label>
        <?php
 }
 else
 {
  ?>

        <?php
 }
 ?>
 
        
    </form>
    </TD>
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
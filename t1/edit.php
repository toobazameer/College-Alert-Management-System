<?php
// including the database connection file
include_once("config1.php");
 $id=$_GET['id'];
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $enr = $_POST['enr'];
    
  $updated=mysql_query("UPDATE enrolment SET  enr='$enr' where id='$id'") or die();
   if($updated)
  {
  $msg="Successfully Updated!!";
  header('Location:index1.php');}
    // checking empty fields
    // checking empty fields
   if(empty($enr)) 
    {                
        if(empty($enr)) 
        {
            echo "<font color='red'>issue field is empty.</font><br/>";
        }
        
    } 
    else 
    {    
        //updating the table
        $result = mysql_query("UPDATE enrolment SET issue='$enr' WHERE id=$id");        
        //redirectig to the display page. In our case, it is index1.php
        header("Location: index1.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysql_query("SELECT * FROM enrolment WHERE id=$id");
 
while($res = mysql_fetch_array($result))
{
    $enr = $res['enr'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="main1.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Enrolment</td>
                <td><input type="text" name="enr" value="<?php echo $enr;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
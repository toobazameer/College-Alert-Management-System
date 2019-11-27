<?php
// including the database connection file
include_once("config1.php");
 $a_id=$_GET['id'];
if(isset($_POST['update']))
{    
    $a_id = $_POST['id'];
    $attendance = $_POST['attendance'];
    
  $updated=mysql_query("UPDATE attendance SET  attendance='$attendance' where a_id=$a_id") or die();
   if($updated)
  {
  $msg="Successfully Updated!!";
  header('Location:index2.php');}
    // checking empty fields
    // checking empty fields
   if(empty($attendance)) 
    {                
        if(empty($attendance)) 
        {
            echo "<font color='red'>issue field is empty.</font><br/>";
        }
        
    } 
    else 
    {    
        //updating the table
        $result = mysql_query("UPDATE attendance SET issue='$attendance' WHERE a_id=$id");        
        //redirecting to the display page. In our case, it is index1.php
        header("Location: index2.php");
    }
}
?>
<?php
//getting id from url
$a_id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysql_query("SELECT * FROM attendance WHERE a_id=$a_id");
 
while($res = mysql_fetch_array($result))
{
    $attendance = $res['attendance'];
}
?>
<html>
<head>  
<a href="main1.php">Home</a>  
    <title>Edit Data</title>
</head>
 
<body>
    
    <br/><br/>
    
    <form name="form1" method="post" action="edit4.php">
        <table border="0">
            <tr> 
                <td>Attendance</td>
                <td><input type="text" name="attendance" value="<?php echo $attendance;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    
   
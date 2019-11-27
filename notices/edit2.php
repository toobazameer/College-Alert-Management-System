 <?php
    // table for events
// including the database connection file
include_once("config1.php");
 $e_id=$_GET['id'];
if(isset($_POST['update']))
{    
    $e_id = $_POST['id'];
    $event = $_POST['event'];
    
  $updated=mysql_query("UPDATE event SET  event='$event' where e_id=$e_id") or die();
   if($updated)
  {
  $msg="Successfully Updated!!";
  header('Location:index2.php');}
    // checking empty fields
    // checking empty fields
   if(empty($event)) 
    {                
        if(empty($event)) 
        {
            echo "<font color='red'>issue field is empty.</font><br/>";
        }
        
    } 
    else 
    {    
        //updating the table
        $result = mysql_query("UPDATE event SET issue='$event' WHERE e_id=$id");        
        //redirecting to the display page. In our case, it is index1.php
        header("Location: index2.php");
    }
}
?>
<?php
//getting id from url
$e_id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysql_query("SELECT * FROM event WHERE e_id=$e_id");
 
while($res = mysql_fetch_array($result))
{
    $event = $res['event'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
   
    <br/><br/>
    
    <form name="form1" method="post" action="edit2.php">
        <table border="0">
            <tr> 
                <td>Event</td>
                <td><input type="text" name="event" value="<?php echo $event;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>
</body>
</html>
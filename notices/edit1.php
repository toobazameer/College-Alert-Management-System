<?php
// including the database connection file
include_once("config1.php");
 $n_id=$_GET['id'];
if(isset($_POST['update']))
{    
    $n_id = $_POST['id'];
    $notice = $_POST['notice'];
    
  $updated=mysql_query("UPDATE notice SET  notice='$notice' where n_id=$n_id") or die();
   if($updated)
  {
  $msg="Successfully Updated!!";
  header('Location:index2.php');}
    // checking empty fields
    // checking empty fields
   if(empty($notice)) 
    {                
        if(empty($notice)) 
        {
            echo "<font color='red'>issue field is empty.</font><br/>";
        }
        
    } 
    else 
    {    
        //updating the table
        $result = mysql_query("UPDATE notice SET issue='$notice' WHERE n_id=$id");        
        //redirecting to the display page. In our case, it is index1.php
        header("Location: index2.php");
    }
}
?>
<?php
//getting id from url
$n_id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysql_query("SELECT * FROM notice WHERE n_id=$n_id");
 
while($res = mysql_fetch_array($result))
{
    $notice = $res['notice'];
}
?>
<html>
<head>  
<a href="main1.php">Home</a>  
    <title>Edit Data</title>
</head>
 
<body>
    
    <br/><br/>
    
    <form name="form1" method="post" action="edit1.php">
        <table border="0">
            <tr> 
                <td>Notice</td>
                <td><input type="text" name="notice" value="<?php echo $notice;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    
   
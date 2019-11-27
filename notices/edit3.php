<?php
// including the database connection file
include_once("config1.php");
 $m_id=$_GET['id'];
if(isset($_POST['update']))
{    
    $m_id = $_POST['id'];
    $marks = $_POST['marks'];
    
  $updated=mysql_query("UPDATE marks SET  marks='$marks' where m_id=$m_id") or die();
   if($updated)
  {
  $msg="Successfully Updated!!";
  header('Location:index2.php');}
    // checking empty fields
    // checking empty fields
   if(empty($marks)) 
    {                
        if(empty($marks)) 
        {
            echo "<font color='red'>Issue field is empty.</font><br/>";
        }
        
    } 
    else 
    {    
        //updating the table
        $result = mysql_query("UPDATE marks SET issue='$marks' WHERE m_id=$id");        
        //redirecting to the display page. In our case, it is index2.php
        header("Location: index2.php");
    }
}
?>
<?php
//getting id from url
$m_id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysql_query("SELECT * FROM marks WHERE m_id=$m_id");
 
while($res = mysql_fetch_array($result))
{
    $marks = $res['marks'];
}
?>
<html>
<head>  
<a href="main1.php">Home</a>  
    <title>Edit Data</title>
</head>
 
<body>
    
    <br/><br/>
    
    <form name="form1" method="post" action="edit3.php">
        <table border="0">
            <tr> 
                <td>Marks</td>
                <td><input type="text" name="marks" value="<?php echo $marks;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    
   
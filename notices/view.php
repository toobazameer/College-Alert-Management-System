<?php
include_once 'dbconfig.php';
?>
<html >
<head>
<title>File Uploading</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
  <?php include 'header1.php' ; ?>
<div id="body">
 <table width="80%" border="1">
    <tr>
    <th colspan="4">your uploads...<label><a href="index2.php">upload new files...</a></label></th>
    </tr>
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php
 $sql="SELECT * FROM upload";
 $result_set=mysql_query($sql);
 while($row=mysql_fetch_array($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
    </table>
    
</div>
</body>
</html>
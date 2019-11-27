<?php
  
  include_once 'config1.php';
?>
<html >
<head>
<link rel="shortcut icon" href="image/CAMS Logo.jpg">
<title>File Upload</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body bgcolor="#FFFFFF" vlink="blue" alink="blue" link="blue" >
    
    <?php include 'header1.php' ; ?>
          <br /><br />
           <br /><br />
            <br /><br />
            <br /><br />
        
  <form action="f2.php" method="post" enctype="multipart/form-data">

       <input type="file" name="file" />

        </table>   
        <button type="submit" name="btn-upload">upload</button>
     </form>
       <br /><br />
        <br /><br />
         <br /><br />
          <br /><br />
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
 
  <?php include 'footer.php'; ?>
     
</body>
</html>
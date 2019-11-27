<?php
  
  session_start();
  include ('config.inc');
?>
<html>
<html>
<body bgcolor="pink">
 <?php include 'header1.php' ; ?>
<center>
<h3> FILE UPLOADING </h3>
<hr>
<form action="fileupload.php" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<?php
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }
?>
<input type="file" name="file" id="file" />
<br />
<input type="submit" name="submit" value="Submit" />
</form>
</center>
</body>
</html>
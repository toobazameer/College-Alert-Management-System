<?php
include_once 'dbconfig.php';

   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
    
      
      if($file_size > 2097152)
       {
         $errors[]='File size must be exactly 2 MB';
      }
      
      if(empty($errors)==true) {
    
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
			
        
			
      </form>
      
   </body>
</html>
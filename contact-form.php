<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php
// Initialize variables and set to empty strings
$firstName=$lastName="";
$firstNameErr=$lastNameErr="";

// Validate input and sanitize
if ($_SERVER['REQUEST_METHOD']== "POST") {
   if (empty($_POST["firstName"])) {
      $firstNameErr = "Name is required";
   }
   else {
      $firstName = test_input($_POST["firstName"]);
   }
   if (empty($_POST["lastName"])) {
      $lastNameErr = "Email is required";
   }
   else {
      $lastName = test_input($_POST["lastName"]);
   }
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    <p>Please fill in this form and send us.</p>
    <p><span class="error">* required</span></p>

    <form action="process-form.php" method="post">
        <p>
            <label for="inputName">Name:<sup>*</sup></label>
            <input type="text" name="name" id="inputName"><span class="error">* <?php echo $firstNameErr; ?>
        </p>
        <p>
            <label for="inputEmail">Email:<sup>*</sup></label>
            <input type="text" name="email" id="inputEmail"><span class="error">* <?php echo $lastNameErr; ?><br><br>
        </p>
        <p>
            <label for="inputSubject">Subject:</label>
            <input type="text" name="subject" id="inputSubject">
        </p>
        <p>
            <label for="inputComment">Message:<sup>*</sup></label>
            <textarea name="message" id="inputComment" rows="5" cols="30"></textarea>
        </p>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>

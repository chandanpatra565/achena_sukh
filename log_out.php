<?php
session_start();
error_reporting(0);



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <?php include "analytics.php"; ?>
</head>
<body>
<?php  
        
        session_unset();
        session_destroy();
        header("Location: index.php");
        // require_once "index.php";
        
        
        ?>
  
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    
</body>
</html>


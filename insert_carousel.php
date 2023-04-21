<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the uploaded image data and text
  $pages_name = $_POST["pages_data"];
  $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name']));

  // Check if the uploaded file is a JPEG image
  if ($_FILES['image']['type'] !== 'image/jpeg') {
    echo "Error: Only JPEG images are allowed.";
    exit();
  }

  // Connect to the database
  include "Data_Base_conn.php";

  // Insert the data into the home_page table
  $query = "INSERT INTO carousel_database (Type,img) VALUES ('$pages_name','$imageData')";
  mysqli_query($conn, $query);

  // Close the database connection and redirect back to the form
  mysqli_close($conn);
  header('Location: Carousel_all.php');
  exit();
}
?>

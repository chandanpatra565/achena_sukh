<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the uploaded image data and text
  $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  $text = $_POST['text'];

  // Check if the uploaded file is a JPEG image
  if ($_FILES['image']['type'] !== 'image/jpeg' && !empty($imageData)) {
    echo "Error: Only JPEG images are allowed.";
    exit();
  }

  // Connect to the database
  include "Data_Base_conn.php";
  if (!empty($imageData) && !empty($text)) {
    // Insert the data into the home_page table
    $query = "INSERT INTO donation (img, text) VALUES ('$imageData', '$text')";
    mysqli_query($conn, $query);
    // Close the database connection and redirect back to the form
    mysqli_close($conn);
    header('Location: donation.php');
    exit();
    return;
  }
  // insert only text
  if (!empty($text)) {
    // Insert the data into the home_page table
    $query = "INSERT INTO donation (text) VALUES ('$text')";
    mysqli_query($conn, $query);
    // Close the database connection and redirect back to the form
    mysqli_close($conn);
    header('Location: donation.php');
    exit();
    return;
  }
  //insert only img
  if(!empty($imageData)){
    // Insert the data into the home_page table
    $query = "INSERT INTO donation (img) VALUES ('$imageData')";
    mysqli_query($conn, $query);
    // Close the database connection and redirect back to the form
    mysqli_close($conn);
    header('Location: donation.php');
    exit();
    return;
  }
  // Close the database connection and redirect back to the form
  mysqli_close($conn);
  header('Location: donation.php');
  exit();
}
?>

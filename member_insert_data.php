<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the uploaded image data and text
  $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  $name = $_POST['name'];
  $comment = $_POST['comments'];

  // Check if the uploaded file is a JPEG image
  if ($_FILES['image']['type'] !== 'image/jpeg' && !empty($imageData)) {
    echo "Error: Only JPEG images are allowed.";
    exit();
  }

  // Connect to the database
  include "Data_Base_conn.php";
  if (!empty($imageData) && !empty($name) && !empty($comment)) {
    // Insert the data into the home_page table
    $query = "INSERT INTO member (Name,img, comment) VALUES ('$name', '$imageData', '$comment')";
    mysqli_query($conn, $query);
    // Close the database connection and redirect back to the form
    mysqli_close($conn);
    header('Location: member.php');
    exit();
    return;
  }
}
?>

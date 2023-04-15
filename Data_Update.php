
<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the uploaded image data and text
$id = $_GET['id']; // Assuming the ID is passed in the URL
$imageData = $_FILES['image']['tmp_name'];
$text = $_POST['text'];


  // Connect to the database
  include "Data_Base_conn.php"; 
  
// Update image data
if (!empty($imageData)) {
    // Read the image data from the temporary file
    $imgData = file_get_contents($imageData);

    // Update the image data in the database using the $id as a condition
    $sql = "UPDATE home_page_data SET img = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $imgData, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Update text data
if (!empty($text)) {
    // Update the text data in the database using the $id as a condition
    $sql = "UPDATE home_page_data SET text = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $text, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
  header('Location: index.php');
  exit();
}
?>
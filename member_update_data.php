
<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the uploaded image data and text
$id = $_GET['id']; // Assuming the ID is passed in the URL
$imageData = $_FILES['image']['tmp_name'];
$name = $_POST['name'];
$comment = $_POST['comments'];


  // Connect to the database
  include "Data_Base_conn.php"; 
  
// Update image data
if (!empty($imageData)) {
    // Read the image data from the temporary file
    $imgData = file_get_contents($imageData);

    // Update the image data in the database using the $id as a condition
    $sql = "UPDATE member SET img = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $imgData, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Update name data
if (!empty($name)) {
    // Update the text data in the database using the $id as a condition
    $sql = "UPDATE member SET Name = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $name, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
// Update text data
if (!empty($comment)) {
    // Update the text data in the database using the $id as a condition
    $sql = "UPDATE member SET comment = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'si', $comment, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
  header('Location: member.php');
  exit();
}
?>
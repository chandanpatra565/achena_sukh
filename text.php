<?php
// // Connect to the database
// $conn = mysqli_connect('localhost', 'root', '', 'achena_sukh_admin');

// // Query the home_page table to retrieve the data
// $query = "SELECT * FROM home_page_data";
// $result = mysqli_query($conn, $query);



// // Check if any rows were returned
// if ($result->num_rows > 0) {
//     // Loop through the rows and print data
//     while($row = $result->fetch_assoc()) {
//         echo "ID: " . $row["id"] . "<br>";
//         echo "Name: " . $row["img"] . "<br>";
//         echo "Email: " . $row["text"] . "<br>";
//         // Add additional fields as needed
//         echo "<br>";
//     }
// } else {
//     echo "No data found in the table.";
// }


// // Close the database connection
// mysqli_close($conn);
?>
<?php
// Get the form data
$conn = mysqli_connect('localhost', 'root', '', 'achena_sukh_admin');
$id = $_GET['id']; // Assuming the ID is passed in the URL
$imageData = $_FILES['image']['tmp_name'];
$text = $_POST['text'];

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

// Redirect to a success page or display a success message
header('Location: index.php');
?>

<?php
// // Connect to the database
include "Data_Base_conn.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Fetch data from home_page table
$sql = "SELECT * FROM carousel_database";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    $rows = array();
    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        // Convert the image binary data to base64 string
        $image_base64 = base64_encode($row["img"]);
        // Add the row data to the $rows array
        $rows[] = array(
            "id" => $row["id"],
            "type" => $row["Type"],
            "img" => $image_base64
        );
    }
    // Encode the $rows array as JSON
    $json_data = json_encode($rows);
    $carousel_json_data = json_decode($json_data, true);
    return $carousel_json_data;
} else {
    return "No data found.";
}

// Step 3: Close the database connection
$conn->close();
header('Location: Carousel_all.php');
?>

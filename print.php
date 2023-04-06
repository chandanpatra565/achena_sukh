<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'achena_sukh_admin');

// Query the home_page table to retrieve the data
$query = "SELECT * FROM home_page";
$result = mysqli_query($conn, $query);

// Loop through the query results and output the data in HTML
while ($row = mysqli_fetch_assoc($result)) {
  // Retrieve the image data and convert it to a base64-encoded string
  $imageData = base64_encode($row['img']);

  // Output the image and text in HTML
  echo "<div class='item'>";
  echo "<img src='data:image/jpeg;base64,$imageData' alt=''>";
  echo "<p>" . $row['text'] . "</p>";
  echo "</div>";
}

// Close the database connection
mysqli_close($conn);
?>

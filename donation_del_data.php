<?php
  // Connect to the database
  include "Data_Base_conn.php";

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id=$_GET["id"];
// sql to delete a record
$sql = "DELETE FROM donation WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
header('Location: donation.php');
exit();

?>
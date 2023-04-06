<?php
session_start();
error_reporting(0);
include "Data_Base_conn.php";
$user_name=$_POST['user_name'];
$password=$_POST['password'];
// $user_name="Achenasukh";
// $password="AchenasukhAdmin";


// SQL statement to check if username and password are present in the login table
$sql = "SELECT * FROM login WHERE User_name='$user_name' AND password='$password'";

// Execute the SQL statement
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    echo "success";
    $_SESSION['username']=$user_name;
    $_SESSION['password']=$password;
} else {
    echo "Incorrect username or password.";
}

// Close the connection
mysqli_close($conn);

?>
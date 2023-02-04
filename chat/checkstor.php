<?php
include_once "php/config.php";

session_start();
$user =  $_SESSION['User_name']; 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT unique_id FROM store_owner WHERE User_name ='$user'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Fetch the first row
    $row = mysqli_fetch_assoc($result);
    
    // Store the data in a variable
    $data = $row["unique_id"];

    $_SESSION['unique_id'] = $data;

    $sql = "SELECT unique_id FROM users  WHERE unique_id = '$data'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        header("location:users.php");
    } else {
        header("location:index.php");
}
} else {
    echo "No data found.";
}



mysqli_close($conn);
?>
<?php

// Connect to the database
$db = new mysqli("localhost", "root", "", "groupproject");

if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
if (isset($_SESSION['User_name'])){
  header("Location: /groupproject/grocery/dashboard.php");
}
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the email and password from the form
  $email = $db->real_escape_string($_POST["username"]);
  $password = $db->real_escape_string($_POST["password"]);

  // Look up the user in the database
  $query = "SELECT password FROM store_owner WHERE User_name = '$email'";
  $result = $db->query($query);
  if ($result->num_rows == 0) {
    // No user was found with that email
    echo "Usename IS incorrect incorrect";
  } else {
    // A user was found with that email, verify the password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row["password"])) {
      // The password is correct, log the user in
      session_start();
      $_SESSION["logged_in"] = true;
      $_SESSION["User_name"] = $email;
      echo 'Welcome ' . $_SESSION['User_name'] . '!';
      header("Location: /groupproject/grocery/dashboard.php");

      exit;
    } else {
      // The password is incorrect
      echo '<script>alert("Incorrect Password")</script>';
    }
  }
}

?>
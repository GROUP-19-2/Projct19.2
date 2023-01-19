<?php

// Start a session
session_start();

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  // If the user is logged in, redirect them to the dashboard
  header("Location: dashboard.php");
  exit;
}
else {
  // If the user is not logged in, redirect them to the login page
  header("Location: index.php");
  exit;
}

?>
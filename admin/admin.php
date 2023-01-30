<?php
 $db = new mysqli("localhost", "root", "", "groupproject");
 
 if ($db->connect_error) {
   die("Connection failed: " . $db->connect_error);
 }
 if (isset($_SESSION['User_name'])){
   header("Location: /groupproject\admin\index.php");
 }
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password from the form
    $email = $db->real_escape_string($_POST["email"]);
    $password = $db->real_escape_string($_POST["password"]);
  
    // Look up the user in the database
    $query = "SELECT password FROM admin WHERE User_name = '$email'";
    $result = $db->query($query);
    
    if ($result->num_rows == 0) {
      // No user was found with that email
      echo '<script>alert("Incorrect User Name")</script>';
      header("Location: /groupproject/admin/admin.php");
    } else {
      // A user was found with that email, verify the password
      $row = $result->fetch_assoc();
    
      if (md5($password, $row["password"])) {
        // The password is correct, log the user in
        session_start();
        $_SESSION["logged_in"] = true;
        $_SESSION["User_name"] = $email;
        echo 'Welcome ' . $_SESSION['User_name'] . '!';
        header("Location: /groupproject\admin\index.php");
  
        exit;
      } else {
        // The password is incorrect
        echo '<script>alert("Incorrect Password")</script>';
      }
    }
  }
  
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<h1>Admin Login Panal</h1>
<form method="POST" action="admin.php">
  <div class="row">
    <label for="email">Email</label>
    <input type="test" name="email"  placeholder="email@example.com">
  </div>
  <div class="row">
    <label for="password">Password</label>
    <input type="password" name="password">
  </div>
  <button type="submit">Login</button>
  <p><a href="http://localhost/groupproject/index.html"> Back To Home</a></p>
</form>
</body>
</html>
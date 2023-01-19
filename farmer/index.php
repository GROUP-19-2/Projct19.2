
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- StyleSheet -->
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Sign Up | Login Form</title>
    <?php error_reporting (E_ALL ^ E_NOTICE); ?> 

<?php error_reporting(0); ?> 
<?php
    
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    // Include file which makes the
    // Database Connection.
    include 'connect.php';  
    $username = $_POST["username"]; 
    $farmerid = $_POST["farmerid"]; 
    $phoneno = $_POST["phoneno"]; 
    $address = $_POST["address"]; 
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"];

    $sql = "Select * from farmer where User_name='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result); 
    
    if($num == 0) {
      if(($password == $cpassword) && $exists==false) {
  
          $hash = password_hash($password, PASSWORD_DEFAULT);
              
          // Password Hashing is used here. 
          $sql = "INSERT INTO farmer VALUES ('$farmerid','$username','$phoneno','$address','$hash', current_timestamp())";
  
          $result = mysqli_query($conn, $sql);
  
          if ($result) {
              $showAlert = true; 
          }
      } 
      else { 
        echo '<script>alert("Welcome to vegmanage ")</script>'; 
      }      
  }
  
  if($num>0) 
   {
      $exists="Username not available"; 
   } 
  }
?>
  </head>
  <body>
  <div class="error">
  <?php
    
    if($showAlert) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> Your account is 
            now created and you can login. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div> '; 
    }
    
    if($showError) {
    
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">×</span> 
       </button> 
     </div> '; 
   }
        
    if($exists) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button>
       </div> '; 
     }
   
?>
  </div>
    <section>
      
      <div class="container">
        <div class="user login">
          
          <div class="img-box">
            <img src="./images/farmer02.jpg" alt="" />
          </div>
          <div class="form-box">
            <div class="top">
              <p>
                Not a member?
                <span data-id="#ff0066">Register now</span>
              </p>
            </div>
            <?php  
                if(isset($_GET["action"]) == "login")  
                
                ?> 
            <form method="POST" action="login.php <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="form-control">
                <h2>Hello Farmer</h2>
                <p>Welcome back you've been missed.</p>
                <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <input type="text" placeholder="Enter Username" name="username"/>
                <div>
                  <input type="password" placeholder="Password" name="password"/>
                  <div class="icon form-icon">
                    <!-- <img src="./images/eye.svg" alt="" /> -->
                  </div>
                </div>
                <span>Recovery Password</span>
                <input type="Submit" value="Login" />
              </div>
              <div class="form-control">                
              </div>
            </form>
          </div>
        </div>

        <!-- Register -->
        <div class="user signup">
          <div class="form-box">
            
            <div class="top">
              <p>
                Already a member?
                <span data-id="#1a1aff">Login now</span>
              </p>
              
            </div>
            <form  method="POST" action="index.php">
              <div class="form-control">
                <h2>Welcome Farmer</h2>
                <input type="text" name="username" placeholder="User Name" />
                <input type="text" name="farmerid" placeholder="Farmer Id" />
                <input type="text" name="phoneno" placeholder="Phone Number">
                <input type="text" name="address" placeholder="Address">
                <div>
                  <input type="password" placeholder="Password" id="password" />
                  <div class="icon form-icon">
                    <img src="./images/eye.svg" alt="" />
                  </div>
                </div>
                <div>
                  <input type="password" placeholder="Confirm Password" id="cpassword" />
                  <div class="icon form-icon">
                    <img src="./images/eye.svg" alt="" />
                  </div>
                </div>
                <input type="Submit" value="Register" />
              </div>
              <div class="form-control">
                
              </div>
            </form>
          </div>
          <div class="img-box">
            <img src="./images/veg.jpg" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- IndexJs -->
    <script src="./js/index.js"></script>
  </body>
</html>

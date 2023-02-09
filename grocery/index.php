<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- StyleSheet -->
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Sign Up | Login Form</title>
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
        $storid = $_POST["storid"]; 
        $phoneno = $_POST["phoneno"]; 
        $address = $_POST["address"]; 
        $password = $_POST["password"]; 
        $cpassword = $_POST["cpassword"];

        $sql = "Select * from store_owner where User_name='$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result); 
        $unique_id = rand(time(), 10000); 

        
        if($num == 0) {
          if(($password == $cpassword) && $exists==false) {
      
              $hash = md5($password);
                  
              // Password Hashing is used here. 
              $sql = "INSERT INTO store_owner VALUES ('$unique_id','$storid','$username','$phoneno','$address','$hash', current_timestamp())";
      
              $result = mysqli_query($conn, $sql);
      
              if ($result) {
                  $showAlert = true; 
              }
          } 
          else { 
            echo '<script>alert("Somthing Error try Again ")</script>'; 
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
  
    <section>
      
      <div class="container">
        <div class="user login">
          <div class="img-box">
            <img src="./images/gro.jpg" alt="" />
          </div>
          <div class="form-box">
            <div class="top">
              <p>
                Not a member?
                <span data-id="#ff0066">Register now</span>
              </p>
            </div>
            <form method="post"  action="login.php <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="form-control">
                <h2>Hello grocery Owner</h2>
                <p>Welcome back you've been missed.</p>
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
                <input type="text" placeholder="Enter Username" name="username" />
                <div>
                  <input type="password" placeholder="Password" name="password" />
                  <div class="icon form-icon">
                    <!-- <img src="./images/eye.svg" alt="" /> -->
                  </div>
                </div>
                <span>Recovery Password</span>
                <input type="Submit" value="Login" />
                <p><a href="../farmer/index.php">Back To Farmer</a></p>
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
            <form method="POST" action="index.php">
              <div class="form-control">
                <h2>Welcome Owner</h2>
                <input type="text" placeholder="User Name" name="username" required/>
                <input type="text" placeholder="Store ID" name="storid" />
                <input type="tel" id="myform_phone"  pattern="^(07|\+94)[0-9]{8}$"  name="phoneno" placeholder="Phone Number(07XXXXXXXX)" required/>
                <input type="text" placeholder="Address" name="address" required/>
                <div>
                  <input type="password" placeholder="Password" name="password" required/>
                  <div class="icon form-icon">
                    <img src="./images/eye.svg" alt="" />
                  </div>
                </div>
                <div>
                  <input type="password" placeholder="Confirm Password" name="cpassword" required/>
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
            <img src="./images/gro01.jpg" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- IndexJs -->
    <script src="./js/index.js"></script>
  </body>
</html>

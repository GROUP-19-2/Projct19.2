
<div class="container p-5">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Store ID</th>
            <th>User Name</th>
            <th>Phone No</th>
            <th>Address</th>
        </tr>
    </thead>

<h4>Contact Info</h4>
<?php
    include_once "../config/dbconnect.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT username FROM product WHERE product_id='$ID'");
  while ($row = $qry->fetch_assoc()){
    $username = $row['username'];
  }
?>

        <?php
          $sql="SELECT Storeowner_id, User_name, Phone_no, Address from store_owner WHERE User_name ='$username'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            if($row = $result-> fetch_assoc()){
           

            }
          }
        ?>
        <tr>
          <td><?=$row['Storeowner_id']?></td>
          <td><?=$row['User_name']?></td>
          <td><?=$row['Phone_no']?></td>
          <td><?=$row['Address']?></td>

        </tr>
</table>
      
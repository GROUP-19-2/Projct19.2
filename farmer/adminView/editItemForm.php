
<div class="container p-5">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Store ID</th>
            <th>User Name</th>
            <th>Phone No</th>
            <th>Address</th>
            <th>Chat</th>

        </tr>
    </thead>

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
          <td><button class="btn btn-primary" style="height:40px" onclick="window.location.href='../chat/check.php';" ><i class="fa fa-whatsapp" aria-hidden="true"></i>Live Chat </button></td>


          

        </tr>
</table>
      
<div >
  <h2>All Grocery Owner Details</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Grocery ID</th>
        <th class="text-center">Username </th>
        <th class="text-center">Address</th>
        <th class="text-center">Contact Number</th>
        <th class="text-center">Joining Date</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from store_owner";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$row["Storeowner_id"]?></td>
      <td><?=$row["User_name"]?></td>
      <td><?=$row["Address"]?></td>
      <td><?=$row["Phone_no"]?></td>
      <td><?=$row["date"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>
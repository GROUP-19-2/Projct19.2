
<div >
  <h2></h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Vegetables Image</th>
        <th class="text-center">Vegetables Name</th>
        <th class="text-center">Vegetables Description</th>
        <th class="text-center">Category Name</th>
        <th class="text-center">Vegetables Price per 1KG</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      session_start();
      $sql="SELECT * from product, category WHERE product.category_id=category.category_id ORDER BY Product_name Desc ";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><img height='100px' src='<?=$row["product_image"]?>'></td>
      <td><?=$row["product_name"]?></td>
      <td><?=$row["product_desc"]?></td>      
      <td><?=$row["category_name"]?></td> 
      <td><?=$row["price"]?></td>     
      <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?=$row['product_id']?>')">Contact</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  
</div>
   
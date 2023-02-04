<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="./assets/images/logo.png" width="120" height="120" alt="Swiss Collection"> 
    <h5 style="margin-top:10px;"><?php echo 'Hello '. $_SESSION['User_name'] . '!'; ?></h5>
</div>

<hr style="border:1px solid; background-color:#8a7b6d; border-color:#045914;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="dashboard.php" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="#customers"  onclick="showCustomers()" ><i class="fa fa-users"></i> grocery Owners</a>
    <a href="#products"   onclick="showProductItems()" ><i class="fa fa-th"></i> Vegetables</a>
  
  <!---->
</div>
 
<div id="main" style="text-align: center;">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i>Home</button>
   <button class="openbtn" onclick="showProductItems()" ><i class="fa fa-th"></i>Vegetables </button>
   <button class="openbtn" onclick="showCustomers()" ><i class="fa fa-users"></i> grocery </button>
   <button class="openbtn" onclick="window.location.href='../chat/check.php';" ><i class="fa fa-whatsapp" aria-hidden="true"></i>Live Chat </button>
</div>



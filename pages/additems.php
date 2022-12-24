<?php
session_start();
if (!isset($_SESSION["user"]) && !isset($_SESSION["email"])) {

  // if SESSION wala object ma 'user' vanni value xaina vaney redirect garne admin login ma
  header("Location: http://localhost/website/pages/userLogin.php");
}
require("../Function/connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inventory Management</title>
  <link rel="stylesheet" media="all" href="../assets/css/additems.css" />
  <link rel="stylesheet" href="../assets/css/base.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon"><!-- link:favicon -->
</head>

<body>
  <nav class="top">
    <div class="logo"><a href="../index.php"><img src="../assets/images/logo.jpg" alt="logo" /></a><div class="username"><i class="fa-solid fa-user"></i><?php 
    if(isset($_SESSION['email'])){
      $username=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `employee` WHERE Employee_email='".$_SESSION['email']."'"));
      echo $username['Employee_name'];
    }
    ?></div></div>
    <ul>
      <li class="logout"> <a href="../Function/logout.php">Log Out <i class="fa-solid fa-right-from-bracket"></i></a></li>
      <li class="add">Add Products</li>
    </ul>
  </nav>
  <div class="shopname">Swornim and Swornima Traders</div>
  <nav class="side sideActive">
    <ul>
      <li><a href="./dashboard.php">Home</a></li>
      <li><a href="./ourproducts.php">Our Products</a></li>
      <li><a href="./additems.php">Add Items</a></li>
      <li><a href="./categories.php">Category</a></li>
      <li><a href="./suppliers.php">Suppliers</a></li>
      <li><a href="./employee.php">Employee</a></li>
      <!-- <a href="./settings.php"><i class="fa-solid fa-user-gear settings"></a></i> -->
    </ul>
    <i class="fa-solid fa-angles-left back"></i>
  </nav>
  <div class="wrapper">
    <div class="container">
      <form method="post" action="../Function/additems.php" class="additems" enctype="multipart/form-data"><!--enct type le photo upload garauna help garxa-->
        <label for="name">Product Name:</label><input type="text" placeholder="Product Name" id="name" required name="name"><!-- label le box mathi email lekheko dekhauxa -->
        <label for="name1">Manufacturer's Name:</label><input type="text" placeholder="Manufacturer's Name" id="name1" required name="mname">
        <div class="row"><label for="price" class="row1">Price:</label><input type="text" placeholder="Price" id="price" required name="price">
          <label for="weight" class="row1">Weight(g):</label><input type="text" placeholder="Weight" id="weight" required name="weight">
          <label for="quantity" class="row1">Quantity:</label><input type="text" placeholder="Quantity" id="quantity" required name="quantity">
        </div>
        <label for="dom">Date Of Manufacturing:</label><input type="text" placeholder="Date Of Manufacturing" id="dom" required name="dom">
        <label for="doe">Date Of Expiry:</label><input type="text" placeholder="Date Of Expiry" id="doe" required name="doe">
        <div class="category1"><select name="category" id="category">
            <option value="" selected>Category</option>
            <?php
            $categories=mysqli_query($conn, "SELECT * FROM category WHERE Category_status='active' ORDER BY Category_name ASC");
            while($cat=mysqli_fetch_assoc($categories)){
              echo "<option value='".$cat['Category_ID']."'>".$cat['Category_name']."</option>";
            }
            ?>
          </select>
          <select name="supplier" id="supplier">
            <option value="" selected>Supplier</option>
            <?php
            $suppliers=mysqli_query($conn, "SELECT * FROM supplier WHERE Supplier_Status='active' ORDER BY Supplier_Name ASC");
            while($sup=mysqli_fetch_assoc($suppliers)){
              echo "<option value='".$sup['Supplier_ID']."'>".$sup['Supplier_Name']."</option>";
            }
            ?>
          </select>
          <label for="addphoto" class="photo">Add Photo: </label><input type="file" id="addphoto" name="productimage" required>
        </div>
        <label for="button"></label><input type="submit" value="Add New" id="button" required>
    </div>
  </div>
  </form>
  <script src="../assets/js/base.js"></script>
</body>

</html>
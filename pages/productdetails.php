<?php
 session_start();
 if(!isset($_SESSION["user"]) && !isset($_SESSION["email"])){

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
  <title>Product Details</title>
  <link rel="stylesheet" media="all" href="../assets/css/productdetails.css" />
  <link rel="stylesheet" href="../assets/css/base.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon"><!-- link:favicon -->
</head>

<body>
  <?php
  if ($_GET) {
    $id = $_GET['id'];
  }
    $sql = "SELECT * FROM product JOIN category ON product.Category_ID=category.Category_ID JOIN supplier ON product.Supplier_ID=supplier.Supplier_ID WHERE Product_ID='$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
      while ($row =mysqli_fetch_assoc($res)) {


  ?>
        <nav class="top">
          <div class="logo"><a href="../index.php"><img src="../assets/images/logo.jpg" alt="logo" /></a><div class="username"><i class="fa-solid fa-user"></i><?php 
    if(isset($_SESSION['email'])){
      $username=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `employee` WHERE Employee_email='".$_SESSION['email']."'"));
      echo $username['Employee_name'];
    }
    ?></div></div>
          <ul>
            <li class="logout"><a href="../Function/logout.php"> Log Out <i class="fa-solid fa-right-from-bracket"></i></a></li>
            <li class="add">Product Details</li>
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
            <a href="./settings.php"><i class="fa-solid fa-user-gear settings"></a></i>
          </ul>
          <i class="fa-solid fa-angles-left back"></i>
        </nav>
        <div class="wrapper">
          <div class="container">
            <div class="photo">
<img src="<?php echo $row['Product_Photo'];?>" alt="Photo"><!--image load vayena vaneyy yesma lekheko auxa-->
            </div>
            <ul>
              <li><span>Product's Name:</span>
                <?php echo $row['Product_Name']; ?>
              </li>
              <li><span>Manufacturer's Name:</span>
                <?php echo $row['Product_Mname']; ?>
              </li>
              <li><span>Supplier Name:</span>
                <?php echo $row['Supplier_Name']; ?>
              </li>
              <li><span>Category:</span>
                <?php echo $row['Category_name'];?>
              </li>
              <li><span>Price:</span>
                <?php echo $row['Product_Price'];?>
              </li>
              <li><span>Weight:</span>
                <?php echo $row ['Product_Weight'];?>
              </li>
              <li><span>Available Quantity:</span>
                <?php echo $row['Product_Quantity'];?>
              </li>
              <li><span>Date of Manufacturing:</span>
                <?php echo $row['Product_Dom'];?>
              </li>
              <li><span>Date of Expiry:</span>
                <?php echo $row['Product_Doe'];?>
              </li>
              <li><span>Entry Date:</span>
                <?php echo $row['Product_add_date'];?>
              </li>
            </ul>
          </div>
        </div>
        <script src="../assets/js/base.js"></script>
  <?php
      }
    } else {
      echo "<script>alert('Some error occured! Try again')</script>";
      echo "<script>location.href='./ourproducts.php'</script>";
    }
  ?>
</body>

</html>
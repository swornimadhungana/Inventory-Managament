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
    <meta http-equiv="X-UA-Com
    patible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory Management</title>
    <link rel="stylesheet" href="../assets/css/categories.css" />
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/form.css">

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
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
      <li class="logout"><a href="../Function/logout.php"> Log Out <i class="fa-solid fa-right-from-bracket"></i></a></li>
      <li class="add">Edit Category</li>
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
      <form method="post" action="../Function/editcategories.php">
        <?php 
            if($_GET){
                $id = $_GET["id"];
            }
            else{
                header("location: ./categories.php");
            }
            $res = mysqli_query($conn, "SELECT * FROM `category` WHERE `Category_ID` = '$id'");
            if($res){
                while($row = mysqli_fetch_assoc($res)){
?>
    <label for="name" >Category Name:</label><input type="text" placeholder="Category Name" id="name" required name="categoryname" 
    <?php echo "value='".$row['Category_name']."'";?>
     >
<div class="row">
  <label for="status" >Status:</label><select name="categorystatus" id="status"> <!--id lekheko css ko lagi anii name lekheko php ko lagi -->
    <option value="active">Active</option>
    <option value="inactive">Inactive</option>
  </select>
</div>
<input type="hidden" name="id"   <?php echo "value='".$row['Category_ID']."'";?> >
<!-- category id laii hidden tarikale functionko editcategories ma puryauxa -->
<label for="button"></label><input type="submit" value="Edit" id="button" required></div>
</div>
</form>
            <?php 
                }
            }
            else{
                echo "<script>alert('Some error occured!')</script>";
                echo "<script>location.href= '../pages/categories.php'</script>";
            }
        ?>

      </div>
      </div>
    </div>
    <script src="../assets/js/base.js"></script>
  </body>
</html>

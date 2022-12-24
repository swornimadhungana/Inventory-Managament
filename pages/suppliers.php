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
    <title>Inventory Management</title>
    <link rel="stylesheet" media="all"  href="../assets/css/suppliers.css" />
    <link rel="stylesheet" href="../assets/css/base.css">
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
      <li class="add">Suppliers</li>
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
     <table>
<thead>
<tr>
<th>SN</th>
<th>Supplier Name</th>
<th>Supplier Email</th>
<th>Supplier Address</th>
<th>Supplier Status</th>
<th>Actions</th>
</tr>
</thead>
<tbody>

<?php 
$res = mysqli_query($conn, "SELECT * FROM supplier ORDER BY Supplier_Name ASC");
if(mysqli_num_rows($res) == 0){
 echo "<p>No records found</p>";
}
else{
$i=1;
 while($row = mysqli_fetch_assoc($res)){
   ?>
 <tr>
 <td><?php echo $i?></td>
 <td><?php echo $row['Supplier_Name'] ?></td>
 <td> <?php echo $row['Supplier_Email'] ?></td>
 <td> <?php echo$row['Supplier_Address'] ?></td>
 <td> <?php echo $row['Supplier_Status']?></td>
 <td> 
 <?php echo '<a href="./editsupplier.php?id='.$row['Supplier_ID'].'">';?>
 <i class="fa-solid fa-pen-to-square"></i> </a>
  <?php 
   if(isset($_SESSION['user'])){
    ?>
    <!-- //?id le deletesupplier.php ma get method bata id dexa  -->
    <a href="<?php echo '../Function/deletesupplier.php?id=' . $row['Supplier_ID'] ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa-solid fa-trash"></i></a>
    <?php
   }
   ?>
 </a>

</td>
 </tr>
   <?php
   $i++;
 }
}
?>

</tbody>
</table>
<a href="./addsupplier.php"><button>Add Suppliers</button></a>
</div>
      </div>
    </div>
    <script src="../assets/js/base.js"></script>
  </body>
</html>

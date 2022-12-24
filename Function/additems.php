<?php
session_start();
require("./connect.php");

if(!isset($_SESSION['user']) && !isset($_SESSION['email'])){
    header("Location: ../pages/userLogin.php");/*redirect garxaa*/
}
if($_POST){
    $name = $_POST['name'];
    $mname = $_POST['mname'];
    $price = $_POST['price'];
    $weight= $_POST['weight'];
    $quantity = $_POST['quantity'];
    $dom = $_POST['dom'];
    $doe = $_POST['doe'];
    $categories = $_POST['category'];
    $supplier = $_POST['supplier'];
    $productimage=$_FILES['productimage'];
    $imagename= $productimage['name'];
    $existingproduct = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `product` WHERE `Product_name` = '$name'"));
    if($existingproduct != 0){
        echo "<script>alert('Product Already Exist!')</script>";
        echo "<script>location.href= '../pages/additems.php'</script>";
        exit;//talako code run huna dinna i.e exit lekhe paxiko lines
    }
    $sql= "INSERT INTO `product` (`Product_ID`, `Product_Name`, `Category_ID`, `Product_Quantity`, `Product_Price`, `Product_Dom`, `Product_Doe`, `Product_add_date`, `Product_Photo`, `Supplier_ID`, `Product_Mname`, `Product_Weight`) VALUES (NULL, '$name', '$categories', '$quantity', '$price', '$dom', '$doe', current_timestamp(), '../assets/images/uploads/$imagename', '$supplier', '$mname', '$weight')";
$res=mysqli_query($conn , $sql);
if($res){
    $upload= move_uploaded_file($productimage['tmp_name'],"../assets/images/uploads/$imagename");
    echo "<script>alert('Product Added Successful')</script>";
    echo "<script>location.href= '../pages/additems.php'</script>";
}
else{
    echo "<script>alert('Some error ocured!')</script>";
    echo "<script>location.href= '../pages/additems.php'</script>";
}
}else{
    echo "<script>alert('Some error occured!')</script>";
    echo "<script>location.href= '../pages/additems.php'</script>"; // data nahali direcct url bata xirna khojda error occured auxa
}

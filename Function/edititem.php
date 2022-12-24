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
    $productimage=$_FILES['productimage2'];
    $imagename= $productimage['name'];
    $id = $_POST['id'];
    $existingproduct = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `product` WHERE `Product_ID` = '$id'"));
    if($existingproduct == 0){
        echo "<script>alert('Product Doesn't Exist!')</script>";
        echo "<script>location.href= '../pages/ourproducts.php'</script>";
        exit;//talako code run huna dinna i.e exit lekhe paxiko lines
    }
    if($imagename!=""){
$previousimage=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `product` WHERE `Product_ID`='$id'"))['Product_Photo'];
unlink($previousimage);//delete garxa image laii
$sql= "UPDATE product SET Product_Name = '$name',Product_Mname = '$mname', Product_Price= '$price', Product_Weight='$weight', Product_Quantity='$quantity', Product_Dom='$dom', Product_Doe='$doe', Category_ID='$categories', Supplier_ID='$supplier',Product_Photo='../assets/images/uploads/$imagename' WHERE Product_ID = '$id'";
    }
    else{
        $sql = "UPDATE product SET Product_Name = '$name',Product_Mname = '$mname', Product_Price= '$price', Product_Weight='$weight', Product_Quantity='$quantity', Product_Dom='$dom', Product_Doe='$doe', Category_ID='$categories', Supplier_ID='$supplier' WHERE Product_ID = '$id'";
    }  
$res=mysqli_query($conn , $sql);
if($res){
    $upload= move_uploaded_file($productimage['tmp_name'],"../assets/images/uploads/$imagename");//moove le moov garxa assets ma
    echo "<script>alert('Product Edited Successful')</script>";
    echo "<script>location.href= '../pages/ourproducts.php'</script>";
}
else{
    echo "<script>alert('Some error occured!')</script>";
    echo "<script>location.href= '../pages/ourproducts.php'</script>";
}
}else{
    echo "<script>alert('Some error occured!')</script>";
    echo "<script>location.href= '../pages/ourproducts.php'</script>"; // data nahali direcct url bata xirna khojda error occured auxa
}

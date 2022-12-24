<?php
session_start();
require("./connect.php");

if(!isset($_SESSION['user']) && !isset($_SESSION['email'])){
    header("Location: ../pages/userLogin.php");/*redirect garxaa*/
}
if($_POST){
    $name = $_POST['suppliername'];
    $email = $_POST['supplieremail'];
    $address = $_POST['supplieraddress'];
    $status = $_POST['supplierstatus'];
    $existingsupplier = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `supplier` WHERE `Supplier_Name` = '$name'"));
    if($existingsupplier != 0){
        echo "<script>alert('Supplier Already Exist!')</script>";
        echo "<script>location.href= '../pages/suppliers.php'</script>";
        exit;//talako code run huna dinna i.e exit lekhe paxiko lines
    }
    $sql = "INSERT INTO supplier (Supplier_ID, Supplier_Name, Supplier_Email, Supplier_Address, Supplier_Status) VALUES (NULL, '$name', '$email', '$address', '$status')";//here,supplier=tableko supplier
$res=mysqli_query($conn , $sql);
if($res){
    echo "<script>alert('Supplier Added Successful')</script>";
    echo "<script>location.href= '../pages/suppliers.php'</script>";
}
else{
    echo "<script>alert('Some error occured!')</script>";
    echo "<script>location.href= '../pages/suppliers.php'</script>";
}
}else{
    echo "<script>alert('Some error occured!')</script>";
    echo "<script>location.href= '../pages/suppliers.php'</script>"; // data nahali direcct url bata xirna khojda error occured auxa
}

?>
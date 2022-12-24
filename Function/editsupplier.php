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
    $id = $_POST['id'];//suppliers.php ko ?id le id value through form and POST editsupplier.phpma dexa and editsupplier.php ko hidden type bata yesma name="id" ko id axaa i.e supplier id
    $existingsupplier = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `supplier` WHERE `Supplier_ID` = '$id'"));
    if($existingsupplier == 0){
        echo "<script>alert('Supplier Doesn't Exist!')</script>";
        echo "<script>location.href= '../pages/suppliers.php'</script>";
      exit;//talako code run huna dinna i.e exit lekhe paxiko lines
    }
    $sql = "UPDATE supplier SET Supplier_Name = '$name', Supplier_Email= '$email', Supplier_Address= '$address', Supplier_Status =  '$status' WHERE Supplier_ID = '$id'";
$res=mysqli_query($conn , $sql);
if($res){
    echo "<script>alert('Supplier Edited Successful')</script>";
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
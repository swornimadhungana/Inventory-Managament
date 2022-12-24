<?php
session_start();
require("./connect.php");

if(!isset($_SESSION['user']) && !isset($_SESSION['email'])){
    header("Location: ../pages/userLogin.php");/*redirect garxaa*/
}
if($_GET){
    $id=$_GET['id'];
    $existingsupplier= mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `supplier` WHERE `Supplier_ID`='$id'"));
    if($existingsupplier==0){
        echo "<script> alert ('Supplier Doesn't Exist')</script>";
        echo"<script>location.href='../pages/suppliers.php'</script>";
        exit;
    }
        $res=mysqli_query($conn, "DELETE FROM `supplier` WHERE `Supplier_ID`='$id'") ;
        if($res){
            echo "<script>alert('Supplier deleted successfully')</script>";
            echo"<script>location.href='../pages/suppliers.php'</script>";
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
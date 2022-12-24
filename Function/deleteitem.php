<?php
session_start();
require("./connect.php");

if(!isset($_SESSION['user']) && !isset($_SESSION['email'])){
    header("Location: ../pages/userLogin.php");/*redirect garxaa*/
}
if($_GET){ //formma matraa POST garna painxa but we didnt get from form
    $id=$_GET['id'];
    $existingitem = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `product` WHERE `Product_ID` = '$id'"));
    if($existingitem == 0){
        echo "<script>alert('Product Doesn't exist Exist!')</script>";
        echo "<script>location.href= '../pages/ourproducts.php'</script>";
        exit;//talako code run huna dinna i.e exit lekhe paxiko lines
    }
    $sql = "DELETE FROM `product` WHERE `Product_ID` ='$id'";
    $res=mysqli_query($conn , $sql);
if($res){
    echo "<script>alert('Product Deleted Successful')</script>";
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

?>
<?php
session_start();
require("./connect.php");

if(!isset($_SESSION['user']) && !isset($_SESSION['email'])){
    header("Location: ../pages/userLogin.php");/*redirect garxaa*/
}
if($_POST){
    $category = $_POST['categoryname'];
    $status = $_POST['categorystatus'];
    $id = $_POST['id'];
    $existingcategory = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `category` WHERE `Category_ID` = '$id'"));
    if($existingcategory == 0){
        echo "<script>alert('Category Doesn't Exist!')</script>";
        echo "<script>location.href= '../pages/categories.php'</script>";
        exit;//talako code run huna dinna i.e exit lekhe paxiko lines
    }
    $sql = "UPDATE category SET Category_name = '$category', Category_status = '$status' WHERE Category_id = '$id'";
$res=mysqli_query($conn , $sql);
if($res){
    echo "<script>alert('Category Edited Successful')</script>";
    echo "<script>location.href= '../pages/categories.php'</script>";
}
else{
    echo "<script>alert('Some error occured!')</script>";
    echo "<script>location.href= '../pages/categories.php'</script>";
}
}else{
    echo "<script>alert('Some error occured!')</script>";
    echo "<script>location.href= '../pages/categories.php'</script>"; // data nahali direcct url bata xirna khojda error occured auxa
}

?>
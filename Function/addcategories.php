<?php
session_start();
require("./connect.php");

if(!isset($_SESSION['user']) && !isset($_SESSION['email'])){
    header("Location: ../pages/userLogin.php");/*redirect garxaa*/
}
if($_POST){
    $category = $_POST['categoryname'];
    $status = $_POST['categorystatus'];
    $existingcategory = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `category` WHERE `Category_name` = '$category'"));
    if($existingcategory != 0){
        echo "<script>alert('Category Already Exist!')</script>";
        echo "<script>location.href= '../pages/categories.php'</script>";
        exit;//talako code run huna dinna i.e exit lekhe paxiko lines
    }
    $sql = "INSERT INTO category (Category_ID, Category_name, Category_status) VALUES (NULL, '$category', '$status')";
$res=mysqli_query($conn , $sql);
if($res){
    echo "<script>alert('Category Added Successful')</script>";
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
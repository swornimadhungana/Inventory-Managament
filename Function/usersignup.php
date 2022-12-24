<?php
session_start();
require("./connect.php");

if(isset($_SESSION['user']) || isset($_SESSION['email'])){
    header("Location: ../pages/dashboard.php");/*redirect garxaa*/
}
if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if($password != $cpassword){
        echo "<script>alert('Password does not match')</script>";
        echo "<script>location.href= '../pages/signup.php'</script>";
    }
    $existinguser = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `employee` WHERE `Employee_email` = '$email'"));//yedi email vanni pailai xa vaneyy rows ma >0 auxa and tyoo no.of rows $existinguserma basxa then if it already exist, it will detect
    if($existinguser != 0){
        echo "<script>alert('User Already Exist! Proceed to login')</script>";
        echo "<script>location.href= '../pages/userLogin.php'</script>";
    }
    $sql = "INSERT INTO employee (Employee_ID, Employee_email, Employee_password, Employee_name) VALUES (NULL, '$email', '$password', '$name')";
$res=mysqli_query($conn , $sql);
if($res){
    echo "<script>alert('Signup Successful')</script>";
    echo "<script>location.href= '../pages/userLogin.php'</script>";
}
else{
    echo "<script>alert('Some error occured!')</script>";
    echo "<script>location.href= '../pages/signup.php'</script>";
}
}else{
    echo "<script>alert('Some error occured!')</script>";
    echo "<script>location.href= '../pages/signup.php'</script>"; // data nahali direcct url bata xirna khojda error occured auxa
}

?>
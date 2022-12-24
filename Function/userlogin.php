<?php
session_start();
require("connect.php");
if(isset($_SESSION['user'])){
    header("Location: ../pages/dashboard.php");/*redirect garxaa*/
}
if ($_POST){
    $email=$_POST["email"];
$password=$_POST["password"];                                              
}
else{
    echo "<script>alert('Some error occured.Please try again!')</script>";
    echo"<script>location.href='http://localhost/website/pages/userLogin.php''</script>";
}
$sql="SELECT * FROM `employee` WHERE Employee_email='$email'";
$res=mysqli_query($conn,$sql);
// if $res ma kunai value xa i.e databasema anii tyoo >0 xa vaneyy fetchle one by one $row ma value
// rakhxa, then we check password, if email ra password match garxaa vaney email ma gayera databaseko email basxa and then
// session write close le tyoo sessionko data laii store garxa and we can continue using that session
if($res){
if(mysqli_num_rows($res)>0){

while($row=mysqli_fetch_assoc($res)){
    $emaildb=$row["Employee_email"];
    $passworddb=$row["Employee_password"];
}
if($emaildb==$email && $passworddb==$password){
    $_SESSION["email"]=$emaildb;

    if( $_SESSION["email"]==$emaildb){
        session_write_close();//sessionma variable write garera vyaiyo vaneko
        echo "<script>alert('Log-In Successful')</script>";
echo"<script>location.href='http://localhost/website/pages/dashboard.php'</script>";

    }
}
else{
echo "<script>alert('Incorrect Username or Password')</script>";
echo"<script>location.href='http://localhost/website/pages/userLogin.php'</script>";

    }
}else{
    echo "<script>alert('Some error occured.Please try again!')</script>";
    echo"<script>location.href='http://localhost/website/pages/userLogin.php''</script>";
  exit;
}
}
else{
    echo "<script>alert('Some error occured.Please try again!')</script>";
    echo"<script>location.href='http://localhost/website/pages/userLogin.php''</script>";
    exit;
}
?>
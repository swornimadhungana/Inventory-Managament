<?php
session_start();
require("./connect.php");
if(isset($_SESSION['user']) || isset($_SESSION['email'])){
    header("Location: ../pages/dashboard.php");/*redirect garxaa*/
}
if ($_POST){
    $username=$_POST["username"];
$password=$_POST["password"];                                              
}
$sql="SELECT * FROM `admin` WHERE Admin_username='$username'";
$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0){

while($row=mysqli_fetch_assoc($res)){
    $unamedb=$row["Admin_username"];
    $passworddb=$row["Admin_password"];
}
if($unamedb==$username && $passworddb==$password){
    $_SESSION["user"]=$unamedb;
    if( $_SESSION["user"]==$unamedb){
        session_write_close();
        echo "<script>alert('Log-In Successful')</script>";
echo"<script>location.href='http://localhost/website/pages/dashboard.php'</script>";
    }
}
else{
echo "<script>alert('Incorrect Username or Password')</script>";
echo"<script>location.href='http://localhost/website/pages/adminlogin.php'</script>";

    }
}else{
    echo "<script>alert('Some error occured.Please try again!')</script>";
    echo"<script>location.href='http://localhost/website/pages/adminlogin.php'</script>";
  
}
?>
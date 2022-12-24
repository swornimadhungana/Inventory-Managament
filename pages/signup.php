<?php
 session_start();
 if(isset($_SESSION["user"]) || isset($_SESSION["email"])){

  // if SESSION wala object ma 'user' vanni value xaina vaney redirect garne admin login ma
 header("Location: http://localhost/website/pages/dashboard.php");
 }
 require("../Function/connect.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/signup.css">
    <link rel="stylesheet" href="../assets/css/base.css">
</head>
<body>
<nav class="top">    <div class="logo"><a href="../index.php"><img src="../assets/images/logo.jpg" alt="logo" /></a></div><div class="admin"><a href="./adminlogin.php">Admin</a></div></nav>
    <form method="POST" action="../Function/usersignup.php" class="signupbox" id="signup" onsubmit="return validate()" ><h2 
    class="signup">Sign-Up</h2>
    <p id="message"> </p>
    <!-- action le submit vayesi tyoo file ma pugxa with all data and onsubmitle submit vayesi return ma true value xa vaneyy run garxa -->
<label for="name" >Name:</label><input type="text" placeholder="Enter Name" id="Name" required name="name">
<label for="email" >Email:</label><input type="text" placeholder="Email" id="email" required name="email">
<label for="password">Password:</label><input type="password" placeholder="Password" id="password" required name="password"><!-- name="password" le form ko password ma type vako data laii name k through bata database sanga connect garxa -->
<label for="cpassword">Confirm Password:</label><input type="password" placeholder="Confirm Password" id="cpassword" required name="cpassword">
<label for="button"></label><input type="submit" value="Sign-Up" id="button">
<div class="acc"> Already have an account?<div class="login"><a href="./userlogin.php"> Log In</a></div></div></form>
<!-- labelfor ko button laii paxi gayera id ko buttonle tanexa i.e connection and value vaneko je submit button vitra lekhxa tyoo i.e login -->
<script src="../assets/js/base.js"></script>
<script src="../assets/js/signup.js"></script>
</body>
</html>
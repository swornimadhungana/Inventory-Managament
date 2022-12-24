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
    <title>Admin</title>
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/adminlogin.css">
    <link rel="stylesheet" href="../assets/css/base.css">
</head>
<body>
    <nav class="top">     <div class="logo"><a href="../index.php"><img src="../assets/images/logo.jpg" alt="logo" /></a>
    </div></nav>
    <form method="post" action="../Function/adminlogin.php" class="loginbox"><h2 class="login">Admin</h2>
    <!-- 1step "." garda adminma xamm and again".." gardaa website folderma xamm -->
<label for="username" >Username:</label><input type="text" placeholder="Username" id="username" name="username" required>
<label for="password">Password:</label><input type="password" placeholder="Password" id="password" name="password" required>
<label for="button"></label><input type="submit" placeholder="Log-In" value="Log-In" id="button" required></form>
<!-- labelfor ko button laii paxi gayera id ko buttonle tanexa i.e connection and value vaneko je submit button vitra lekhxa tyoo i.e login -->
<script src="../assets/js/base.js"></script>
</body>
</html>
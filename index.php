<?php
session_start();
if(isset($_SESSION['user']) || isset($_SESSION['email'])){
    header("Location: http://localhost/website/pages/dashboard.php");
}
else{
    header("Location: http://localhost/website/pages/userLogin.php");
}
?>
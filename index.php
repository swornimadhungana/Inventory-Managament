<?php
session_start();
if(isset($_SESSION['user'])){
    header("Location: http://localhost/website/pages/dashboard.php");
}
else{
    header("Location: http://localhost/website/pages/userLogin.php");
}
?>
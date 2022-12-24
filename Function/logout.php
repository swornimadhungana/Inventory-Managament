<?php
session_start();
/*isset=session vitra keii item vayo vaneyy*/
if(isset($_SESSION)){// logout garera arko le id kholda session unsetle value change garxa and session destroy le folderma login gareko sessionko file delete garxa 
    session_unset();
    session_destroy();
    echo "<script>alert('logout successful')</script>";
echo "<script>location.href='../pages/userLogin.php'</script>";
}
else{
    echo"<script> alert('some error occured')</script>";
    echo "<script>location.href='../index.php'</script>";
}
?>
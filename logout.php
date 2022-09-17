<?php
session_start();
session_destroy();
setcookie("student","",time() -3600);
setcookie("faculty","",time() -3600);
echo "<script>alert('Logout Successfull...');</script>";
echo "<script>window.location='index.php';</script>";
?>
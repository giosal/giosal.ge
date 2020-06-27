<?php
    session_destroy();
    unset($_SESSION['username']);
    $_SESSION['username'] = NULL;
    header("refresh:1,url=../login.php");
?>
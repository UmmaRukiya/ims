<?php
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){

    }else{
        header('location:login.php');
    }
?>
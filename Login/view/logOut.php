<?php 
    session_start();
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    header("Location: TelaloginUser.php");
?>
<?php 
    include_once('conn.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];

        $sqlUpdate = "UPDATE usuario SET Nome = '$nome', Senha = '$senha' , Email='$email' WHERE ID='$id'";

        $result = $conn ->query($sqlUpdate);
    }
    header('Location: tabela.php');

?>
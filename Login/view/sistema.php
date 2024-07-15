<?php 
    session_start();
    //print_r($_SESSION);

    if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);

        header('Location: TelaloginUser.php');
    }
     $logado = $_SESSION['nome'];

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>
        body{
            text-align: center;
        }
    a{
        color: white;
    }
</style>
</head>
<body>
    <nav class="navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="nav-brand" href="#"> SISTEMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="logOut.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    <?php 
        echo "<h1>Bem-vindo! <u>$logado</u></h1>";
    ?>

        <div class="d-flex">
            <a href="tabelaLivros.php" class="btn btn-danger me-5">Tabela de Livros</a>
        </div>
        <br>
        <div class="d-flex">
            <a href="tabela.php" class="btn btn-danger me-5">Tabela de usuários</a>
        </div>
    
</body>
</html>
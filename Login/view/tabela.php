<?php 
    session_start();
    include_once("conn.php");
    //print_r($_SESSION);

    if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);

        header('Location: TelaloginUser.php');
    }
    $logado = $_SESSION['nome'];

    if(!empty($_GET['search'])){
        $data = $_GET['search'];
        $sql = "SELECT * FROM usuario WHERE ID LIKE '%$data%' OR Nome LIKE '%$data%' OR Email LIKE '%$data%' ORDER BY ID DESC";
    }
    else{
        $sql = "SELECT * FROM usuario ORDER BY id DESC";
    }
     
    $result = $conn->query($sql);
    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Registros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>
        body{
            background-color: green;
            text-align: center;
        }
    a{
        color: white;
    }
    table-bg{
        background: rgba(0,0,0,0.6);
        border-radius: 15px 15px 0 0;
    }
    .box-search{
        display: flex;
        justify-content: center;
        gap: .1%;
    }
    h1{
        color: white;
    }
</style>
</head>
<body>
    <nav class="navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="nav-brand" href="#"> Tabela</a>
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
    <div class="box-search">
        <input type="search" class= "form-control w-25 " placeholder="Pesquisar" id= "pesquisar">
        <button onclick= "searchData()" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"          fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
         <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>
        </button>
    </div>
    <div class="d-flex">
            <a href="sistema.php" class="btn btn-danger me-5">Voltar</a>
        </div>
    <div class="m-5">
            <table class="table text-white table-bg">
        <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Senha</th>
                <th scope="col">...</th>
                </tr>
        </thead>
        <tbody>
          <?php 
                while($user_data = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$user_data['ID']."</td>";
                    echo "<td>".$user_data['Nome']."</td>";
                    echo "<td>".$user_data['Email']."</td>";
                    echo "<td>".$user_data['Senha']."</td>";
                    echo "<td>
                    <a class = 'btn btn-sm  btn-primary' href='editUser.php?id=$user_data[ID]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                  </svg>
                    </a>
                    
                    <a class = 'btn btn-sm  btn-danger' href='deleteUser.php?id=$user_data[ID]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                  </svg>
                    </a>

                    </td>";
                    echo "</tr>";
                }
          ?>
        </tbody>
        </table>
            </div>
   
</body>
            <script>
                var search = document.getElementById('pesquisar');

                 search.addEvenListener("keydown", function(event) {
                    if (event.key === "Enter"){
                        searchData();
                    }
                });

                function searchData()
                {
                    window.location = 'tabela.php?search='+ search.value;
                }
            </script>
</html>
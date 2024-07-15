
<?php 
    include_once('conn.php');
    if(!empty($_GET['id']))
    {
       

        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM usuario WHERE ID =$id";

        $result = $conn->query($sqlSelect);

      if($result ->num_rows > 0)
      {
        while($user_data = mysqli_fetch_assoc($result))
        {

        $nome = $user_data['Nome'];
        $senha = $user_data['Senha'];
        $email = $user_data['Email'];
        }
        
      }
      else{
        header('Location: tabela.php');
      }
    }
    else{
        header('Location: tabela.php');
    }


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edite</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
   
<?php 

   
    include('conn.php');

    if($_SERVER['REQUEST_METHOD'] =='POST'){

        $nome = htmlspecialchars($_POST['nome']); // o que está entre aspas são os NOMES DOS INPUTS
        $email = htmlspecialchars($_POST['email']);
        $senha = htmlspecialchars($_POST['senha']);
        $confirmSenha =htmlspecialchars($_POST['ConfirmaSenha']);

        if($senha === $confirmSenha){
            $sql = "SELECT * FROM usuario WHERE Nome = '$nome'";
            $retorno = $conn -> query($sql);
            $registro = $retorno->num_rows;
        if($registro){
            echo "<h4> style='color:white; text-align:center;
            font-size:2px'>Esse usuário já existe, tente outro!</h4>";
        }else{ 
         
            $sql = "INSERT INTO usuario(Nome, Email, Senha) VALUES ('$nome', '$email', '$senha')";

            $retorno = $conn ->query($sql);

            if($retorno == true){
                echo "<h5> style='color:white; text-align:center;
                font-size:2px'>CADASTRO REALIZADO COM SUCESSO</h5>";
            }else{
                echo "<h4> style='color:white; text-align:center;
                font-size:2px'>Usuário não cadastrado no banco de dados!</h4>";
            }
        }

        }else{
            echo "<h4> style='color:white; text-align:center;
            font-size:2px'>As senhas não coincidem!</h4>";

        }
    }

?>


    <?php 
        if(isset($_SESSION['nao_autenticada'])):

    
    ?>
    <div class="erro">
        <h3>ERRO:usuario ou Senha incorretos.</h3>
    </div>
        <?php 
            endif;
            unset($_SESSION['nao_autenticada']);
        
        ?>

    <div class="page">
        <form action="saveEditUser.php"  method="POST" class="formLogin">
        
            <div class="login">
                <h1>Editar Usuário</h1>
            </div>

            <label for="nome">Nome:</label>
            <input type="nome" name="nome" placeholder="Digite seu nome" autofocus="true" required value ="<?php echo $nome ?>">

            <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="Digite seu email" required value=" <?php echo $email?>">

            <label for="password">Senha:</label>
            <input type="text" name="senha" placeholder="Digite sua senha" required value="<?php echo $senha?>">

            <label for="confirmaSenha">Confirmar Senha:</label>
            <input type="text" name="ConfirmaSenha" placeholder="Confirme sua senha" required  value="<?php echo $senha?>">

                <input type="hidden" name="id" value="<?php echo $id ?>">


            <input type="submit" name="update" id="update "value="Editar" class="btn">
            

            <a href="tabela.php">Voltar</a>

        
        </form>
    </div>
    
</body>

</html>
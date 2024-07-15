
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
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

    <header>
        <p>App Biblioteca</p>
    </header>

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
        <form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="POST" class="formLogin">
        
            <div class="login">
                <h1>Login</h1>
            </div>

            <label for="nome">Nome:</label>
            <input type="nome" name="nome" placeholder="Digite seu nome" autofocus="true" required>

            <label for="email">E-mail:</label>
            <input type="email" name="email" placeholder="Digite seu email" required>

            <label for="password">Senha:</label>
            <input type="password" name="senha" placeholder="Digite sua senha" required>

            <label for="confirmaSenha">Confirmar Senha:</label>
            <input type="password" name="ConfirmaSenha" placeholder="Confirme sua senha" required>



            <input type="submit" name="submit" value="Cadastrar" class="btn">
            
            <a href="TelaloginUser.php">Ja tem um Login?</a>

        </form>
    </div>
    
</body>

</html>
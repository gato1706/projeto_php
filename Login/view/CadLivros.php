
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

    <div class="page">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="POST" class="formLogin">
        
            <div class="login">
                <h1>Cadastro de Livros</h1>
            </div>

            <label for="nome">Nome:</label>
            <input type="nome"  placeholder="Digite o Nome do Livro" autofocus="true" required>

            <label for="email">Autor:</label>
            <input type="text"  placeholder="Digite o Nome do Autor">

            <label for="password">Editora:</label>
            <input type="text"  placeholder="Digite a Editora">

            <label for="confirmaSenha">ISBN:</label>
            <input type="text"  placeholder="Digite o ISBN" required>

            <label for="confirmaSenha">Ano de Publicação:</label>
            <input type="text" " placeholder="Digite o Ano de Publicação" required>

            <label for="confirmaSenha">Idioma:</label>
            <input type="text" placeholder="Digite o Idioma" required>

            <label for="confirmaSenha">Numero de Páginas:</label>
            <input type="text"  placeholder="Digite o Numero de Páginas" required>
            
            <label for="confirmaSenha">Quantidade De Estoque:</label>
            <input type="text"  placeholder="Digite a Quantidade de Estoque" required>


            <input type="submit" name="submit" value="Cadastrar" class="btn">
        </form>
        
    </div>
</body>
</html>
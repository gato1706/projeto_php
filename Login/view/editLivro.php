
<?php 
    include_once('conn.php');
    if(!empty($_GET['id']))
    {
       

        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM Livro WHERE ID =$id";

        $result = $conn->query($sqlSelect);

      if($result ->num_rows > 0)
      {
        while($user_data = mysqli_fetch_assoc($result))
        {

        $nome = $user_data['Nome'];
        $autor = $user_data['Autor'];
        $editora = $user_data['Editora'];
        $isbn = $user_data['ISBN'];  // dentro do colchetes são os nomes dos CAMPOS DO BANCO DE DADOS
        $anoPublicacao = $user_data['Ano_Publicacao'];
        $idioma = $user_data['Idioma'];
        $numeroPaginas = $user_data['Numero_Paginas'];
        $qtdEstoque = $user_data['Quantidade_Estoque'];
        }
        
      }
      else{
        header('Location: tabelaLivros.php');
      }
    }
    else{
        header('Location: tabelaLivros.php');
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
        <form action="saveEditLivro.php"  method="POST" class="formLogin">
        
            <div class="login">
                <h1>Editar Livro</h1>
            </div>

            <label for="nome">Nome:</label>
            <input type="nome"  placeholder="Digite o Nome do Livro" autofocus="true" required value ="<?php echo $nome ?>">

            <label for="email">Autor:</label>
            <input type="text"  placeholder="Digite o Nome do Autor"  value=" <?php echo $autor?>">

            <label for="password">Editora:</label>
            <input type="text"  placeholder="Digite a Editora" value="<?php echo $editora?>">

            <label for="confirmaSenha">ISBN:</label>
            <input type="text"  placeholder="Digite o ISBN" required  value="<?php echo $isbn?>">

            <label for="confirmaSenha">Ano de Publicação:</label>
            <input type="text" " placeholder="Digite o Ano de Publicação" required  value="<?php echo $anoPublicacao?>">

            <label for="confirmaSenha">Idioma:</label>
            <input type="text" placeholder="Digite o Idioma" required  value="<?php echo $idioma?>">

            <label for="confirmaSenha">Numero de Páginas:</label>
            <input type="text"  placeholder="Digite o Numero de Páginas" required  value="<?php echo $numeroPaginas?>">
            
            <label for="confirmaSenha">Quantidade De Estoque:</label>
            <input type="text"  placeholder="Digite a Quantidade de Estoque" required  value="<?php echo $qtdEstoque?>">


            <input type="hidden" name="id" value="<?php echo $id ?>">


            <input type="submit" name="update" id="update "value="Editar" class="btn">
            

            <a href="tabelaLivros.php">Voltar</a>

        
        </form>
    </div>
    
</body>

</html>
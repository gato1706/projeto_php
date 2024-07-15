
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
   
<?php 

   
    include('conn.php');

    if($_SERVER['REQUEST_METHOD'] =='POST'){

        $titulo = htmlspecialchars($_POST['titulo']); // o que está entre aspas são os NOMES DOS INPUTS
        $autor = htmlspecialchars($_POST['autor']);
        $editora = htmlspecialchars($_POST['editora']);
        $isbn = htmlspecialchars($_POST['isbn']);
        $anoPublicacao =  htmlspecialchars($_POST['anoPublicacao']);
        $idioma = htmlspecialchars($_POST['idioma']);
        $numPaginas = htmlspecialchars($_POST['numeroPaginas']);
        $idioma = htmlspecialchars($_POST['qtdEstoque']);


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
        <form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="POST" class="formLogin">
        
            <div class="login">
                <h1>Adicionar Livro</h1>
            </div>

            <label for="nome">Titulo</label>
            <input type="text" name="titulo" placeholder="Digite o Titulo do Livro" autofocus="true" required>

            <label>Autora</label>
            <input type="text" name="autor" placeholder="Digite o Autor" required>

            <label>Editora</label>
            <input type="text" name="editora" placeholder="Digite a Editora" required>

            <label>ISBN</label>
            <input type="text" name="isbn" placeholder="Digite o ISBN do livro" required>

            <label>Ano de Publicação</label>
            <input type="text" name="anoPublicacao" placeholder="Digite o ano de Publicação" required>

            <label>Idioma</label>
            <input type="text" name="idioma" placeholder="Digite o Idioma" required>

            <label>Numero de páginas</label>
            <input type="text" name="numeroPaginas" placeholder="Digite o numero de Páginas" required>

            <label>QUantidade de estoque</label>
            <input type="text" name="qtdEsoque" placeholder="Digite a quantidade de livros disponiveis">



            <input type="submit" name="submit" value="Cadastrar" class="btn">
            
            <a href="tabelaLivros.php">Voltar</a>

        </form>
    </div>
    
</body>

</html>
<?php 
    include_once('conn.php');

    if(isset($_POST['update']))
    {
        $nome = $user_data['Nome'];
        $autor = $user_data['Autor'];
        $editora = $user_data['Editora'];
        $isbn = $user_data['ISBN'];      // dentro do colchetes são os nomes dos CAMPOS DO BANCO DE DADOS
        $anoPublicacao = $user_data['Ano_Publicacao'];
        $idioma = $user_data['Idioma'];
        $numeroPaginas = $user_data['Numero_Paginas'];
        $qtdEstoque = $user_data['Quantidade_Estoque'];
        

        $sqlUpdate = "UPDATE livro SET Nome = '$nome', Autor = '$autor' , Editora ='$editora' , ISBN = '$isbn' , Ano_Publicacao = '$anoPublicacao' , Idioma = '$idioma' , Numero_Paginas = '$numeroPaginas' , Quantidade_Estoque = '$qtdEstoque' WHERE ID ='$id'";

        $result = $conn ->query($sqlUpdate);
    }
    header('Location: tabelaLivros.php');

?>
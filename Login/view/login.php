
<?php 
    session_start();

   // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['senha'])) { 
        //acessar
        include_once ('conn.php');
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        //print_r('Nome: ' . $nome);
        //print_r('<br>');
        //print_r('senha: ' . $senha);

        $sql = "SELECT * FROM usuario WHERE Nome = '$nome' and Senha = '$senha'";

        // para executar o comando select no banco de dados
        $resul = $conn ->query($sql);

        //print_r($resul);
       // print_r($sql);

       if(mysqli_num_rows($resul) < 1){
            unset($_SESSION['nome']);
            unset($_SESSION['senha']);

          header('Location: TelaloginUser.php');
          
       }else{

        $_SESSION['nome'] = $nome;
        $_SESSION['senha'] = $senha;


        header('Location: sistema.php');
       }

    }else{ // não acessar
        header('location: TelaloginUser.php');
        }
?>
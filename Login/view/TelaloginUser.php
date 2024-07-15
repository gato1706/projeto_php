<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>


<body>



<div class="erro">

</div>



<div class="page">
        <form action="login.php" method="POST" class="formLogin">
        
            <div class="login">
                <h1>Login</h1>
            </div>

            <label for="nome">Nome:</label>
            <input type="nome" name="nome" placeholder="Digite seu nome"  required>

            <label for="password">Senha:</label>
            <input type="password" name="senha" placeholder="Digite sua senha" required>

            <input type="submit" name="submit" value="Entrar" class="btn">
            
         
            <a href="TelacadastroUser.php">Não é cadastrado?</a>

            <a href="senha_esquecida/trocar_senha.php">Esqueceu a Senha?</a>
        </form>
    </div>
    
</body>
</html>
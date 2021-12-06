<?php
session_start();
?>

<DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login - INTEGRADOR BEM ESTAR NO SHOPPING</title>
</head>
<body>
    <form action="login.php" method="POST">
        <div>
            <h1>Identifique-se</h1>
            <input name="user" type="text" placeholder="Login">
            <br><br>
            <input name="passwd" type="password" placeholder="Senha">
            <br><br>
            <button type="submit">Entrar</button>
            <?php
            if (isset($_SESSION['invalido'])):
            ?>
            <h3>Usuário ou senha inválidos!</h3>
            <?php
                endif;
                unset($_SESSION['invalido']);
            ?>
        </div>
    </form>
</body>
</html>
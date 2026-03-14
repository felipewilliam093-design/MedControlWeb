<?php

include_once("usuarioController.php");

if($_SERVER["REQUEST_METHOD"] === 'POST'){
    $controller = new UsuarioController();

    if (isset($_POST["cadastrar"])){
        $a = $controller->cadastrarUsuario($_POST["usuario"]);
    }
}

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Usuário</title>
</head>
<body>

<h1>Cadastro de usuário</h1>

<a href="index.php">Voltar</a>

<form action="cadastrarUsuario.php" method="post" enctype="multipart/form-data">
    <label>Nome</label>
    <input type ="text" name="usuario[nome]"><br><br>
    <label>e-mail</label>
    <input type="email" name="usuario[email]"><br><br>
    <label>Senha</label>
    <input type="password" name="usuario[senha]"><br><br>
    <label>Login</label>
    <input type="text" name="usuario[login]"><br><br>

    <button name="cadastrar">Cadastrar</button>
</form>

</body>
</html>

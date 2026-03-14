<?php

include_once("usuarioController.php");

$controller = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['alterar'])) {
    $a = $controller->localizarUsuario($_GET['alterar']);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usuario'])) {
    $a = $controller->atualizarUsuario($_POST['usuario']);
} else {
    header("location: index.php");
}

?>


<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atualização de Usuário</title>
</head>
<body>

<h1>Atualização de Usuários</h1>

<a href="index.php">Voltar</a>

<form action="atualizarUsuario.php" method="post">
    <input type="text" name="usuario[id]" value="<?= $a->id ?>" hidden>
    <label>Nome</label>
    <input type="text" name="usuario[nome]" value="<?= $a->nome ?>"<br><br>
    <label>e-mail</label>
    <input type="email" name="usuario[email]" value="<?= $a->email ?>"><br><br>
    <label>login</label>
    <input type="text" name="usuario[login]" value="<?= $a->login ?>"><br><br>
    <label>Senha</label>
    <input type="password" name="usuario[senha]" value="<?= $a->senha ?>"><br><br>

    <button name="atualizar">Atualizar</button>
</form>

</body>
</html>

<?php

include_once "usuarioController.php";

$controller = new UsuarioController();
$usuarios = $controller->index();
global $usuarios;
$a = null;

if($_SERVER["REQUEST_METHOD"] === "POST"){
if(isset($_POST["pesquisar"])){
$a = $controller->pesquisaUsuario($_POST["pesquisar"]);
}
}

if($_SERVER["REQUEST_METHOD"] === "GET"){
if(isset($_GET["excluir"])){
$a = $controller->excluirUsuario($_GET["excluir"]);
$a = $controller->atualizarUsuario($_GET["alterar"]);
    }
}

?>


<!doctype html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MedControl</title>
    <!--    Estilização da tabela-->
    <style>
        table, tr, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

</head>
<body>

<h1>Usuários</h1>

<!--Link da página Cadastro de Aluno-->
<a href="cadastrarUsuario.php">Cadastrar Usuario</a>

<h3>Pesquisar Usuários</h3>

<form method="POST" action="index.php">
    <label>ID</label>
    <input typep="number" name="pesquisar">
    <button>Pesquisar</button>
</form>

<table>
    <tr>
        <td>ID</td>
        <td>Nome</td>
    </tr>

    <?php if($a) : ?>
        <!--        <?php //foreach($a as $usuario) : ?> -->
        <tr>
            <td><?= $a->ID; ?></td>
            <td><?= $a->nome; ?></td>
        </tr>
        <!--        --><?php //endforeach; ?>
    <?php endif; ?>

</table>

<h2>Usuários Cadastrados</h2>

<table>
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>Email</td>
        <td>Login</td>
    </tr>

    <?php if($usuarios) : ?>
        <?php foreach($usuarios as $usuario) : ?>
            <tr>
                <td><?= $usuario->id; ?></td>
                <td><?= $usuario->nome; ?></td>
                <td><?= $usuario->email; ?></td>
                <td><?= $usuario->login; ?></td>

                <td><a href="atualizarUsuario.php?alterar">Alterar</a> </td>
                <td><a href="index.php?excluir=<?= $usuario->id ?>">Excluir</a> </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>

</table>

</body>
</html>

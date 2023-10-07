<?php

session_start();

if(!isset($_SESSION['admin_logado'])){
    header("location:login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do administrador</title>

</head>
<body>
    <h2>Bem-vindo Administrador</h2>
    <a href="Cadastrar_produto.php">
    <button>Cadastrar produto</button></a>

    <a href="listar_produtos.php">
        <button>Listar Produtos</button>
    </a>
</body>
</html>
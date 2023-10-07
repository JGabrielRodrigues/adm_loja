<?php
session_start();

if (!isset($_SESSION['admin_logado'])) {
    header('Location: login.php');
    exit();
}

require_once('../config2/conexao1.php');

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $stmt = $pdo->prepare("DELETE FROM PRODUTOS WHERE ID = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $mensagem = "Produto excluído com sucesso!";
        } else {
            $mensagem = "Erro ao excluir o produto. Tente novamente.";
        }
    } catch (PDOException $e) {
        $mensagem = "Erro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Excluir Produto</title>
</head>
<body>
<h2>Excluir Produto</h2>
<p><?php echo $mensagem; ?></p>
<a href="listar_produtos.php">Voltar à Lista de Produtos</a>
</body>
</html>
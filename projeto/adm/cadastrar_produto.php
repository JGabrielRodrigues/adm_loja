<?php
session_start();
require_once('../adm/conexao1.php');
if(!isset($_SESSION['admin_logado'])){
    header("Location:login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') { 
    

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $url_imagem = $_POST['url_imagem']; // Recebe a URL da imagem do formulário
    
    $imagem = $_FILES['imagem']['name']; // Recebe o arquivo de imagem do formulário

 
    
    // Diretório onde a imagem será salva
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($imagem);
    

    // Gerar a URL da imagem
    $base_url = "http://localhost/Alpha/";
 // Substitua com o domínio correto do seu site
    $url_imagem = $base_url . "uploads/" . basename($imagem); 
    
    // Move o arquivo de imagem carregado para o diretório de destino
    if(move_uploaded_file($_FILES['imagem']['tmp_name'], $target_file)) {
        echo "Imagem ". basename($imagem). " foi carregada.";
    } else {
        echo "Falha ao carregar a imagem.";
    }
    


    try {
        $sql = "INSERT INTO PRODUTOS (nome, descricao, preco, imagem, url_imagem) VALUES (:nome, :descricao, :preco, :imagem, :url_imagem)";
        
        $stmt = $pdo->prepare($sql); //Nessa linha, $stmt é um objeto que representa a instrução SQL preparada. Você pode então vincular parâmetros a essa instrução e executá-la.
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
        $stmt->bindParam(':imagem', $target_file, PDO::PARAM_STR); // Vincula o caminho do arquivo da imagem
        $stmt->bindParam(':url_imagem', $url_imagem, PDO::PARAM_STR); // Vincula a URL da imagem
        $stmt->execute();

        echo "<p style='color:green;'>Produto cadastrado com sucesso!</p>";
    } catch(PDOException $e) {
        echo "<p style='color:red;'>Erro ao cadastrar produto: " . $e->getMessage() . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
</head>
<body>
    <h2>Cadastrar Produto</h2>

    <form action="" method="post" enctype="multipart/form-data">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>
    <p>
    <label for="descricao">Descrição:</label>
    <textarea name="descricao" id="descricao" required></textarea>
    <p>
    <label for="preco">Preço:</label>
    <input type="number" name="preco" id="preco" step="0.01" required>
    <p>
    <label for="imagem">Imagem:</label>
    <input type="file" name="imagem" id="imagem">
    <p>
    <label for="url_imagem">URL da Imagem:</label>
    <input type="text" name="url_imagem" id="url_imagem">
    <p>
    <input type="submit" value="Cadastrar">
</form>
    <a href="listar_produtos.php">Voltar à Lista de Produtos</a>
</body>
</html>

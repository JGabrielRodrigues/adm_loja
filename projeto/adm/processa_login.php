<?php

session_start();

require_once('../adm/conexao1.php');

$name = $_POST['name'];//recolhendo info do nome e colocando nessa variavel
$password = $_POST['password'];//recolhendo info do nome e colocando nessa variavel


//acessando banco e checando as tabelas para encontrar o nome, a senha e esta ativo ou nao(0 ou 1)
// usamos :name ao inves de $name para evitar possiveis invasoes por injecao de sql malicioso, por assim, pegamos a informaco e nao a variavel para so dps vinculala de fato a variavel
$sql = "SELECT * FROM ADMINISTRADOR WHERE ADM_NOME = :name AND ADM_SENHA = :password AND ADM_ATIVO = 1";


//aqui iremos vincular o valor recebido com a variavel usando metodo PDO, em conjunto, unificando com as informacoes do banco.
$query = $pdo->prepare($sql);
$query->bindParam(':name', $name, PDO::PARAM_STR);
$query->bindParam(':password', $password, PDO::PARAM_STR);

//executa o escrito acima
$query->execute();

//Se a contagem de linhas der maior dq zero na tabela, significa q o login utilizado existe 
if ($query->rowCount() > 0) {
    $_SESSION['admin_logado'] = true;
    header('Location: painel_admin.php');
}else{
    header('Location: login.php?erro');
}


?>
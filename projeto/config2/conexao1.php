<?php

//configuração de banco de dados


$host = 'localhost'; //Variéval que representa o nome do banco de dados
$db = 'Projeto'; //nome do banco de dados que foi criado 
$user = 'root'; //usúario padrão 
$pass = 'P@$$w0rd'; //Senha 
$charset = 'utf8mb4'; //Forma de agrupamento utilizado no banco de dados


$dsn = "mysql:host=$host;dbname=$db;charset=$charset"; //-> DSN indica o driver do banco de dados

//criando a conexão com o banco de dados através do pdo 
//try serve para tratamento de erros e exceções
try{ 
$pdo = new PDO($dsn, $user, $pass);
} //criando com a biblioteca e classe PDO, está sendo criado um objeto com valores especifico. Sendo instanciada.
catch (PDOException $e){
    echo "erro ao tentar conectar com o banco de dados <p>" .$e;
}//Na classe do Pdo usada ela já faz o tratamento de erro e excessões jogando na variável $e.

echo "Conexão funcionando;"

//A concatenação da variável $e é para mostra qual foi o erro captado no (PDOException) que faz o tratamento deste erro.
//O programa só entra no catch quando tem algum erro pra fazer o tratamento, caso não tenha ele passa direto e imprimi a mensagem de "conexão funcionando"

?>
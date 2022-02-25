<?php
require('./assets/config/conexao.php');

// $sql = $pdo->query('SELECT * FROM produtos');

// $dados = $sql->fetchAll(pdo::FETCH_ASSOC);

// echo '<pre>';
// print_r($dados);
?>

<h1>Produtos</h1>

<p><?php $stmt = $pdo->prepare("SELECT * FROM produtos");
    $stmt->execute();

    if($stmt->rowCount()>0){
        while($dados = $stmt->fetch(pdo::FETCH_ASSOC)){
            echo $dados['nomeImg'];
            echo $dados['nomeProduto'];
        }
    }
?></p>

<a href="./assets/pages/addProduto.php">Cadastrar Produto</a>
<?php
    require('../config/conexao.php');

    session_start();

    $id_produto = $_GET['id'];

    $sql_query = $mysqli->query("SELECT * FROM produtos WHERE id = '$id_produto'");
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    while($produto = $sql_query->fetch_assoc()){
    ?>
        <h2><?php echo $produto['descricao'] ?></h2>
        <img src="../<?php echo $produto['path']; ?>" alt="" width="250px">
        <p>R$ <?php echo $produto['preco'] ?></p>
    <?php
    }
    ?>


</body>
</html>


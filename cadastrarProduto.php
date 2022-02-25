<?php
    require('config/conexao.php');

    if(isset($_POST['submit'])){

    
    
        $arquivo = $_FILES['img'];
        $pasta = 'images/';
        $nomeArquivo = $arquivo['name'];
        $novoNomeArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo,PATHINFO_EXTENSION));
        $path = $pasta . $novoNomeArquivo . '.' . $extensao;
        
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['qtdd'];
        // $title = $_POST['title-notice'];
        // $description = $_POST['description'];
        // $categoria = $_POST['category'];
    
        $moveu = move_uploaded_file($arquivo['tmp_name'], $path);
    
        if($moveu){
            $mysqli->query("INSERT INTO produtos (descricao, preco, nomeImg, path, quantidade) VALUES('$descricao','$preco','$nomeArquivo','$path','$quantidade')") or die($mysqli->error);
            // echo "<p>Produto cadastrado com sucesso!</p>";
            echo "<script>alert('Produto cadastrado com sucesso!')</script>";
        }
        else{
            echo "Falha ao cadastrar produto!";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
</head>
<body>
    <h1>Cadastrar Produto</h1>
    <form action="cadastrarProduto.php" method="POST" enctype="multipart/form-data" >

        <label for="">
            Selecione a imagem:
            <input type="file" name="img">
        </label>
        <label>
            Descricão:
            <input type="text" name="descricao">
        </label>
        <label>
            Preço:
            <input type="text" name="preco">
        </label>
        <label>
            Quantidade:
            <input type="text" name="qtdd">
        </label>

        <input type="submit" name="submit" value="Salvar">
    </form>
</body>
</html>
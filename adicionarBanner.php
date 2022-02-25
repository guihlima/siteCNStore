<?php
    require('config/conexao.php');

    if(isset($_POST['submit'])){

    
    
        $arquivo = $_FILES['img'];
        $pasta = 'images/';
        $nomeArquivo = $arquivo['name'];
        $novoNomeArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo,PATHINFO_EXTENSION));
        $path = $pasta . $novoNomeArquivo . '.' . $extensao;
        
        // $title = $_POST['title-notice'];
        // $description = $_POST['description'];
        // $categoria = $_POST['category'];
    
        $moveu = move_uploaded_file($arquivo['tmp_name'], $path);
    
        if($moveu){
            $mysqli->query("INSERT INTO banner (nome, path) VALUES('$nomeArquivo','$path')") or die($mysqli->error);
            // echo "<p>Produto cadastrado com sucesso!</p>";
            echo "<script>alert('Banner cadastrado com sucesso!')</script>";
        }
        else{
            echo "Falha ao cadastrar banner!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Banner</title>
</head>
<body>
    <h1>Adicionar Banner Destaque</h1>
    <form action="adicionarBanner.php" method="POST" enctype="multipart/form-data" >

        <label for="">
            Selecione a imagem:
            <input type="file" name="img">
        </label>
        <input type="submit" name="submit" value="Salvar">
    </form>
</body>
</html>
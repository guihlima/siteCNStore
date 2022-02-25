<?php
    require('../../config/conexao.php');

    if(isset($_POST['submit'])){

    
    
        $arquivo = $_FILES['img'];
        $pasta = 'img/';
        $nomeArquivo = $arquivo['name'];
        $novoNomeArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo,PATHINFO_EXTENSION));
        $path = $pasta . $novoNomeArquivo . '.' . $extensao;
        
        $nomeProduto = $_POST['nome'];
        $preco = $_POST['preco'];
        // $title = $_POST['title-notice'];
        // $description = $_POST['description'];
        // $categoria = $_POST['category'];
    
        $moveu = move_uploaded_file($arquivo['tmp_name'], $path);
    
        if($moveu){
            $mysqli->query("INSERT INTO produtos (nomeProduto, preco, nomeImg, path) VALUES('$nomeProduto','$preco','$nomeArquivo','$path')") or die($mysqli->error);
            // echo "<p>Produto cadastrado com sucesso!</p>";
            echo "<script>alert('Produto cadastrado com sucesso!')</script>";
        }
        else{
            echo "Falha ao cadastrar produto!";
        }
    }
?>
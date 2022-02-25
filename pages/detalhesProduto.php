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
    <title>Detalhes</title>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


    <link rel="stylesheet" href="../styles/detalhes/detalhes.css">
</head>
<body>
<header class="header">
        <nav class="nav container">
            <ul id="menu__list">
                <li class="list__item" id="btn__search"><i class="uil uil-search"></i></li>
                <li class="list__item"><a href="#"><i class="uil uil-shopping-cart"s></i></a></li>
            </ul>

            <form action="">
            <input type="search" id="input__search" name="busca" placeholder="o que procuras...">
            </form>

            <div id="logo">
                Lojinha
            </div>

            <div id="menu">
                <!-- <div id="user__area"> -->
                    <a href="#"><i class="uil uil-user"></i></a>
                <!-- </div> -->

                <!-- <div id="menu__bars"> -->
                    <i class="uil uil-bars"></i>
                <!-- </div> -->
            </div>
        </nav>
    </header>
    <main class="main">
        <div id="details">
            <?php
                while($produto = $sql_query->fetch_assoc()){
            ?>
                <h2 class="title__details"><?php echo $produto['descricao'] ?></h2>
                <img src="../<?php echo $produto['path']; ?>" alt="" width="250px">
                <p class="price">R$ <?php echo $produto['preco'] ?></p>
                <button>Add Car</button>
            <?php
            }
            ?>
        </div>
    </main>

    <script src="../scripts/search.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>


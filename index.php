<?php
    require('./config/conexao.php');

    $sql_produto = $mysqli->query("SELECT * FROM produtos") or die("Erro ao listar produtos!!" . $mysqli->error);
    $sql_destaque = $mysqli->query("SELECT * FROM banner") or die("Erro ao listar produtos!!" . $mysqli->error);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja do Guih</title>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="stylesheet" href="./styles/smallScreen.css">
    <link rel="stylesheet" href="./styles/mediumScreen.css">
    <link rel="stylesheet" href="./styles/screen.css">
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

    <main class="main container">
        <!-- Quando o usuário não buscar nada -->
        <?php
            if(!isset($_GET['busca'])){
        ?>
            <section>
                <div id="destaques">
                    <?php
                        while($destaque = $sql_destaque->fetch_assoc()){
                        ?>
                            <a href="#"><img src="<?php echo $destaque['path'] ?>" alt=""></a>
                    <?php
                        }

                    ?>
                </div>       
            </section>
            <section>
                <div id="cards">
                    <?php
                        while($produto = $sql_produto->fetch_assoc()){
                            ?>
                            <div id="card">
                                <div id="btn__favorite">
                                <ion-icon id="icon__favorite" name="heart-outline" ></ion-icon>
                                </div>
                                <a href="./pages/detalhesProduto.php?id=<?php echo $produto['id'] ?>"><img src="<?php echo $produto['path'] ?>" alt=""></a>
                                <span class="card__description">
                                    <p class="card__nome"><?php echo $produto['descricao']; ?></p>
                                    <p class="card__preco">R$<?php echo $produto['preco'];?></p>
                                </span>

                                <button>Add Car</button>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </section>

            <!-- Fim quando usuário não busca -->
        <?php
            }
            else{
                $pesquisa = $mysqli->real_escape_string($_GET['busca']);
                $sql_search = "SELECT * FROM produtos
                WHERE descricao LIKE '%$pesquisa%'";

                $sql_query = $mysqli->query($sql_search) or die ("Erro ao consultar" . $mysqli->error);

                if($sql_query->num_rows == 0){
        ?>
                    <h2 id="not__found">Não foi possivel encontrar o produto :(</h2>
                <?php

                }
                else{
                    while($dados = $sql_query->fetch_assoc()){
                ?>
                <section>
                    <div id="cards">
                        <div id="card">
                            <img src="<?php echo $dados['path'] ?>" alt="">
                            <span id="card__description">
                                <p><?php echo $dados['descricao']; ?></p>
                                <p>R$<?php echo $dados['preco'];?></p>
                            </span>
                        </div>   
                    </div>
            </section>
                <?php
                    }
                }
            }
                ?>
    </main>

    <footer class="footer">
        <h2>CN Store</h2>
        <span id="copy">&copy; Copyright CN Store 2022 - Todos os direitos reservados</span>

        <ul id="social__media">
            <li class="social__item"><a href="#"><i class="uil uil-facebook"></i></a></li>
            <li class="social__item"><a href="#"><i class="uil uil-instagram"></i></a></li>
        </ul>
    </footer>

    <script src="./scripts/search.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
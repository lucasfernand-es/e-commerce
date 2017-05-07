<?php
    $title = "Home Page";
    include "include/header.php";
    ?>

<div class="main">
    <div class="banner">
        <img src="images/index/banner1.jpg"/>
        <h2>
            <span>E-Commerce :: <br/>O site de E-Commerce</span>
        </h2>
    </div>
</div>


<div class="content">

    <div class="row">
        <div class="col-md-12">


        <ul>
            <li>
                <h4>Index: Apresentando o site com os principais acessos aos recursos. <span class="glyphicon glyphicon-check green"></span></h4>
                <blockquote>
                    <p>A barra de menus no topo da página permite o acesso a todos os recursos desse website.</p>
                </blockquote>
            </li>
            <li>
                <h4>Login: administrador e cliente. <span class="glyphicon glyphicon-check green"></span></h4>
                <blockquote>
                    <p>Clique <a href="login.php">aqui</a> para acessar o login.</p>
                    <p>Logins disponíveis:</p>
                    <ul>
                        <li>Administrador - E-mail: <ins>admin@admin</ins> Senha: <ins>senha123</ins></li>
                        <li>Cliente - E-mail: <ins>cliente@cliente.com</ins> Senha: <ins>senha123</ins></li>
                    </ul>
                </blockquote>
            </li>
            <li>
                <h4>CRUD de produtos. <span class="glyphicon glyphicon-check green"></span></h4>
                <blockquote>
                    <p>Clique <a href="product.php">aqui</a> para acessar o CRUD de Produtos.</p>
                </blockquote>
            </li>
            <li>
                <h4>CRUD de fornecedores. <span class="glyphicon glyphicon-check green"></span></h4>
                <blockquote>
                    <p>Clique <a href="supplier.php">aqui</a> para acessar o CRUD de Fornecedores.</p>
                </blockquote>
            </li>
            <li>
                <h4>CRUD de clientes. <span class="glyphicon glyphicon-check green"></span></h4>
                <blockquote>
                    <p>Clique <a href="client.php">aqui</a> para acessar o CRUD de Clientes.</p>
                    <p>Nota: Qualquer novo cliente criado pode fazer login no sistema.</p>
                </blockquote>
            </li>
            <li>Em um documento PDF apresentar pelo menos 3 sites similares e suas características, vantagens e desvantagens. Disponibilizar este PDF como um link no seu site.</li>
            <li>Apresentar comentários no código acerca do funcionamento das principais instruções em PHP.</li>
        </ul>

        </div>
    </div>

</div>



<?php include "include/footer.php"; ?>
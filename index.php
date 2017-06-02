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

            <li><h1>New Version - APS 3</h1></li>
            <li><h4>Codificar seu projeto orientado a objetos usando PHP e PDO, E diagrama de casos de uso e classes básico. <span class="glyphicon glyphicon-check green"></span></h4>
                <blockquote>
                    PDO está na classe  <code>src/crud/DAO.php</code>

                    <p>Clique <a href="docs/images/ClassDiagram.png" target="_blank">aqui</a> para visualizar o diagrama de Classes.</p>
                    <p>Clique <a href="docs/images/UseCase.png" target="_blank">aqui</a> para visualizar o diagrama de Caso de Uso.</p>
                </blockquote>
            </li>

            <li>
                <h4>A validação dos campos e recursos que melhoram a usabilidade (como botão de busca) devem ser implementados com Ajax. <span class="glyphicon glyphicon-check green"></span></h4>
                <blockquote>
                    <p>Validação Implementada na versão passada.</p>
                    <p>Página de Produtos com barra de buscas.</p>  <p>Clique <a href="product.php">aqui</a> para acessar Produtos.</p>
                </blockquote>
            </li>
            <li><h1>Last Version - APS 2</h1></li>
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
            <li>
                <h4>Em um documento PDF apresentar pelo menos 3 sites similares e suas características, vantagens e desvantagens. Disponibilizar este PDF como um link no seu site <span class="glyphicon glyphicon-check green"></span></h4>
                <blockquote>
                    <p>Clique <a href="docs/doc_e_commerce.pdf" target="_blank">aqui</a> para visualizar o PDF.</p>
                </blockquote>
            </li>
            <li>
                <h4>Apresentar comentários no código acerca do funcionamento das principais instruções em PHP. <span class="glyphicon glyphicon-check green"></span></h4>
                <blockquote>
                    <h4>Observações:</h4>
                    <ol>
                        <li>Utiliza-se AJAX para acessar o back-end.</li>
                        <li>Cada classe do sistema (cliente) possui uma pasta homônimo dentro de <code>src</code>.</li>
                        <li>
                            Cada pasta de classe contém quatro arquivos: <code>action.php</code>, <code>crudModal.php</code>, <code>resultData.php</code> e <code>crudMethods.php</code>.
                            <ul>
                                <li><code>action.php</code>: </li>
                                <li><code>crudModal.php</code>: </li>
                                <li><code>resultData.php</code>: </li>
                                <li><code>crudMethods.php</code>: </li>
                            </ul>
                        </li>
                        <li><code>src/crud.php</code> é um arquivo javascript que é utilizado para realizar as operações CRUD do sistema.</li>
                        <li>
                            <code>include/header.php</code> e <code>include/footer.php</code> são utilizadas em todos as páginas do sistema.
                        </li>
                        <li>
                            Parte do código será revisado quando o site utilizar Angular.js.
                        </li>
                    </ol>
                </blockquote>
            </li>
            <li>
                <h4>Nesta APS será avaliado também o acesso ao banco de dados. <span class="glyphicon glyphicon-check green"></span></h4>
                <blockquote>
                    <p>Acesso ao banco de dados é realizado por meio da do arquivo localizado em <code>src/connection.php</code>.</p>
                    <p>Utiliza-se a classe <code>PDO</code> e o banco de dados MySQL.</p>
                    <p>Clique <a href="bd/eCommerce.sql" download>aqui</a> para fazer o download do banco de dados.</p>

                    <h4>Observações:</h4>
                    <p>
                        O sistema não possui uma classe cliente e sim um <code>user</code>.
                        <br/>
                        <code>user</code> possui dois tipos: 0 (administrador) e 1 (cliente).
                    </p>
                </blockquote>
            </li>
            <li><h4>Clique <a href="https://github.com/lucasfernand-es/e-commerce" target="_blank">aqui</a> para acessar o GIT desse projeto.</h4></li>
        </ul>

        </div>
    </div>

</div>



<?php include "include/footer.php"; ?>
A lógica funciona da seguinte forma:

1. Cada classe do sistema possui uma pasta homônimo dentro de src
2. Cada pasta contém quatro (três nas que não foram atualizadas) arquivos: action.php, crudModal.php, resultData.php e crudMethods.php

    2.1. action.php processa os requisitos do front-end diretamenta.
        2.1.1.
        2.1.2.
        2.1.3.
        2.1.4.
    2.2. crudModal.php contém o formulário necessário para adicionar e editar um dado
    2.3. resultData.php exibe os dados na tela da classe
    2.4. crudMethods.php requisita o banco de dados e processa os dados.




3. connection.php realiza a conexão com o bando de dados utilizando PDO.
4. crud.php é um arquivo javascript que é utilizado para realizar as operações CRUD do sistema.
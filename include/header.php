<?php

    session_start();

    if(isset($_SESSION['session']))
    {
        $user =  $_SESSION['session'];
        if(isset($_SESSION['admin']) )
            $admin = true;
        else
            $admin = false;
    }
    else {
        $user = null;
        $admin = false;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php echo $title; ?> :: E-Commerce </title>


    <link href="css/e-commerce.css" rel="stylesheet" />



    <!-- JQuery -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>

    <!-- Angular -->
    <script src="node_modules/angular/angular.js" type="text/javascript"></script>

    <script src="js/supplier/SupplierController.js" type="text/javascript"></script>



    <!-- Bootstrap -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Validator -->
    <script src="node_modules/bootstrap-validator/dist/validator.min.js" type="text/javascript"></script>

    <!-- CRUD Methods -->
    <!-- Inclui a página crud.php que contém os scripts javascript-->

    <?php if ($class) include_once "src/crud.php"?>
    <script src="js/accessControl.js" type="text/javascript"></script>




</head>

<body>

    <nav class="navbar navbar-inverse ">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">E-Commerce</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="product.php">Produtos</a></li>
                <li><a href="supplier.php">Fornecedores</a></li>
                <li><a href="client.php">Clientes</a></li>
            </ul>


            <ul class="nav navbar-nav navbar-right">
                <?php
                    if($user) {
                        if ($admin) echo "<li><a disabled='true'> Administrador </a></li>";
                        echo "<li><a disabled='true'><span class=\"glyphicon glyphicon-user\"></span> ". $user ."</a></li>";
                        echo "<li><a id='logout'><span class=\"glyphicon glyphicon-log-out\"></span> Logout </a></li>";
                    }
                    else {
                        echo "<li><a href=\"login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
                    }
                ?>

            </ul>


        </div>
    </nav>

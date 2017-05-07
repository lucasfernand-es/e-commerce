<?php
/**
 * Created by PhpStorm.
 * User: lfernandes
 * Date: 5/6/17
 * Time: 8:50 AM
 */
// Classe de conexão

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "e_commerce";

try {
    // Cria uma string de conexão com o banco de dados MYSQL
    $GLOBALS['conn'] = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $GLOBALS['conn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();

}



?>
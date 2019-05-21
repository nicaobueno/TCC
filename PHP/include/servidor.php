<?php  
    $servername = "phproot";
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'tcc';

    //conecta com o banco de dados
    $db = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

    if (!$db) {
        die('Falha na conexão: '.mysqli_connect_error());
    }
?>
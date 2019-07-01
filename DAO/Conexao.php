<?php

/**
 * Classe responsável por realzar a conexão da aplicação com o banco de dados
 *
 * @author Gustavo Guerra
 */
$servername = "localhost";
$username = "root";
$password = "";

try {
	//instancia objeto PDO, conectando no MySQL
    $conexao = new PDO("mysql:host=$servername;dbname=academia", $username, $password);
    // apresenta o erro PDO 
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexao realizada com sucesso!"; 
}catch(PDOException $e){
    echo "Conexao falhou: " . $e->getMessage();
}

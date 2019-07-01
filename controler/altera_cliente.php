<?php
include_once '../DAO/Conexao.php';
include_once '../DAO/clienteDAO.php';
include_once '../DAO/classes/cliente.php';

$cliente = new cliente;
$cliente->setNome($_POST["nome"]);
$cliente->setTelefone($_POST["telefone"]);
$cliente->setEmail($_POST["email"]);
$cliente->setObjetivo($_POST["objetivo"]);
$cliente->setIdcliente($_POST["id_cliente"]);

$result = altera_cliente($conexao, $cliente);

if ($result) {
	header("Location:../views/exibe_cliente.php?id_cliente=".$cliente->getIdcliente()."&resposta=Dados Alterados com Sucesso!&situacao=alert alert-success&evento=$evento");
}else{
	header("Location:../views/exibe_cliente.php?id_cliente=".$cliente->getIdcliente()."&resposta=Erro ao Alterar!&situacao=alert alert-danger&evento=$evento");
}
<?php
include_once '../DAO/Conexao.php';
include_once '../DAO/fichaDAO.php';
include_once '../DAO/classes/ficha.php';

$ficha = new ficha;
$ficha->setId_ficha($_POST["id_ficha"]);
$ficha->setSegunda($_POST["segunda"]);
$ficha->setTerca($_POST["terca"]);
$ficha->setQuarta($_POST["quarta"]);
$ficha->setQuinta($_POST["quinta"]);
$ficha->setSexta($_POST["sexta"]);
$ficha->setSabado(' ');

$id_cliente = $_POST["id_cliente"];

$result = altera_ficha($conexao, $ficha);

if ($result) {
	header("Location:../views/exibe_cliente.php?id_cliente=".$id_cliente."&resposta=Ficha Alterada com Sucesso!&situacao=alert alert-success&evento=$evento");
}else{
	header("Location:../views/exibe_cliente.php?id_cliente=".$id_cliente."&resposta=Erro ao Alterar!&situacao=alert alert-danger&evento=$evento");
}
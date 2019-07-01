<?php
include_once '../DAO/Conexao.php';
include_once '../DAO/medidasDAO.php';
include_once '../DAO/classes/medidas.php';

$medida = new medidas;
$medida->setAltura($_POST["altura"]);
$medida->setAntebraco($_POST["antebraco"]);
$medida->setBraco($_POST["braco"]);
$medida->setCoxa($_POST["coxa"]);
$medida->setId_cliente($_POST["idcliente"]);
$medida->setPanturrilha($_POST["panturrilha"]);
$medida->setPeito($_POST["peito"]);
$medida->setPeso($_POST["peso"]);
$medida->setPulso($_POST["pulso"]);
$medida->setQuadril($_POST["quadril"]);
$medida->setTorax($_POST["torax"]);

$result = inserir_medidas($conexao, $medida);

if ($result) {
	header("Location:../views/exibe_cliente.php?id_cliente=".$medida->getId_cliente()."&resposta=Medida Adicionada com Sucesso!&situacao=alert alert-success&evento=$evento");
}else{
	header("Location:../views/exibe_cliente.php?id_cliente=".$medida->getId_cliente()."&resposta=Erro ao Adicionar!&situacao=alert alert-danger&evento=$evento");
}
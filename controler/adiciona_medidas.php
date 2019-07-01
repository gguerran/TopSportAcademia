<?php
include_once '../DAO/Conexao.php';
include_once '../DAO/medidasDAO.php';
include_once '../DAO/classes/medidas.php';

$medida = new medidas;
$medida->setAltura($_POST["altura"]);
$medida->setAntebraco_direito($_POST["antebraco_direito"]);
$medida->setAntebraco_esquerdo($_POST["antebraco_esquerdo"]);
$medida->setBraco_direito($_POST["braco_direito"]);
$medida->setBraco_esquerdo($_POST["braco_esquerdo"]);
$medida->setCoxa_direita($_POST["coxa_direita"]);
$medida->setCoxa_esquerda($_POST["coxa_esquerda"]);
$medida->setId_cliente($_POST["idcliente"]);
$medida->setPanturrilha_direita($_POST["panturrilha_direita"]);
$medida->setPanturrilha_esquerda($_POST["panturrilha_esquerda"]);
$medida->setPeito($_POST["peito"]);
$medida->setPeso($_POST["peso"]);
$medida->setPulso_direito($_POST["pulso_direito"]);
$medida->setPulso_esquerdo($_POST["pulso_esquerdo"]);
$medida->setQuadril($_POST["quadril"]);
$medida->setTorax($_POST["torax"]);
$medida->setTornozelo_direito($_POST["tornozelo_direito"]);
$medida->setTornozelo_esquerdo($_POST["tornozelo_esquerdo"]);

$result = inserir_medidas($conexao, $medida);

if ($result) {
	header("Location:../views/exibe_cliente.php?id_cliente=".$medida->getId_cliente()."&resposta=Medida Adicionada com Sucesso!&situacao=alert alert-success&evento=$evento");
}else{
	header("Location:../views/exibe_cliente.php?id_cliente=".$medida->getId_cliente()."&resposta=Erro ao Adicionar!&situacao=alert alert-danger&evento=$evento");
}
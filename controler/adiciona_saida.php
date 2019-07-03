<?php
include_once '../DAO/Conexao.php';
include_once '../DAO/saidaDAO.php';
include_once '../DAO/classes/saida.php';

$saida = new saida;
$saida->setValor($_POST["valor"]);
$saida->setDescricao($_POST["descricao"]);
$usuario = $_POST["id_usuario"];

$result = inserir_saida($conexao, $saida, $usuario);

if ($result) {
	header("Location:../views/lista_saida.php?resposta=Saída Adicionada com Sucesso!&situacao=alert alert-success&evento=$evento");
}else{
	header("Location:../views/lista_saida.php?resposta=Erro ao Adicionar!&situacao=alert alert-danger&evento=$evento");
}
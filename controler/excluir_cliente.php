<?php

include_once '../DAO/Conexao.php';
include_once '../DAO/clienteDAO.php';

$id = $_GET['id_cliente'];
$result = deleta_cliente($conexao, $id);

if ($result) {
	header("Location:../views/lista_clientes.php?resposta=Cliente Deletado Com Sucesso!&situacao=alert alert-success&evento=$evento");
}else{
	header("Location:../views/lista_clientes.php?resposta=Erro ao Deletar!&situacao=alert alert-danger&evento=$evento");
}
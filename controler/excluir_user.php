<?php
include_once '../DAO/Conexao.php';
include_once '../DAO/usuarioDAO.php';

$id = $_GET['id_usuario'];
$result = deletar_usuario($conexao, $id);

if ($result) {
	header("Location:../views/lista_usuarios.php?resposta=Usuário Deletado Com Sucesso!&situacao=alert alert-success&evento=$evento");
}else{
	header("Location:../views/lista_usuarios.php?resposta=Erro ao Deletar!&situacao=alert alert-danger&evento=$evento");
}
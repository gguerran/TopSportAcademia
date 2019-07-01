<?php
include '../DAO/avulsoDAO.php';
include '../DAO/conexao.php';
include '../DAO/valoresDAO.php';
$valor = busca_valor_avulso($conexao);
$id_usuario = $_GET["id_usuario"];
$res = inserir_avulso($conexao, $valor, $id_usuario);

if ($res) {
    header("Location:../views/index_user.php?resposta=Avulso Adicionado Com Sucesso!&situacao=alert alert-success");
} else {
    header("Location:../views/index_user.php?resposta=Erro ao Adicionar Avluso!&situacao=alert alert-danger");
}


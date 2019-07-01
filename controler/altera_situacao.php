<?php
include '../DAO/pagamentoDAO.php';
include '../DAO/Conexao.php';
$id_cliente = $_GET["id_cliente"];
$id_usuario = $_GET["id_usuario"];
$res = insere_pagamento($conexao, $id_cliente, $id_usuario);
if ($res) {
    header("Location:../views/index_user.php?resposta=Mensalidade Paga!&situacao=alert alert-success");
} else {
    header("Location:../views/index_user.php?resposta=Erro ao Pagar!&situacao=alert alert-danger");
}


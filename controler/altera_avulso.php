<?php
include '../DAO/conexao.php';
include '../DAO/valoresDAO.php';
$valor = $_POST["valor"];
$res = altera_avulso($conexao, $valor);

if ($res) {
    header("Location:../views/lista_avulso.php?resposta=Valor Alterado Com Sucesso!&situacao=alert alert-success");
} else {
    header("Location:../views/index_user.php?resposta=Erro ao ALterar Avluso!&situacao=alert alert-danger");
}


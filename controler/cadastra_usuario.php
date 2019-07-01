<?php
include_once '../DAO/Conexao.php';
include_once '../DAO/usuarioDAO.php';

$nome = $_POST['nome'];
$senha = $_POST['senha'];
if ($_POST['nivel'] == 'gerente'){
    $nivel = 1;       
}
else{
    $nivel = 0;
}
$result = inserir_usuario($conexao, $nome, $senha, $nivel);

if ($result) {
	header("Location:../views/index_user.php?resposta=Usuário Cadastrado!&situacao=alert alert-success&evento=$evento");
}else{
	header("Location:../views/form_cadastra_usuario.php?resposta=Erro ao Cadastrar!&situacao=alert alert-danger&evento=$evento");
}
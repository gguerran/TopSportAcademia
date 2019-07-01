<?php
include_once '../DAO/Conexao.php';
include_once '../DAO/UsuarioDAO.php';

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$id_usuario_altera = $_POST["id_altera"];
if ($_POST['nivel'] == 'gerente'){
    $nivel = 1;       
}
else{
    $nivel = 0;
}
$result = altera_usuario($conexao, $nome, $senha, $nivel, $id_usuario_altera);

if ($result) {
	header("Location:../views/index_user.php?resposta=Usuário Alterado com sucesso!&situacao=alert alert-success&evento=$evento");
}else{
	header("Location:../views/form_cadastra_usuario.php?resposta=Erro ao ALterar!&situacao=alert alert-danger&evento=$evento");
}
<?php
include_once '../DAO/Conexao.php';
include_once '../DAO/fichaDAO.php';
include_once '../DAO/medidasDAO.php';
include_once '../DAO/pagamentoDAO.php';
include_once '../DAO/classes/cliente.php';
include_once '../DAO/classes/ficha.php';
include_once '../DAO/classes/medidas.php';
include_once '../DAO/classes/pagamento.php';

$id_usuario = $_GET["user_id"];

$ficha = new ficha;

$ficha->setSegunda($_POST['segunda']);
$ficha->setTerca($_POST['terca']);
$ficha->setQuarta($_POST['quarta']);
$ficha->setQuinta($_POST['quinta']);
$ficha->setSexta($_POST['sexta']);
$ficha->setSabado(' ');
inserir_ficha($conexao, $ficha);

$cliente = new cliente;
$cliente->setNome($_POST['nome']);
$cliente->setEmail($_POST['email']);
$cliente->setTelefone($_POST['telefone']);
$cliente->setFicha_id(ultima_ficha($conexao));
$cliente->setData_nascimento($_POST['data_nascimento']);
$cliente->setData_vencimento($_POST['data_vencimento']);
$cliente->setObjetivo($_POST["objetivo"]);

$medida = new medidas;
$medida->setAltura($_POST["altura"]);
$medida->setAntebraco_direito($_POST["antebraco_direito"]);
$medida->setAntebraco_esquerdo($_POST["antebraco_esquerdo"]);
$medida->setBraco_direito($_POST["braco_direito"]);
$medida->setBraco_esquerdo($_POST["braco_esquerdo"]);
$medida->setCoxa_direita($_POST["coxa_direita"]);
$medida->setCoxa_esquerda($_POST["coxa_esquerda"]);
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

$cliente->adicionaMedidas($medida);
$result = inserir_cliente($conexao, $cliente);

$medida->setId_cliente(busca_id_cliente($conexao, $cliente->getNome()));
inserir_medidas($conexao, $medida);


if ($result) {
	header("Location:../views/index_user.php?resposta=Cliente Cadastrado!&situacao=alert alert-success");
}else{
	header("Location:../views/form_cadastra_clientes.php?resposta=Erro ao Cadastrar!&situacao=alert alert-danger");
}
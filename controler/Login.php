<?php
require_once '../DAO/Conexao.php';
require_once '../DAO/usuarioDAO.php';

echo 'Teste';
$nome = $_POST["nome"];
$senha = $_POST["senha"];
if (isset($_POST["nome"])) {
    echo 'teste01';
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $resultado = login($conexao, $nome, $senha);
    if ($resultado) {
        $cont = 0;
        foreach ($resultado as $key => $linha) {
            $cont++;
            $id = $linha["idusuario"];
            $nome = $linha["nome_user"];
            $nivel = $linha["nivel"];
            echo "string";

            session_start();
            $_SESSION["idusuario"] = $id;
            $_SESSION["nome"] = $nome;
            $_SESSION["nivel"] = $nivel;
            header("Location:../views/index_user.php");
        }
        if ($cont == 0) {
            header("Location:../views/index.php?resposta=Nome ou senha incorretos!&situacao=alert alert-danger");
        }
    }
}

<?php
/**
 * Arquivo responsável por realizar a interação do sistema com a tabela usuários
 *
 * @author Gustavo Guerra
 */
function inserir_usuario($conexao, $nome, $senha, $nivel) {
    $result = $conexao->exec("INSERT INTO usuario(nome_user, senha, nivel) VALUES ('{$nome}','{$senha}', '{$nivel}')");
    return $result;
}

function pesquisa_user($conexao, $nome) {
    try{
        $result = $conexao->query("SELECT * FROM usuario WHERE nome_user LIKE '%".$nome."%' ORDER BY nome_user");
    } catch (PDOException $e){
        print "Erro!: ". $e -> getMessage(). "<br>";
    }
    return $result;
}

function deletar_usuario($conexao, $id) {
    try {
        $result = $conexao->exec("UPDATE usuario SET atividade=0 WHERE idusuario = " . $id);
    } catch (PDOException $e) {
        print "Erro!: ". $e -> getMessage(). "<br>";
    }
    return $result;
}

function lista_todos_usuarios($conexao) {
    $result = $conexao->query("SELECT * FROM usuario");
    return $result;
}
function pesquisa_usuarios($conexao, $nome) {
    $result = $conexao->query("SELECT * FROM usuario WHERE nome_user LIKE '%".$nome."%' ORDER BY nome_user");
    return $result;
}

function lista_usuario($conexao, $id) {
    $result = $conexao->query("SELECT * FROM usuario WHERE idusuario = " . $id);
    return $result;
}

function altera_usuario($conexao, $nome, $senha, $nivel, $id) {
    $result = $conexao->query("UPDATE usuario SET nome_user='$nome', senha='$senha', nivel=$nivel WHERE idusuario = $id");
    return $result;
}

function login($conexao, $nome, $senha) {
    $result = $conexao->query("SELECT * FROM usuario WHERE nome_user='$nome' and senha='$senha'");
    return $result;
}
?>



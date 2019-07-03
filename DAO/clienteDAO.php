<?php

/**
 * Arquivo responsável por realizar a interação do sistema com a tabela cliente
 *
 * @author Gustavo Guerra
 */
function busca_vencimento($conexao) {
    $result = $conexao->query("SELECT * FROM cliente WHERE DATEDIFF(data_vencimento, NOW())<5 ORDER BY data_vencimento ASC");
    return $result;
}

function busca_id_ficha($conexao, $id_ficha) {
    $result = $conexao->query("SELECT idcliente FROM cliente WHERE id_ficha = $id_ficha");
    return $result;
}

function pesquisa_vencimento($conexao, $nome) {
    $result = $conexao->query("SELECT * FROM cliente WHERE DATEDIFF(data_vencimento, NOW())<5 AND nome LIKE '%".$nome."%' ORDER BY nome");
    return $result;
}

function busca_id_cliente($conexao, $nome){
    try {
        $result = $conexao->query("SELECT * FROM cliente WHERE nome = '{$nome}'");
        if ($result) {
            foreach ($result as $key => $row) {
                $id = $row["idcliente"];
            }
        }
    }catch (PDOException $e) {
        print "Erro!: " . $e->getMessage() . "<br>";
    }
    return $id;
}

function pesquisa_cliente($conexao, $nome) {
    try{
        $result = $conexao->query("SELECT * FROM cliente WHERE nome LIKE '%".$nome."%' ORDER BY nome");
    } catch (PDOException $e){
        print "Erro!: ". $e -> getMessage(). "<br>";
    }
    return $result;
}

function inserir_cliente($conexao, cliente $cliente) {
    $ficha_id = ultima_ficha($conexao);
    $result = $conexao->exec("INSERT INTO cliente(nome, telefone, email, data_nascimento, objetivo, ficha_id, data_cadastro, data_vencimento) VALUES ('{$cliente->getNome()}','{$cliente->getTelefone()}', '{$cliente->getEmail()}', '{$cliente->getData_nascimento()}', '{$cliente->getObjetivo()}', '{$cliente->getFicha_id()}', NOW(), '{$cliente->getData_vencimento()}')");
    return $result;
}


function lista_clientes($conexao) {
    $result = $conexao->query("SELECT * FROM cliente");
    return $result;
}

function lista_cliente($conexao, $id) {
    $result = $conexao->query("SELECT * FROM cliente WHERE idcliente = " . $id);
    return $result;
}

function monta_cliente($conexao, $id){
    $result = lista_cliente($conexao, $id);
    $cliente = $result->fetch(PDO::FETCH_OBJ);
    return $cliente;
}

function altera_cliente($conexao, cliente $cliente) {
    $result = $conexao->query("UPDATE cliente SET objetivo = '".$cliente->getObjetivo()."',nome='".$cliente->getNome()."', email='".$cliente->getEmail()."', telefone='".$cliente->getTelefone()."' WHERE idcliente = ".$cliente->getIdcliente()."");
    return $result;
}
function altera_vencimento($conexao, $id_cliente){
    $result = $conexao->query("UPDATE cliente SET data_vencimento = (SELECT DATE_ADD(NOW(), INTERVAL 30 DAY)) WHERE idcliente = $id_cliente");
    return $result;
}
function deleta_cliente($conexao, $id){
    $result = $conexao->query("UPDATE cliente SET cliente.atividade = 0 WHERE idcliente = $id");
    $result2 = $conexao->exec("DELETE FROM medidas WHERE medidas.cliente_id IN (SELECT cliente.idcliente FROM cliente WHERE cliente.atividade != 1)");
    return $result;
}

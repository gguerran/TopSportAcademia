<?php

/**
 * Arquivo responsável por realizar a interação do sistema com a tabela caixa
 *
 * @author Gustavo Guerra
 */
function inserir_caixa_pagamento($conexao, $id_pgto, $id_user){
    try{
        $result = $conexao->exec("INSERT INTO caixa(pagamento_id, usuario_id, data_caixa) VALUES (".$id_pgto.", ".$id_user.", NOW())");
    }catch (PDOException $e) {
        print "Erro!: " . $e->getMessage() . "<br>";
    }
    return $result;
}

function inserir_caixa_avulso($conexao, $id_avulso, $_id_user){
    $result = $conexao->exec("INSERT INTO caixa(avulso_id, usuario_id, data_caixa) VALUES (".$id_avulso.", ".$_id_user.", NOW())");
    return $result;
}
function inserir_caixa_saida($conexao, $id_saida){
    $result = $conexao->exec("INSERT INTO caixa(pagamento_id, data_caixa) VALUES (".$id_saida.", NOW())");
    return $result;
}
function pesquisa_caixa_datas($conexao, $data_inicial, $data_final){
    $result = $conexao->exec("SELECT * FROM caixa WHERE data_caixa BETWEEN ".$data_inicial." AND ".$data_final."");
    return $result;
}
function valor_total_caixa($conexao, $data_inicial, $data_final){
    $result = $conexao->exec("SELECT * FROM caixa WHERE data_caixa");
    return $result;
}?>
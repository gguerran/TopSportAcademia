<?php

/**
 * Arquivo responsável por realizar a interação do sistema com a tabela saida
 *
 * @author Gustavo Guerra
 */
function inserir_saida($conexao, saida $saida){
    $result = $conexao->exec("INSERT INTO saida(valor, descricao, data_saida) VALUES (".$saida->getValor().", '".$saida->getDescricao()."', NOW())");
    return $result;
}
function lista_saida($conexao){
    $result = $conexao->query("SELECT * FROM saida");
    return $result;
}
function lista_saida_datas($conexao, $data_inicial, $data_final){
    $result = $conexao->query("SELECT * FROM saida WHERE data_saida BETWEEN '".$data_inicial."' AND '".$data_final."'");
    return $result;
}
<?php

/**
 * Description of medidasDAO
 *
 * @author Gustavo Guerra
 */
function inserir_medidas($conexao, medidas $medidas) {
    $result = $conexao->query("INSERT INTO medidas(altura, peso, braco, antebraco, pulso, peito, torax, quadril, coxa, panturrilha, cliente_id) VALUES ({$medidas->getAltura()}, {$medidas->getPeso()}, {$medidas->getBraco()}, {$medidas->getAntebraco()}, {$medidas->getPulso()}, {$medidas->getPeito()}, {$medidas->getTorax()}, {$medidas->getQuadril()}, {$medidas->getCoxa()}, {$medidas->getPanturrilha()}, {$medidas->getId_cliente()})");
    return $result;
}
function lista_medidas($conexao, $id) {
    $result = $conexao->query("SELECT * FROM medidas WHERE cliente_id = " . $id);
    return $result;
}
function monta_medidas($conexao, $id){
    $result = lista_medidas($conexao, $id);
    $ficha = $result->fetch(PDO::FETCH_OBJ);
    return $ficha;
}

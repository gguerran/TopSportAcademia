<?php

/**
 * Description of medidasDAO
 *
 * @author Gustavo Guerra
 */
function inserir_medidas($conexao, medidas $medidas) {
    $result = $conexao->query("INSERT INTO medidas(altura, peso, braco_direito, braco_esquerdo, antebraco_direito, "
            . "antebraco_esquerdo, pulso_direito, pulso_esquerdo, peito, torax, quadril, coxa_direita, "
            . "coxa_esquerda, panturrilha_direita, panturrilha_esquerda, tornozelo_direito, tornozelo_esquerdo, "
            . "cliente_id) VALUES "
            . "({$medidas->getAltura()}, {$medidas->getPeso()}, {$medidas->getBraco_direito()}, {$medidas->getBraco_esquerdo()}, "
            . "{$medidas->getAntebraco_direito()}, {$medidas->getAntebraco_esquerdo()}, {$medidas->getPulso_direito()}, "
            . "{$medidas->getPulso_esquerdo()}, {$medidas->getPeito()}, {$medidas->getTorax()}, {$medidas->getQuadril()}, "
            . "{$medidas->getCoxa_direita()}, {$medidas->getCoxa_esquerda()}, {$medidas->getPanturrilha_direita()}, "
            . "{$medidas->getPanturrilha_esquerda()}, {$medidas->getTornozelo_direito()}, {$medidas->getTornozelo_esquerdo()}, "
            . "{$medidas->getId_cliente()})");
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

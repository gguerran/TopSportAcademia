<?php


/**
 * Definição da classe caixa
 *
 * @author Gustavo Guerra
 */
class caixa {
    private $pagamento;
    private $saida;
    private $avulso;
    
    function getPagamento() {
        return $this->pagamento;
    }

    function getSaida() {
        return $this->saida;
    }

    function getAvulso() {
        return $this->avulso;
    }

    function setPagamento($pagamento) {
        $this->pagamento = $pagamento;
    }

    function setSaida($saida) {
        $this->saida = $saida;
    }

    function setAvulso($avulso) {
        $this->avulso = $avulso;
    }
}

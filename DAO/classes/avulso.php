<?php

/**
 * Classe responsável pela definição de avulso
 *
 * @author Gustavo Guerra
 */
class avulso {
    private $data;
    private $valor;
    
    function getData() {
        return $this->data;
    }

    function getValor() {
        return $this->valor;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }
}

<?php
/**
 * Description of saida
 *
 * @author Gustavo Guerra
 */
class saida {
    //put your code here
    private $descricao;
    private $valor;
    private $data;
    
    function getDescricao() {
        return $this->descricao;
    }

    function getValor() {
        return $this->valor;
    }

    function getData() {
        return $this->data;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setData($data) {
        $this->data = $data;
    }
}

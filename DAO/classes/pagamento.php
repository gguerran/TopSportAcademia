<?php
/**
 * Definição de pagamento
 *
 * @author Gustavo Guerra
 */
class pagamento {
    //put your code here
    private $data;
    private $valor;
    private $usuario;
    private $cliente;
    function getData() {
        return $this->data;
    }

    function getValor() {
        return $this->valor;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getCliente() {
        return $this->cliente;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }
}

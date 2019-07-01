<?php

//include './medidas.php';
//include './ficha.php';

/**
 * Classe responsavel pela definição de Cliente
 *
 * @author Gustavo Guerra
 */
class cliente {
    private $idcliente;
    private $nome;
    private $data_nascimento;
    private $data_cadastro;
    private $data_vencimento;
    private $email;
    private $telefone;
    private $id_ficha;
    private $objetivo;
    public $medidas;

    public function adicionaMedidas(Medidas $medida) {
        $this->medidas[] = $medida;
    }
    
    function getIdcliente() {
        return $this->idcliente;
    }

    function getNome() {
        return $this->nome;
    }

    function getData_nascimento() {
        return $this->data_nascimento;
    }

    function getData_cadastro() {
        return $this->data_cadastro;
    }

    function getData_vencimento() {
        return $this->data_vencimento;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getFicha_id() {
        return $this->ficha;
    }

    function getObjetivo() {
        return $this->objetivo;
    }

    function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }

    function setData_nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    function setData_cadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }

    function setData_vencimento($data_vencimento) {
        $this->data_vencimento = $data_vencimento;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setFicha_id($ficha) {
        $this->ficha = $ficha;
    }

    function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;
    }
}

<?php

/**
 * classe responsável pela definição de Medidas
 *
 * @author Gustavo Guerra
 */
class medidas {
    private $id_cliente;
    private $altura;
    private $peso;
    private $pulso;
    private $antebraco;
    private $braco;
    private $peito;
    private $torax;
    private $quadril;
    private $coxa;
    private $panturrilha;
    private $data_medicao;
    function getId_cliente() {
        return $this->id_cliente;
    }

    function getData_medicao() {
        return $this->data_medicao;
    }
    function getAltura() {
        return $this->altura;
    }

    function getPeso() {
        return $this->peso;
    }

    function getPulso() {
        return $this->pulso;
    }

    function getAntebraco() {
        return $this->antebraco;
    }

    function getBraco() {
        return $this->braco;
    }

    function getPeito() {
        return $this->peito;
    }

    function getTorax() {
        return $this->torax;
    }

    function getQuadril() {
        return $this->quadril;
    }

    function getCoxa() {
        return $this->coxa;
    }

    function getPanturrilha() {
        return $this->panturrilha;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }
    function setData_medicao($data_medicao) {
        $this->data_medicao = $data_medicao;
    }

    function setAltura($altura) {
        $this->altura = $altura;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    function setPulso($pulso) {
        $this->pulso = $pulso;
    }

    function setAntebraco($antebraco) {
        $this->antebraco = $antebraco;
    }

    function setBraco($braco) {
        $this->braco = $braco;
    }

    function setPeito($peito) {
        $this->peito = $peito;
    }

    function setTorax($torax) {
        $this->torax = $torax;
    }

    function setQuadril($quadril) {
        $this->quadril = $quadril;
    }

    function setCoxa($coxa) {
        $this->coxa = $coxa;
    }

    function setPanturrilha($panturrilha) {
        $this->panturrilha = $panturrilha;
    }
}

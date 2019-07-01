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
    private $pulso_direito;
    private $pulso_esquerdo;
    private $antebraco_direito;
    private $antebraco_esquerdo;
    private $braco_direito;
    private $braco_esquerdo;
    private $peito;
    private $torax;
    private $quadril;
    private $coxa_esquerda;
    private $coxa_direita;
    private $panturrilha_esquerda;
    private $panturrilha_direita;    
    private $tornozelo_direito;
    private $tornozelo_esquerdo;
    private $data_medicao;
    function getId_cliente() {
        return $this->id_cliente;
    }

    function getAltura() {
        return $this->altura;
    }

    function getPeso() {
        return $this->peso;
    }

    function getPulso_direito() {
        return $this->pulso_direito;
    }

    function getPulso_esquerdo() {
        return $this->pulso_esquerdo;
    }

    function getAntebraco_direito() {
        return $this->antebraco_direito;
    }

    function getAntebraco_esquerdo() {
        return $this->antebraco_esquerdo;
    }

    function getBraco_direito() {
        return $this->braco_direito;
    }

    function getBraco_esquerdo() {
        return $this->braco_esquerdo;
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

    function getCoxa_esquerda() {
        return $this->coxa_esquerda;
    }

    function getCoxa_direita() {
        return $this->coxa_direita;
    }

    function getPanturrilha_esquerda() {
        return $this->panturrilha_esquerda;
    }

    function getPanturrilha_direita() {
        return $this->panturrilha_direita;
    }

    function getTornozelo_direito() {
        return $this->tornozelo_direito;
    }

    function getTornozelo_esquerdo() {
        return $this->tornozelo_esquerdo;
    }

    function getData_medicao() {
        return $this->data_medicao;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setAltura($altura) {
        $this->altura = $altura;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    function setPulso_direito($pulso_direito) {
        $this->pulso_direito = $pulso_direito;
    }

    function setPulso_esquerdo($pulso_esquerdo) {
        $this->pulso_esquerdo = $pulso_esquerdo;
    }

    function setAntebraco_direito($antebraco_direito) {
        $this->antebraco_direito = $antebraco_direito;
    }

    function setAntebraco_esquerdo($antebraco_esquerdo) {
        $this->antebraco_esquerdo = $antebraco_esquerdo;
    }

    function setBraco_direito($braco_direito) {
        $this->braco_direito = $braco_direito;
    }

    function setBraco_esquerdo($braco_esquerdo) {
        $this->braco_esquerdo = $braco_esquerdo;
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

    function setCoxa_esquerda($coxa_esquerda) {
        $this->coxa_esquerda = $coxa_esquerda;
    }

    function setCoxa_direita($coxa_direita) {
        $this->coxa_direita = $coxa_direita;
    }

    function setPanturrilha_esquerda($panturrilha_esquerda) {
        $this->panturrilha_esquerda = $panturrilha_esquerda;
    }

    function setPanturrilha_direita($panturrilha_direita) {
        $this->panturrilha_direita = $panturrilha_direita;
    }

    function setTornozelo_direito($tornozelo_direito) {
        $this->tornozelo_direito = $tornozelo_direito;
    }

    function setTornozelo_esquerdo($tornozelo_esquerdo) {
        $this->tornozelo_esquerdo = $tornozelo_esquerdo;
    }

    function setData_medicao($data_medicao) {
        $this->data_medicao = $data_medicao;
    }


}

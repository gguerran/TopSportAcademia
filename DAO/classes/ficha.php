<?php
/**
 * Classe responsável pela definição de ficha
 *
 * @author Gustavo Guerra
 */
class ficha {
    private $segunda;
    private $terca;
    private $quarta;
    private $quinta;
    private $sexta;
    private $sabado;
    private $id_ficha;
    function getSegunda() {
        return $this->segunda;
    }
    function getId_ficha() {
        return $this->id_ficha;
    }
    function getTerca() {
        return $this->terca;
    }

    function getQuarta() {
        return $this->quarta;
    }

    function getQuinta() {
        return $this->quinta;
    }

    function getSexta() {
        return $this->sexta;
    }

    function getSabado() {
        return $this->sabado;
    }
    function setId_ficha($id_ficha) {
        $this->id_ficha = $id_ficha;
    }
    function setSegunda($segunda) {
        $this->segunda = $segunda;
    }

    function setTerca($terca) {
        $this->terca = $terca;
    }

    function setQuarta($quarta) {
        $this->quarta = $quarta;
    }

    function setQuinta($quinta) {
        $this->quinta = $quinta;
    }

    function setSexta($sexta) {
        $this->sexta = $sexta;
    }

    function setSabado($sabado) {
        $this->sabado = $sabado;
    }
}

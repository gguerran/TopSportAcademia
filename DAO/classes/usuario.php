<?php

/**
 * Classe responsável pela definição de usuário
 *
 * @author Gustavo Guerra
 */
class usuario {
    private $nome;
    private $senha;
    private $id;
    
    function getNome() {
        return $this->nome;
    }

    function getSenha() {
        return $this->senha;
    }

    function getId() {
        return $this->id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setId($id) {
        $this->id = $id;
    }
}

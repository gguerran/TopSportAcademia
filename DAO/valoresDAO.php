<?php

/**
 * Arquivo responsável por realizar a interação do sistema com a tabela valores
 *
 * @author Gustavo Guerra
 */

function busca_valor_avulso($conexao){
    try {
        $result = $conexao->query("SELECT valor_avulso FROM valores");
        if ($result) {
            foreach ($result as $key => $row) {
                $avulso = $row["valor_avulso"];
            }
        }
    }catch (PDOException $e) {
        print "Erro!: " . $e->getMessage() . "<br>";
    }
    return $avulso;
}

function busca_valor_mensalidade($conexao){
    try {
        $result = $conexao->query("SELECT valor_mensalidade FROM valores");
        if ($result) {
            foreach ($result as $key => $row) {
                $mensalidade = $row["valor_mensalidade"];
            }
        }
    }catch (PDOException $e) {
        print "Erro!: " . $e->getMessage() . "<br>";
    }
    return $mensalidade;
}

function altera_avulso($conexao, $valor) {
    $result = $conexao->query("UPDATE valores SET valor_avulso=".$valor."");
    return $result;
}

function altera_mensalidade($conexao, $valor) {
    $result = $conexao->query("UPDATE valores SET valor_mensalidade=".$valor."");
    return $result;
}
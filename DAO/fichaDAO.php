<?php
/**
 * Description of fichaDAO
 *
 * @author Gustavo Guerra
 */
function inserir_ficha($conexao, ficha $ficha) {
    $result = $conexao->exec("INSERT INTO ficha(segunda, terca, quarta, quinta, sexta, sabado) VALUES ('{$ficha->getSegunda()}','{$ficha->getTerca()}', '{$ficha->getQuarta()}', '{$ficha->getQuinta()}', '{$ficha->getSexta()}', '{$ficha->getSabado()}')");
    return $result;
}

function ultima_ficha($conexao){
    try {
        $result = $conexao->query("SELECT * FROM ficha");
        if ($result) {
            foreach ($result as $key => $row) {
                $id = $row["idficha"];
            }
        }
    }catch (PDOException $e) {
        print "Erro!: " . $e->getMessage() . "<br>";
    }
    return $id;
}
function busca_ficha($conexao, $id_ficha){
    $result = $conexao->query("SELECT * FROM ficha WHERE idficha = ".$id_ficha);
    return $result;
}

function altera_ficha($conexao, ficha $ficha) {
    $result = $conexao->query("UPDATE ficha SET segunda='".$ficha->getSegunda()."', terca='".$ficha->getTerca()."', quarta='".$ficha->getQuarta()."',quinta='".$ficha->getQuinta()."',sexta='".$ficha->getSexta()."', sabado='".$ficha->getSabado()."' WHERE idficha = ".$ficha->getId_ficha()."");
    return $result;
}
function monta_ficha($conexao, $id){
    $result = busca_ficha($conexao, $id);
    $ficha = $result->fetch(PDO::FETCH_OBJ);
    return $ficha;
}

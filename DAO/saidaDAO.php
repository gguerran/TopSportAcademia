<?php

/**
 * Arquivo responsável por realizar a interação do sistema com a tabela saida
 *
 * @author Gustavo Guerra
 */

function ultimo_id_saida($conexao){
    try {
        $result = $conexao->query("SELECT * FROM saida");
        if ($result) {
            foreach ($result as $key => $row) {
                $id = $row["idsaida"];
            }
        }
    }catch (PDOException $e) {
        print "Erro!: " . $e->getMessage() . "<br>";
    }
    return $id;
}
function lista_saida_datas($conexao, $data_inicial, $data_final, $usuario){
    $result = $conexao->query("SELECT * FROM saida sd JOIN usuario us ON sd.id_usuario = us.idusuario WHERE nome_user LIKE '%".$usuario."%' AND data_saida BETWEEN '".$data_inicial."' AND '".$data_final."'");
    //echo "SELECT * FROM saida sd JOIN usuario us ON sd.id_usuario = us.idusuario WHERE nome_user LIKE '%".$usuario."%' AND data_saida BETWEEN '".$data_inicial."' AND '".$data_final."'";
    return $result;
}
function inserir_saida($conexao, saida $saida, $usuario){
    include 'caixaDAO.php';
    $result = $conexao->exec("INSERT INTO saida(valor, descricao, data_saida, id_usuario) VALUES (".$saida->getValor().", '".$saida->getDescricao()."', NOW(), ".$usuario." )");
    $id_saida = ultimo_id_saida($conexao);
    inserir_caixa_saida($conexao, $id_saida, $usuario);
    return $result;
}

function lista_saida($conexao){
    $result = $conexao->query("SELECT * FROM saida");
    return $result;
}

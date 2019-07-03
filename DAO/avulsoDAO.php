<?php

/**
 * Arquivo responsável por realizar a interação do sistema com a tabela avulso
 *
 * @author Gustavo Guerra
 */


function ultimo_id_avulso($conexao){
    try {
        $result = $conexao->query("SELECT * FROM avulso");
        if ($result) {
            foreach ($result as $key => $row) {
                $id = $row["idavulso"];
            }
        }
    }catch (PDOException $e) {
        print "Erro!: " . $e->getMessage() . "<br>";
    }
    return $id;
}

function lista_avulso($conexao, $data_inicial, $data_final, $nome_usuario){
    try{
        $result = $conexao->query("SELECT us.nome_user, av.valor, ca.data_caixa FROM caixa ca JOIN usuario us ON ca.usuario_id = us.idusuario JOIN avulso av ON ca.avulso_id = av.idavulso WHERE nome_user LIKE '%".$nome_usuario."%' AND data_caixa BETWEEN '".$data_inicial."' AND '".$data_final."'");
    } catch (PDOException $e){
        print "Erro!: ". $e -> getMessage(). "<br>";
    }
    return $result;
}
function inserir_avulso($conexao, $valor, $id_user) {
    include 'caixaDAO.php';
    $result = $conexao->exec("INSERT INTO avulso(data_avulso, valor, usuario_id) VALUES (NOW(),{$valor}, {$id_user})");
    $id_avulso = ultimo_id_avulso($conexao);
    inserir_caixa_avulso($conexao, $id_avulso, $id_user);
    return $result;
}

?>
<?php

/**
 * Arquivo responsável por realizar a interação do sistema com a tabela caixa
 *
 * @author Gustavo Guerra
 */
function inserir_caixa_pagamento($conexao, $id_pgto, $id_user) {
    try {
        $result = $conexao->exec("INSERT INTO caixa(pagamento_id, usuario_id, data_caixa) VALUES (" . $id_pgto . ", " . $id_user . ", NOW())");
    } catch (PDOException $e) {
        print "Erro!: " . $e->getMessage() . "<br>";
    }
    return $result;
}

function inserir_caixa_avulso($conexao, $id_avulso, $_id_user) {
    $result = $conexao->exec("INSERT INTO caixa(avulso_id, usuario_id, data_caixa) VALUES (" . $id_avulso . ", " . $_id_user . ", NOW())");
    return $result;
}

function inserir_caixa_saida($conexao, $id_saida, $id_user) {
    $result = $conexao->exec("INSERT INTO caixa(saida_id, data_caixa, usuario_id) VALUES (" . $id_saida . ", NOW(), " . $id_user . ")");
    return $result;
}

function pesquisa_caixa_datas($conexao, $data_inicial, $data_final, $usuario) {
    $result = $conexao->exec("SELECT * FROM caixa WHERE  data_caixa BETWEEN '" . $data_inicial . "' AND '" . $data_final . "'");

    $total = 0;
    if ($result) {
        $cont2 = 1;
        foreach ($result as $key => $row) {
            $data1 = explode("-", $row['data_pagamento']);
            list($ano, $mes, $dia) = $data1;
            $data = "$dia/$mes/$ano";
            echo "<tr>";
            echo "<td>" . $cont2 . "</td>";
            echo "<td>aaaaaaa</td>";
            echo "<td>aaaaaaaaaaa</td>";
            echo "<td>aaaaa</td>";
            echo "<td>aa</td>";
            echo "</tr>";
            $total = $total + $row['valor'];
            $cont2++;
        }
    }
    //echo "SELECT idcaixa, nome_user as usuario, pagamento_id, saida_id, avulso_id, data_caixa FROM caixa ca JOIN usuario us ON ca.usuario_id = us.idusuario WHERE nome_user LIKE '%".$usuario."%' AND data_caixa BETWEEN '".$data_inicial."' AND '".$data_final."'";
    return $result;
}

function valor_total_caixa($conexao, $data_inicial, $data_final) {
    $result = $conexao->exec("SELECT * FROM caixa WHERE data_caixa");
    return $result;
}

?>
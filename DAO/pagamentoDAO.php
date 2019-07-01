<?php
/**
 * Arquivo responsável por realizar a interação do sistema com a tabela pagamento
 *
 * @author Gustavo Guerra
 */

include 'clienteDAO.php';
include 'valoresDAO.php';
include 'caixaDAO.php';
function ultimo_id_pagamento($conexao){
    try {
        $result = $conexao->query("SELECT * FROM pagamento");
        if ($result) {
            foreach ($result as $key => $row) {
                $id = $row["idpagamento"];
            }
        }
    }catch (PDOException $e) {
        print "Erro!: " . $e->getMessage() . "<br>";
    }
    return $id;
}
function insere_pagamento($conexao, $id_cliente, $id_usuario) {
    $valor = busca_valor_mensalidade($conexao);
    $result = altera_vencimento($conexao, $id_cliente);
    if($result){
        $result1 = $conexao->exec("INSERT INTO pagamento(data_pagamento, valor, usuario_id, cliente_id) VALUES (NOW(), ".$valor.", '{$id_usuario}', '{$id_cliente}')");
        if($result1){
            $id_pgto = ultimo_id_pagamento($conexao);
            $result2 = inserir_caixa_pagamento($conexao, $id_pgto, $id_usuario);
        }else{
            echo "erro nessa budega";
        }
    }
    else{
        echo 'erro neese carai';
    }
return $result2;
}
function lista_pagamentos($conexao, $data_inicial, $data_final, $nome_usuario){
    $result = $conexao->query("SELECT us.nome_user, cli.nome, pag.data_pagamento, pag.valor FROM pagamento pag JOIN usuario us ON pag.usuario_id = us.idusuario JOIN cliente cli ON pag.cliente_id = cli.idcliente WHERE nome_user LIKE '%".$nome_usuario."%'AND data_pagamento BETWEEN '".$data_inicial."' AND '".$data_final."'");
    return $result;
}?>
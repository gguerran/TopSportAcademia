<?php
include './header.php';
include '../DAO/Conexao.php';
?>

<div class="fh5co-parallax2" data-stellar-background-ratio="0.5" style='height: 300px'>
    <div class="overlay"></div>
    <div class="container">
        <div class="fh5co-intro animate-box" style=" padding-top: 70px; text-align: center">
            <div class='col-md-12'>
                <h1 class="text-center">Relatórios Totais</h1>
            </div>
            <div class='col-md-4' style='align-items: center'></div>

        </div>
    </div>
</div><!-- end: fh5co-parallax -->    

<footer id="footer" style="padding-top: 40px">
    <?php
    if (isset($_GET["resposta"])) {
        $resposta = $_GET["resposta"];
        $situacao = $_GET["situacao"];
        echo "<div class='$situacao' role='alert'>
                    <CENTER>
                        $resposta
                    </CENTER>
                </div>";
    }
    ?>
    <?php
    if ($nivel == 1) {
        echo "<div class='container' style='text-align: left; align-items: center;'>
                    <div class='col-md-2'></div>
                    <div class='col-md-8'>
                        <form id='form-login' action='lista_financeira.php' method='post' role='form' name='formPesquisa' style='text-align: center;'>
                            
                            <div class='col-md-12'>
                                <div class='form-group' >
                                    <p style='color:white; text-align: left'>Usuário:</p>
                                    <input type='text' class='form-control' id='nome' placeholder='Nome do usuário responsável' name='nome_usuario'>
                                </div>
                            </div>
                            
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <p style='color:white; text-align: left'>Data Inicial:</p>
                                    <input type='date' class='form-control' id='nome' placeholder='Data Inicial' name='data_inicial'>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='form-group'>
                                    <p style='color:white; text-align: left'>Data Final:</p>
                                    <input type='date' class='form-control' id='nome' placeholder='Data Final' name='data_final'>
                                </div>
                            </div>
                            <div class='col-md-12'>
                                <div class='form-group'>
                                    <button type='submit' class='btn btn-primary'><i class='fa fa-search' aria-hidden='true'></i>&ensp;Buscar</button>
                                </div>
                            </div>
                        </form> 
                        <table class='table' style='color: white; text-align: left;'>
                            <thead>
                                <tr>
                                    <th scope='col' style='text-align:left;'>#</th>
                                    <th scope='col' style='text-align:left;'>Descrição</th>
                                    <th scope='col' style='text-align:left;'>Usuário</th>
                                    <th scope='col' style='text-align:left;'>Data</th>
                                    <th scope='col' style='text-align:left;'>Valor</th>
                                    
                                </tr>
                            </thead>
                            <tbody>";
        try {
            $inicio = "2019-01-01";
            $fim = date('Y-m-d');
            $usuario = "";
            if (isset($_POST["data_inicial"]) && $_POST["data_inicial"] != "") {
                $inicio = $_POST["data_inicial"];
            }
            if (isset($_POST["data_final"]) && $_POST["data_final"] != "") {
                $fim = $_POST["data_final"];
            }
            if (isset($_POST["nome_usuario"]) && $_POST["nome_usuario"] != "") {
                $usuario = $_POST["nome_usuario"];
            }
            include '../DAO/pagamentoDAO.php';
            $result = lista_pagamentos($conexao, $inicio, $fim, $usuario);
            $total = 0;
            if ($result) {
                $cont2 = 1;
                foreach ($result as $key => $row) {
                    $data1 = explode("-", $row['data_pagamento']);
                    list($ano, $mes, $dia) = $data1;
                    $data = "$dia/$mes/$ano";
                    echo "<tr>";
                    echo "<td>" . $cont2 . "</td>";
                    echo "<td> Pag.: " . $row["nome"] . "</td>";
                    echo "<td>" . $row["nome_user"] . "</td>";
                    echo "<td>" . $data . "</td>";
                    echo "<td>" . $row['valor'] . "</td>";
                    echo "</tr>";
                    $total = $total + $row['valor'];
                    $cont2++;
                }
            }
            include '../DAO/avulsoDAO.php';
            $result = lista_avulso($conexao, $inicio, $fim, $usuario);
            if ($result) {
                foreach ($result as $key => $row) {
                    $data1 = explode("-", $row['data_caixa']);
                    list($ano, $mes, $dia) = $data1;
                    $data = "$dia/$mes/$ano";
                    echo "<tr>";
                    echo "<td>" . $cont2 . "</td>";
                    echo "<td>Avulso</td>";
                    echo "<td>" . $row["nome_user"] . "</td>";
                    echo "<td>" . $data . "</td>";
                    echo "<td>" . $row['valor'] . "</td>";
                    echo "</tr>";
                    $total = $total + $row['valor'];
                    $cont2++;
                }
            }
            include '../DAO/saidaDAO.php';
            $result = lista_saida_datas($conexao, $inicio, $fim, $usuario);
            if ($result) {
                foreach ($result as $key => $row) {
                    $data1 = explode("-", $row['data_saida']);
                    list($ano, $mes, $dia) = $data1;
                    $data = "$dia/$mes/$ano";
                    echo "<tr>";
                    echo "<td>" . $cont2 . "</td>";
                    echo "<td>". $row["descricao"]."</td>";
                    echo "<td>".$row["nome_user"]."</td>";
                    echo "<td>" . $data . "</td>";
                    echo "<td style='color: red'>" . $row['valor'] . "</td>";
                    echo "</tr>";
                    $total = $total - $row['valor'];
                    $cont2++;
                }
            }
            
        } catch (PDOException $e) {
            print "Erro!: " . $e->getMessage() . "<br>";
        }
        
            
        

        echo "
            <tr>
                <th colspan=4> Total </th>
                
                <th> " . $total . "
            </tr>
            </tbody>
        </table>
        </div>
                    </div> ";
    } else {
        echo "<div class='container' style='text-align: center;'>
                    <h1 style='color: red;'> Você não tem autorização para acessar essa página!!! </h1>
        ";
    }
    ?>


    <?php include './footer.php'; ?>


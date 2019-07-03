<?php
include './header.php';
include '../DAO/Conexao.php';
include '../DAO/avulsoDAO.php';
include '../DAO/valoresDAO.php';
?>

<div class="fh5co-parallax2" data-stellar-background-ratio="0.5" style='height: 300px'>
    <div class="overlay"></div>
    <div class="container">
        <div class="fh5co-intro animate-box" style=" padding-top: 70px; text-align: center">
            <div class='col-md-12'>
                <h1 class="text-center">Lista de Avulsos</h1>
                <p>Valor avulso: R$ <?php echo busca_valor_avulso($conexao)?>,00 </p>
                <span><a class="btn btn-primary text-center" id='btn_modal' style="text-align: center"><i class="fa fa-cog" aria-hidden="true"></i>&ensp;Alterar Valor de Avulsos</a></span>
            </div>
            <div class='col-md-4' style='align-items: center'></div>

        </div>
    </div>
</div><!-- end: fh5co-parallax -->

<div class='modal fade' id='modal_saida' role='dialog'>
    <div class='modal-dialog' style='width: 500px;'>

        <!-- Modal content-->
        <div class='modal-content'>
            <div class='modal-header' style='padding:5px 20px; background-color:#222831; ' >
                <h2 style='font-size: 20px'>Adicionar Saída</h2>
            </div>
            <div class="modal-body" style=" height: 170px">
                <form id='form-login' action='../controler/altera_avulso.php' method='post' role='form' name='formPesquisa' style='text-align: center;'>

                    <div class='col-md-6'>
                        <!--<div class='form-group'>-->
                        <p>Valor antigo: R$ <?php echo busca_valor_avulso($conexao)?>,00</p> 
                            <br>
                        
                    </div>
                    <div class='col-md-6' >
                        
                        <input type='number' class='form-control' id='nome' placeholder='Novo valor' name='valor'>
                             <br>
                        <!--</div>-->
                    </div>
                    <div class='col-md-12' style="text-align: center; padding: 10px; ">
                            <button type='submit' class='btn btn-primary' style="background-color:#2fa304"><i class='fa fa-check' aria-hidden='true'></i>&ensp; Confirmar</button>                            
                            &nbsp;&nbsp;&nbsp;
                            <a style='bacground-color:#fc0f02;'type='submit'class='btn btn-danger btn-primary' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> Cancelar</a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>    
</div> 
<script>
    $(document).ready(function () {
        $('#btn_modal').click(function () {
            $('#modal_saida').modal();
        });
    });
</script>


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
                        <form id='form-login' action='lista_avulso.php' method='post' role='form' name='formPesquisa' style='text-align: center;'>
                            
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
            $result = lista_avulso($conexao, $inicio, $fim, $usuario);
            $total = 0;
            if ($result) {
                $cont2 = 1;
                foreach ($result as $key => $row) {
                    $data1 = explode("-", $row['data_caixa']);
                    list($ano, $mes, $dia) = $data1;
                    $data = "$dia/$mes/$ano";
                    echo "<tr>";
                    echo "<td>" . $cont2 . "</td>";
                    echo "<td>" . $row['nome_user'] . "</td>";
                    echo "<td>" . $data . "</td>";
                    echo "<td>" . $row['valor'] . "</td>";
                    echo "</tr>";
                    $total = $total + $row['valor'];
                    $cont2++;
                }
            }
        } catch (PDOException $e) {
            print "Erro!: " . $e->getMessage() . "<br>";
        }

        echo "
            <tr>
                <th colspan=3> Total </th>
                
                <th> ".$total."
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


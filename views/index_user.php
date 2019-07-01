<?php
require_once '../DAO/Conexao.php';
require_once '../DAO/clienteDAO.php';
include './header.php';
include '../DAO/valoresDAO.php';
$nome = $_SESSION["nome"];
$id_usuario = $_SESSION["idusuario"]
?>

<div class="fh5co-parallax" style="background-image: url(./images/home-image.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                <div class="fh5co-intro fh5co-table-cell animate-box">
                    <h1 class="text-center">Bem vindo <?php echo $nome ?></h1> <br> <br>
                    <p>Valor avulso: R$ <?php echo busca_valor_avulso($conexao) ?>,00 </p>
                    <span><a id='myBtn1' class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Adicionar Avulso</a></span>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class='modal fade' id='myModal' role='dialog'>
            <div class='modal-dialog' style='width: 300px;'>

                <!-- Modal content-->
                <div class='modal-content'>
                    <div class='modal-header' style='padding:5px 20px; background-color:#222831; ' >
                        <h2 style='font-size: 20px'><i class='fa fa-check' aria-hidden='true' style='color:#2fa304'></i><br> Confirmar Adicionar Avulso?</h2>
                    </div>
                    <div class='modal-footer' style='padding:30px 50px;'>
                        <div>
                            <a class='btn btn-confirm btn-default pull-left' href="../controler/avulso.php?id_usuario=<?php echo $id_usuario ?>" style='background-color:#2fa304; color:white;'><i class='fa fa-check' aria-hidden='true'></i> Sim</a>
                        </div>
                        <div>
                            <button style='bacground-color:#fc0f02;'type='submit'class='btn btn-danger btn-default' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> Não</button>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $('#myBtn1').click(function () {
                            $('#myModal').modal();
                        });
                    });
                </script>"
            </div>
        </div>   
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
    <div class="container" style="text-align: center;">
        <form id="form-login" action="index_user.php" method="post" role="form" name="formPesquisa" style="text-align: center;">
            <div class="col-md-2">
                &nbsp;
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="nome" placeholder="Digite aqui" name="pesquisa">
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>&ensp;Buscar</button>
                </div>
            </div>
        </form> 
        <br><br><br>
        <h1 style="color: #ffffff;"> Lista de clientes próximos a vencer </h1>
        <table class="table" style="color: white; text-align: left;">
            <thead>
                <tr style="text-align: center;">
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data - Vencimento</th>
                    <th scope="col">Pagar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $pesquisa = "";
                    if (isset($_POST["pesquisa"])) {
                        $pesquisa = $_POST["pesquisa"];
                    }
                    $result = pesquisa_vencimento($conexao, $pesquisa);
                    if ($result) {
                        $cont2 = 1;
                        foreach ($result as $key => $row) {
                            $id = $row["idcliente"];
                            $data1 = explode("-", $row['data_vencimento']);
                            list($ano, $mes, $dia) = $data1;
                            $data = "$dia/$mes/$ano";
                            echo "<tr>";
                            echo "<td>$cont2</td>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $data. "</td>";
                            echo "<td>";
                            echo "<a href='../controler/altera_situacao.php?id_usuario=$id_usuario&id_cliente=$id' class='btn btn-danger stretched-link'>Pagar</a>";
                            echo "</td>";
                            echo "</tr>";
                            $cont2++;
                        }
                    }
                } catch (PDOException $e) {
                    print "Erro!: " . $e->getMessage() . "<br>";
                }
                ?>
            </tbody>
        </table>
        <?php
        include './footer.php';
        ?>

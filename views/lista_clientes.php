<?php
include './header.php';
include '../DAO/Conexao.php';
include '../DAO/ClienteDAO.php';
?>

<div class="fh5co-parallax2" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="fh5co-intro animate-box" style=" padding-top: 70px">
                <h1 class="text-center">Lista de Clientes</h1><br> <br>
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
    <?php
    echo "<div class='container' style='text-align: left; align-items: center;'>
        <div class='col-md-2'></div>
                    <div class='col-md-8'>
                    <form id='form-login' action='lista_clientes.php' method='post' role='form' name='formPesquisa' style='text-align: center;'>
                <div class='col-md-2'>
                &nbsp;
            </div>
            <div class='col-md-6'>
                <div class='form-group'>
                    <input type='text' class='form-control' id='nome' placeholder='Digite aqui' name='pesquisa'>
                </div>
            </div>
            <div class='col-md-1'>
                <div class='form-group'>
                    <button type='submit' class='btn btn-primary'><i class='fa fa-search' aria-hidden='true'></i>&ensp;Buscar</button>
                </div>
            </div>
        </form> 
                        <table class='table' style='color: white; text-align: left;'>
                <thead>
                <tr>
                    <th scope='col' style='text-align:left;'>#</th>
                    <th scope='col' style='text-align:left;'>Nome</th>
                    <th scope='col' colspan = '3' style='text-align:center;'>Opções</th>
                </tr>
            </thead>
            <tbody>";
    try {
        $pesquisa = "";
        if(isset($_POST["pesquisa"])){
            $pesquisa = $_POST["pesquisa"];
        }
        $result = pesquisa_cliente($conexao, $pesquisa);
        if ($result) {
            $cont2 = 1;
            foreach ($result as $key => $row) {
                $id_client = $row["idcliente"];
                if ($row["atividade"] != 0) {
                    echo "<tr>";
                    echo "<td>" . $cont2 . "</td>";
                    echo "<td>" . $row['nome'] . "</td>";
                    echo "<td>";
                    echo "<a id='myBtn" . $id_client . "'><i class='fa fa-user-times' aria-hidden='true'></i>&nbsp; Excluir</button>"
                    . "</td><td>";
                    echo "<a href='form_altera_cliente.php?id_cliente=$id_client'><i class='fa fa-cog'></i>&nbsp; Editar</a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='exibe_cliente.php?id_cliente=$id_client'><i class='fa fa-eye' aria-hidden='true'></i>&nbsp; Visualizar</button>"
                    . "</td>";
                    echo "</tr>";
                    $cont2++;
                    echo "<!-- Modal -->
                            <div class='modal fade' id='myModal" . $id_client . "' role='dialog'>
                                <div class='modal-dialog' style='width: 300px;'>
    
                                    <!-- Modal content-->
                                    <div class='modal-content'>
                                        <div class='modal-header' style='padding:5px 20px; background-color:#222831; ' >
                                            <h2 style='font-size: 20px'><i class='fa fa-exclamation-triangle' aria-hidden='true' style='color:yellow'></i><br> Deseja realmente excluir este cliente?</h2>
                                        </div>
                                        <div class='modal-footer' style='padding:30px 50px;'>
                                            <div>
                                                <a class='btn btn-confirm btn-default pull-left' href='../controler/excluir_cliente.php?id_cliente=" . $id_client . "' style='background-color:#2fa304; color:white;'><i class='fa fa-check' aria-hidden='true'></i> Sim</a>
                                            </div>
                                            <div>
                                                <button style='bacground-color:#fc0f02;'type='submit'class='btn btn-danger btn-default' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> Não</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div> 
                        <script>
                            $(document).ready(function(){
                                $('#myBtn" . $id_client . "').click(function(){
                                    $('#myModal" . $id_client . "').modal();
                                });
                            });
                        </script>";
                }
            }
        }
    } catch (PDOException $e) {
        print "Erro!: " . $e->getMessage() . "<br>";
    }

    echo "
            </tbody>
        </table>
        </div>
                    </div> ";
    ?>


    <?php include './footer.php'; ?>


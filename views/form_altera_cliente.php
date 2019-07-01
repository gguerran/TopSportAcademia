<?php include './header.php'; ?>
<?php
include_once '../DAO/clienteDAO.php';
$cliente = monta_cliente($conexao, $_GET["id_cliente"]);
?>
<div class="fh5co-parallax2" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="fh5co-intro animate-box" style=" padding-top: 70px">
                <h1 class="text-center">Alterar Dados Pessoais</h1><br> <br>
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

    <div class='container' style='text-align: center; align-items: center;'>
        <div class='col-md-1'></div>
        <div class='col-md-10'>
            <form id='form-login' action='../controler/altera_cliente.php' method='post' role='form' name='form_atera_cliente' class='contact-form'>
                <div class='col-md-2'><p style='text-align: left; color: white;'>Nome:</p></div>
                <div class='form-group col-md-10'>
                    <input type='text' class='form-control' id='nome' placeholder='Nome' required='' name='nome' value='<?php echo $cliente->nome ?>'>
                </div>
                <div class='col-md-2'><p style='text-align: left;color:white;'>Telefone:</p></div>
                <div class='form-group col-md-10'>
                    <input type='text' class='form-control' id='telefone' placeholder='Telefone' required='' name='telefone' value='<?php echo $cliente->telefone ?>'>
                </div>
                <div class='col-md-2'><p style='text-align: left; color:white;'>E-mail:</p></div>
                <div class='form-group col-md-10'>
                    <input type='text' class='form-control' id='email' placeholder='E-mail' required='' name='email' value='<?php echo $cliente->email ?>'>
                </div>
                <div class='col-md-2'><p style='text-align: left;  color:white'>Objetivo:</p></div>
                <div class='form-group col-md-10'>
                    <select name='objetivo' class='form-control' style='text-align=left !important;'>
                        <option value='hipertrofia'>Hipertrofia</option>
                        <option value='emagrecimento'>Emagrecimento</option>
                        <option value='definicao'>Definição</option>
                    </select>
                </div>
        </div>
        <div class='form-group col-md-12'>
            <input type='hidden' id='id_cliente' name='id_cliente' value="<?php echo $_GET["id_cliente"]; ?>">
            <br>
        </div>
        <div class='col-md-12'>
            <div class='form-group'>
                <button type='submit' class='btn btn-primary'><i class='fa fa-check' aria-hidden='true'></i>&ensp;Alterar</button>
            </div>
        </div>
        </form>
    </div> 
    <?php include './footer.php'; ?>
<?php include 'header.php'; ?>
<div class="fh5co-parallax2" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="fh5co-intro animate-box" style=" padding-top: 70px">
                <h1 class="text-center">Adição de medidas</h1><br> <br>
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
            <form id='form-login' action='../controler/adiciona_medidas.php' method='post' role='form' name='formLogin' class='contact-form'>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Altura:</p>
                    <input type='number' class='form-control' id='altura' placeholder='Altura' required='' name='altura'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Peso:</p>
                    <input type='number' class='form-control' id='peso' placeholder='Peso' required='' name='peso'>
                </div>
                <div class='form-group col-md-2'>
                    <p style='color:white; text-align: left'>Peito:</p>
                    <input type='number' class='form-control' id='peito' placeholder='Peito' required='' name='peito'>
                </div>
                <div class='form-group col-md-2'>
                    <p style='color:white; text-align: left'>Tórax:</p>
                    <input type='number' class='form-control' id='torax' placeholder='Tórax' required='' name='torax'>
                </div>
                <div class='form-group col-md-2'>
                    <p style='color:white; text-align: left'>Quadril:</p>
                    <input type='number' class='form-control' id='quadril' placeholder='Quadril' required='' name='quadril'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Braço Direito:</p>
                    <input type='number' class='form-control' id='braco' placeholder='Braço Direito' required='' name='braco_direito'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Braço Esquerdo:</p>
                    <input type='number' class='form-control' id='braco' placeholder='Braço Esquerdo' required='' name='braco_esquerdo'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Antebraço Direito:</p>
                    <input type='number' class='form-control' id='antebraco' placeholder='Anteraço Direito' required='' name='antebraco_direito'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Antebraço Esquerdo:</p>
                    <input type='number' class='form-control' id='antebraco' placeholder='Anteraço Esquerdo' required='' name='antebraco_esquerdo'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Pulso Direito:</p>
                    <input type='number' class='form-control' id='pulso' placeholder='Pulso Direito' required='' name='pulso_direito'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Pulso Esquerdo:</p>
                    <input type='number' class='form-control' id='pulso' placeholder='Pulso Esquerdo' required='' name='pulso_esquerdo'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Coxa Direita:</p>
                    <input type='number' class='form-control' id='coxa' placeholder='Coxa Direita' required='' name='coxa_direita'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Coxa Esquerda:</p>
                    <input type='number' class='form-control' id='coxa' placeholder='Coxa Esquerda' required='' name='coxa_esquerda'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Panturrilha Direita:</p>
                    <input type='number' class='form-control' id='panturrilha' placeholder='Panturrilha Direita' required='' name='panturrilha_direita'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Panturrilha Esquerda:</p>
                    <input type='number' class='form-control' id='panturrilha' placeholder='Panturrilha Esquerda' required='' name='panturrilha_esquerda'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Tornozelo Direito:</p>
                    <input type='number' class='form-control' id='tornozelo' placeholder='Tornozelo Direito' required='' name='tornozelo_direito'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Tornozelo Esquerdo:</p>
                    <input type='number' class='form-control' id='tornozelo' placeholder='Tornozelo Esquerdo' required='' name='tornozelo_esquerdo'>
                </div>
                <input type='hidden' name="idcliente" value='<?php echo $_GET["id_cliente"];?>'>
                <div class='form-group col-md-12'>&nbsp;</div><div class='form-group col-md-12'>
                    <button type='submit' class='btn btn-primary'><i class='fa fa-plus' aria-hidden='true'></i>&ensp;Adicionar Medidas</button>
                </div>
            </form>
        </div> </div>
    <?php include 'footer.php'; ?>



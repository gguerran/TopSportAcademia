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
                <div class='form-group col-md-4'>
                    <p style='color:white; text-align: left'>Altura:</p>
                    <input type='number' class='form-control' id='altura' placeholder='Altura' required='' name='altura'>
                </div>
                <div class='form-group col-md-4'>
                    <p style='color:white; text-align: left'>Peso:</p>
                    <input type='number' class='form-control' id='peso' placeholder='Peso' required='' name='peso'>
                </div>
                <div class='form-group col-md-4'>
                    <p style='color:white; text-align: left'>Braço:</p>
                    <input type='number' class='form-control' id='braco' placeholder='Braço' required='' name='braco'>
                </div>
                <div class='form-group col-md-4'>
                    <p style='color:white; text-align: left'>Antebraço:</p>
                    <input type='number' class='form-control' id='antebraco' placeholder='Anteraço' required='' name='antebraco'>
                </div>
                <div class='form-group col-md-4'>
                    <p style='color:white; text-align: left'>Pulso:</p>
                    <input type='number' class='form-control' id='pulso' placeholder='Pulso' required='' name='pulso'>
                </div>
                <div class='form-group col-md-4'>
                    <p style='color:white; text-align: left'>Peito:</p>
                    <input type='number' class='form-control' id='peito' placeholder='Peito' required='' name='peito'>
                </div>
                <div class='form-group col-md-4'>
                    <p style='color:white; text-align: left'>Tórax:</p>
                    <input type='number' class='form-control' id='torax' placeholder='Tórax' required='' name='torax'>
                </div>
                <div class='form-group col-md-4'>
                    <p style='color:white; text-align: left'>Quadril:</p>
                    <input type='number' class='form-control' id='quadril' placeholder='Quadril' required='' name='quadril'>
                </div>

                <div class='form-group col-md-4'>
                    <p style='color:white; text-align: left'>Coxa:</p>
                    <input type='number' class='form-control' id='coxa' placeholder='Coxa' required='' name='coxa'>
                </div>
                <div class='col-md-4'></div>
                <div class='form-group col-md-4'>
                    <p style='color:white; text-align: left'>Panturrilha:</p>
                    <input type='number' class='form-control' id='panturrilha' placeholder='Panturrilha' required='' name='panturrilha'>
                </div>
                <input type='hidden' name="idcliente" value='<?php echo $_GET["id_cliente"];?>'>
                <div class='form-group col-md-12'>&nbsp;</div><div class='form-group col-md-12'>
                    <button type='submit' class='btn btn-primary'><i class='fa fa-plus' aria-hidden='true'></i>&ensp;Adicionar Medidas</button>
                </div>
            </form>
        </div> </div>
    <?php include 'footer.php'; ?>



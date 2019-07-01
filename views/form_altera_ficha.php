<?php include './header.php'; ?>
<?php include_once '../DAO/fichaDAO.php';
    $ficha = monta_ficha($conexao, $_GET["id_ficha"]);
?>
<div class="fh5co-parallax2" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="fh5co-intro animate-box" style=" padding-top: 70px">
                <h1 class="text-center">Alterar Ficha</h1><br> <br>
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
            <form id='form-login' action='../controler/altera_ficha.php' method='post' role='form' name='formLogin' class='contact-form'>
                <div class='col-md-2'><p style='text-align: left; color: white;'>Segunda:</p></div>
                <div class='form-group col-md-10'>
                    <input type='text' class='form-control' id='segunda' placeholder='Exercícios' required='' name='segunda' value='<?php echo $ficha->segunda?>'>
                </div>
                <div class='col-md-2'><p style='text-align: left;color:white;'>Terça:</p></div>
                <div class='form-group col-md-10'>
                    <input type='text' class='form-control' id='terca' placeholder='Exercícios' required='' name='terca' value='<?php echo $ficha->terca?>'>
                </div>
                <div class='col-md-2'><p style='text-align: left; color:white;'>Quarta:</p></div>
                <div class='form-group col-md-10'>
                    <input type='text' class='form-control' id='quarta' placeholder='Exercícios' required='' name='quarta' value='<?php echo $ficha->quarta?>'>
                </div>
                <div class='col-md-2'><p style='text-align: left; color:white;'>Quinta:</p></div>
                <div class='form-group col-md-10'>
                    <input type='text' class='form-control' id='quinta' placeholder='Exercícios' required='' name='quinta' value='<?php echo $ficha->quinta?>'>
                </div>
                <div class='col-md-2'><p style='text-align: left; color:white;'>Sexta:</p></div>
                <div class='form-group col-md-10'>
                    <input type='text' class='form-control' id='sexta' placeholder='Exercícios' required='' name='sexta' value='<?php echo $ficha->sexta?>'>
                </div>
                <input type="hidden" name="id_ficha" value="<?php echo $ficha->idficha;?>">
                <input type="hidden" name="id_cliente" value="<?php echo $_GET["id_cliente"];?>">
                <div class='col-md-12'>
                    <div class='form-group'>
                        <button type='submit' class='btn btn-primary'><i class='fa fa-check' aria-hidden='true'></i>&ensp;Alterar</button>
                    </div>
                </div>
            </form>
        </div> </div>
    <?php include './footer.php'; ?>




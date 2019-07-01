<?php include_once './header.php'; ?>
<div class="fh5co-parallax2" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">

            <div class="fh5co-intro animate-box" style=" padding-top: 70px">
                <h1 class="text-center">Cadastro de Clientes</h1><br> <br>
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
    <?php echo "
    <div class='container' style='text-align: center; align-items: center;'>
        <div class='col-md-1'></div>
        <div class='col-md-10'>
            <form id='form-login' action='../controler/cadastra_cliente.php?user_id=" . $_SESSION["idusuario"] . "' method='post' role='form' name='formLogin' class='contact-form'>
                <div class='form-group col-md-12'>
                    <p style='color:white; text-align: left'>Nome:</p>
                    <input type='text' class='form-control' id='nome' placeholder='Nome' required='' name='nome'>
                </div>

                <div class='form-group col-md-4'>
                    <p style='color:white; text-align: left'>Telefone:</p>
                    <input type='text' class='form-control' id='telefone' placeholder='Telefone' required='' name='telefone'>
                </div>
                <div class='form-group col-md-4'>
                    <p style='color:white; text-align: left'>Data de Nascimento:</p>
                    <input type='date' class='form-control' id='idade' placeholder='Data de nascimento' required='' name='data_nascimento'>
                </div>
                <div class='form-group col-md-4'>
                    <p style='color:white; text-align: left'>Data de Vencimento:</p>
                    <input type='date' class='form-control' id='venc' placeholder='Data de Vencimento' required='' name='data_vencimento'>
                </div>
                <div class='form-group col-md-8'>
                   <p style='color:white; text-align: left'>E-mail:</p>
                    <input type='email' class='form-control' id='email' placeholder='E-mail' required='' name='email'>
                </div>
                
                <div class='form-group col-md-4' style='text-align: left'>
                <p style='color:white'>Objetivo:</p>
                    <select name='objetivo' class='form-control' style='text-align=center !important;'>
                        <option value='Hipertrofia'>Hipertrofia</option>
                        <option value='Emagrecimento'>Emagrecimento</option>
                        <option value='Definicao'>Definição</option>
                    </select>
                </div>
                <div class='col-md-12'>
                    <hr>
                    <h2 style='color:white'>Medidas</h2>
                    <hr>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Altura:</p>
                    <input type='number' class='form-control' id='altura' placeholder='Altura' required='' name='altura'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Peso:</p>
                    <input type='number' class='form-control' id='peso' placeholder='Peso' required='' name='peso'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Braço:</p>
                    <input type='number' class='form-control' id='braco' placeholder='Braço' required='' name='braco'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Antebraço:</p>
                    <input type='number' class='form-control' id='antebraco' placeholder='Anteraço' required='' name='antebraco'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Pulso:</p>
                    <input type='number' class='form-control' id='pulso' placeholder='Pulso' required='' name='pulso'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Peito:</p>
                    <input type='number' class='form-control' id='peito' placeholder='Peito' required='' name='peito'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Tórax:</p>
                    <input type='number' class='form-control' id='torax' placeholder='Tórax' required='' name='torax'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Quadril:</p>
                    <input type='number' class='form-control' id='quadril' placeholder='Quadril' required='' name='quadril'>
                </div>
                <div class='col-md-3'></div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Coxa:</p>
                    <input type='number' class='form-control' id='coxa' placeholder='Coxa' required='' name='coxa'>
                </div>
                <div class='form-group col-md-3'>
                    <p style='color:white; text-align: left'>Panturrilha:</p>
                    <input type='number' class='form-control' id='panturrilha' placeholder='Panturrilha' required='' name='panturrilha'>
                </div>
                <div class='col-md-12'>
                    <hr>
                    <h2 style='color:white'>Ficha de Exercícios</h2>
                    <hr>
                </div>
                <div class='col-md-2'><p style='text-align: left; color: white;'>Segunda:</p></div>
                <div class='form-group col-md-10'>
                    <input type='text' class='form-control' id='segunda' placeholder='Exercícios' required='' name='segunda'>
                </div>
                <div class='col-md-2'><p style='text-align: left;color:white;'>Terça:</p></div>
                <div class='form-group col-md-10'>
                    <input type='text' class='form-control' id='terca' placeholder='Exercícios' required='' name='terca'>
                </div>
                <div class='col-md-2'><p style='text-align: left; color:white;'>Quarta:</p></div>
                <div class='form-group col-md-10'>
                    <input type='text' class='form-control' id='quarta' placeholder='Exercícios' required='' name='quarta'>
                </div>
                <div class='col-md-2'><p style='text-align: left; color:white;'>Quinta:</p></div>
                <div class='form-group col-md-10'>
                    <input type='text' class='form-control' id='quinta' placeholder='Exercícios' required='' name='quinta'>
                </div>
                <div class='col-md-2'><p style='text-align: left; color:white;'>Sexta:</p></div>
                <div class='form-group col-md-10'>
                    <input type='text' class='form-control' id='sexta' placeholder='Exercícios' required='' name='sexta'>
                </div>
                <div class='col-md-2'><p style='text-align: left; color:white;'>Sábado:</p></div>
                <div class='form-group col-md-10'>
                    <input type='text' class='form-control' id='sabado' placeholder='Exercícios' required='' name='sabado'>
                </div>
                <div class='col-md-12'>
                    <div class='form-group'>
                        <button type='submit' class='btn btn-primary'><i class='fa fa-check' aria-hidden='true'></i>&ensp;Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>"; ?>
    <?php include './footer.php'; ?>


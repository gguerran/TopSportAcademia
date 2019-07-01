<?php include './header.php'; ?>
<div class="fh5co-parallax2" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            
            <div class="fh5co-intro animate-box" style=" padding-top: 70px">
                    <h1 class="text-center">Cadastro de Usuário</h1><br> <br>
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
        if($nivel == 1){
            echo "<div class='container' style='text-align: center; align-items: center;'>
                    <div class='col-md-3'></div>
                    <div class='col-md-6'>
                        <form id='form-login' action='../controler/cadastra_usuario.php' method='post' role='form' name='formLogin' class='contact-form'>
                            <div class='form-group'>
                                <input type='text' class='form-control' id='nome' placeholder='Nome' required='' name='nome'>
                            </div>
                            <div class='form-group'>
                                <input type='password' class='form-control' id='senha' placeholder='Senha' required='' name='senha'>
                            </div>
                            <div class='form-group'>
                                <p>Nível de Acesso:</p>
                                <br>
                                <select name='nivel' class='form-control' style='text-align=center !important;'>
                                    <option value='gerente'>Gerente</option>
                                    <option value='funcionario'>Funcionário</option>
                                </select>
                            </div>
                            <div class='col-md-6>'
                                <div class='form-group'>
                                    <button type='submit' class='btn btn-primary'><i class='fa fa-check' aria-hidden='true'></i>&ensp;Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
        ";}else{
            echo "<div class='container' style='text-align: center;'>
                    <h1 style='color: red;'> Você não tem autorização para acessar essa página!!! </h1>
        ";
        }
    ?>
<?php include './footer.php'; ?>


<?php
include './header.php';
?>
<div class="fh5co-hero">
    <div class="fh5co-overlay"></div>
    <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(./images/home-image.jpg);">
        <div class="desc animate-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
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
                        <h2>TopSport Academia</h2>      
                        <br>
                        <form id="form-login" action="../controler/Login.php" method="post" role="form" name="formLogin">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nome" placeholder="Nome" required="" name="nome">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="senha" placeholder="Senha" required="" name="senha">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i>&ensp;Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fh5co-blog-section -->
<footer>
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 animate-box">
                    <h3 class="section-title"></h3>
                    <p></p>
                </div>
                <div class="col-md-4 animate-box" style="text-align: center;">
                    <h3 class="section-title" >Contatos:</h3>
                    <ul class="contact-info">
                        <li><i class="icon-map-marker"></i>Rua Fernando Carlos Cavalcante, 25, Centro, Corrente-PI</li>
                        <li><i class="icon-phone"></i>+55 89 9 9935 1122</li>
                        <li><i class="icon-envelope"></i><a href="#">gustavoguerra.gr@gmail.com</a></li>
                        <li><i class="icon-globe2"></i><a href="#">https://github.com/gguerran</a></li>
                    </ul>
                </div>
            </div>
            <?php
            include './footer.php';
            ?>

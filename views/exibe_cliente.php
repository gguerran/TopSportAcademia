<?php include './header.php'; 
 include '../DAO/Conexao.php';
 include '../DAO/ClienteDAO.php';
 include '../DAO/fichaDAO.php';
 include '../DAO/medidasDAO.php';

    $id_cliente = $_GET["id_cliente"];
    $cliente = monta_cliente($conexao, $id_cliente);
    $data1 = new DateTime($cliente->data_nascimento);
    $data2 = new DateTime;
    $intervalo = $data1->diff($data2);
    $idade =  $intervalo->format('%y');
    $ficha = monta_ficha($conexao, $cliente->ficha_id);
    /*$medidas = monta_medidas($conexao, $cliente->idcliente);/*
    */?>
<div class="fh5co-parallax2" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            
            <div class="fh5co-intro animate-box" style=" padding-top: 70px">
                    <h1 class="text-center">Informações do Cliente</h1><br> <br>
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
    <?php echo"
    <div class='container' style='text-align: center; align-items: center;'>
        <div class='col-md-12' style='text-align: left'>
            <hr>
            <h1 style='color: white; text-align:center;'>Informações Pessoais</h1>
            <hr>
            <h3 style='color: white'>Nome: $cliente->nome</h3>
            <h3 style='color: white'>Idade: $idade anos</h3>
            <h3 style='color: white'>Telefone: $cliente->telefone</h3>
            <h3 style='color: white'>E-mail: $cliente->email</h3>
            <h3 style='color: white'>Objetivo: $cliente->objetivo</h3>
            <div class='col-md-12'>&nbsp;</div>
            <div class='col-md-12' style='text-align:center'>
                <a class='btn btn-primary' href='form_altera_cliente.php?id_cliente=".$cliente->idcliente."'>
                    <i class='fa fa-plus' aria-hidden='true'></i>&ensp;Alterar Dados Pessoais
                </a>
            </div>
            <div class='col-md-12'>
                <br>
            </div>
            
            <div class='col-md-12'>
                <hr>
                <h1 style='color: white'>Medidas</h1>
                <hr>
            </div>
    ";
            try {
                $result = lista_medidas($conexao, $cliente->idcliente);
                if ($result) {
                    $cont2 = 1;
                        foreach ($result as $key => $row) {
                            $data = explode("-", $row['data_medicao']);
                            list($ano, $mes, $dia) = $data;
                            $dia = explode(" " , $dia);
                            list($dia, $hora) = $dia;
                            $data = "$dia/$mes/$ano";
                            echo 
            "
            <div clas='col-md-12'>
                <br>
                <h2 style='color:white; text-align:center;'>&nbsp;".$data."</h2>
                <hr>
            </div>
            <div class='col-md-3'>
                <h3 style='color:white; font-size:22px; text-align:left'>Altura: ".$row['altura']." cm</h3>
            </div>
            <div class='col-md-3'>
                <h3 style='color:white; font-size:22px; text-align:left'>Peso: ".$row['peso']." Kg</h3>
            </div>
            <div class='col-md-2'>
                <h3 style='color:white; font-size:22px; text-align:left'>Peito: ".$row['peito']." cm</h3>
            </div>
            <div class='col-md-2'>
                <h3 style='color:white; font-size:22px; text-align:left'>Tórax: ".$row['torax']." cm</h3>
            </div>
            <div class='col-md-2'>
                <h3 style='color:white; font-size:21px; text-align:rigth'>Quadril: ".$row['quadril']." cm</h3>
            </div>
            <div class='col-md-3'>
                <h3 style='color:white; font-size:22px; text-align:left'>Braço Dir.: ".$row['braco_direito']." cm</h3>
            </div>
            <div class='col-md-3'>
                <h3 style='color:white; font-size:22px; text-align:left'>Braço Esq.: ".$row['braco_esquerdo']." cm</h3>
            </div>
            <div class='col-md-3'>
                <h3 style='color:white; font-size:22px; text-align:left'>Antebraço Dir.: ".$row['antebraco_direito']." cm</h3>
            </div>
            <div class='col-md-3'>
                <h3 style='color:white; font-size:22px; text-align:right'>Antebraço Esq.: ".$row['antebraco_esquerdo']." cm</h3>
            </div>
            <div class='col-md-3'>
                <h3 style='color:white; font-size:22px; text-align:left'>Pulso Dir.: ".$row['pulso_direito']." cm</h3>
            </div>
            <div class='col-md-3'>
                <h3 style='color:white; font-size:22px; text-align:left'>Pulso Esq.: ".$row['pulso_esquerdo']." cm</h3>
            </div>
            <div class='col-md-3'>
                <h3 style='color:white; font-size:22px; text-align:left'>Coxa Dir.: ".$row['coxa_direita']." cm</h3>
            </div>
            <div class='col-md-3'>
                <h3 style='color:white; font-size:22px; text-align:right'>Coxa Esq.: ".$row['coxa_esquerda']." cm</h3>
            </div>
            <div class='col-md-3'>
                <h3 style='color:white; font-size:22px; text-align:left'>Panturrilha Dir.: ".$row['panturrilha_direita']." cm</h3>
            </div>
            <div class='col-md-3'>
                <h3 style='color:white; font-size:22px; text-align:left'>Panturrilha Esq.: ".$row['panturrilha_esquerda']." cm</h3>
            </div>
            <div class='col-md-3'>
                <h3 style='color:white; font-size:22px; text-align:left'>Tornozelo Dir.: ".$row['tornozelo_direito']." cm</h3>
            </div>
            <div class='col-md-3'>
                <h3 style='color:white; font-size:22px; text-align:right'>Tornozelo Esq.: ".$row['tornozelo_esquerdo']." cm</h3>
            </div>
            <br>
            
            <div class='col-md-12'><hr></div>
            
            
            ";
                        }
                }
            } catch (PDOException $e) {
                print "Erro!: " . $e->getMessage() . "<br>";
            }
            echo "
            <center>
                <a class='btn btn-primary' style='text-align:center;' href='form_adc_medidas.php?id_cliente=".$cliente->idcliente."'><i class='fa fa-plus' aria-hidden='true'></i>&ensp;Adicionar Medidas</a>
            </center>
            
            <div class='col-md-12'><hr>
                <h1 style='color: white; text-align:center;'>Ficha de exercícios</h1>
                <hr>
            </div>
            <div class='row animate-box'>
		<div class='col-md-12 text-center'>
                    <ul class='schedule'>
			<li><a href='#' class='active' data-sched='segunda' style='color: white'>Segunda</a></li>
			<li><a href='#' data-sched='terca' style='color: white'>Terça</a></li>
			<li><a href='#' data-sched='quarta' style='color: white'>Quarta</a></li>
			<li><a href='#' data-sched='quinta' style='color: white'>Quinta</a></li>
			<li><a href='#' data-sched='sexta' style='color: white'>Sexta</a></li>
                    </ul>
		</div>
		<div class='row text-center'>
                    <div class='col-md-12 schedule-container'>
			<div class='schedule-content active' data-day='segunda'>
                            <div class='col-md-3'></div>
                            <div class='col-md-6 col-sm-12'>
                                <div class='program program-schedule'>
                                    <img src='images/fit-dumbell.svg' alt='Cycling'>
                                    <h3>$ficha->segunda</h3>
                                </div>
                            </div>
                        </div>
                        <div class='schedule-content' data-day='terca'>
                            <div class='col-md-3'></div>
                            <div class='col-md-6 col-sm-12'>
                                <div class='program program-schedule'>
                                    <img src='images/fit-dumbell.svg' alt='Cycling'>
                                    <h3>$ficha->terca</h3>
                                </div>
                            </div>	
                        </div>
                        <div class='schedule-content' data-day='quarta'>
                            <div class='col-md-3'></div>
                            <div class='col-md-6 col-sm-12'>
                                <div class='program program-schedule'>
                                    <img src='images/fit-dumbell.svg' alt='Cycling'>
                                    <h3>$ficha->quarta</h3>
                                </div>
                            </div>
                        </div>
			<div class='schedule-content' data-day='quinta'>
                            <div class='col-md-3'></div>
                            <div class='col-md-6 col-sm-12'>
				<div class='program program-schedule'>
                                    <img src='images/fit-dumbell.svg' alt='Cycling'>
                                    <h3>$ficha->quinta</h3>
				</div>
                            </div>
			</div>
                        <div class='schedule-content' data-day='sexta'>
                            <div class='col-md-3'></div>
                            <div class='col-md-6 col-sm-12'>
				<div class='program program-schedule'>
                                    <img src='images/fit-dumbell.svg' alt='Cycling'>
                                    <h3>$ficha->sexta</h3>
				</div>
                            </div>
			</div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-12'>&nbsp;</div>
            <div class='col-md-12' style='text-align:center'><a class='btn btn-primary' href='form_altera_ficha.php?id_ficha=".$cliente->ficha_id."&id_cliente=".$cliente->idcliente."'><i class='fa fa-cog'></i>&ensp;Alterar Ficha</a></div>
            
        <div class='col-md-2'></div>
        <div class='col-md-12'></div>
    </div>";?>
    
<?php include './footer.php'; ?>
                
                
            
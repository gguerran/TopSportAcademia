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
                <h1 style='color: white'>Informações Pessoais</h1>
            <hr>
            <h3 style='color: white'>Nome: $cliente->nome</h3>
            <h3 style='color: white'>Idade: $idade anos</h3>
            <h3 style='color: white'>Telefone: $cliente->telefone</h3>
            <h3 style='color: white'>E-mail: $cliente->email</h3>
            <h3 style='color: white'>Objetivo: $cliente->objetivo</h3>
            <div class='col-md-12'>&nbsp;</div>
            <div class='col-md-12' style='text-align:center'><a class='btn btn-primary' href='form_altera_cliente.php?id_cliente=".$cliente->idcliente."'><i class='fa fa-plus' aria-hidden='true'></i>&ensp;Alterar Dados Pessoais</a></div>
            <div class='col-md-12'>&nbsp;</div>
            <hr>
                <h1 style='color: white'>Medidas</h1>
            <hr>";
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
            <h2 style='color:white'>".$data."</h2>
            <div class='col-md-4'>
                <h3 style='color:white; font-size:22px'>Altura: ".$row['altura']." cm</h3>
            </div>
            <div class='col-md-4'>
                <h3 style='color:white; font-size:22px'>Peso: ".$row['peso']." Kg</h3>
            </div>
            <div class='col-md-4'>
                <h3 style='color:white; font-size:22px'>Braço: ".$row['braco']." cm</h3>
            </div>
            <div class='col-md-4'>
                <h3 style='color:white; font-size:22px'>Antebraço: ".$row['antebraco']." cm</h3>
            </div>
            <div class='col-md-4'>
                <h3 style='color:white; font-size:22px'>Pulso: ".$row['pulso']." cm</h3>
            </div>
            <div class='col-md-4'>
                <h3 style='color:white; font-size:22px'>Peito: ".$row['peito']." cm</h3>
            </div>
            <div class='col-md-4'>
                <h3 style='color:white; font-size:22px'>Tórax: ".$row['torax']." cm</h3>
            </div>
            <div class='col-md-4'>
                <h3 style='color:white; font-size:22px'>Coxa: ".$row['coxa']." cm</h3>
            </div>
            <div class='col-md-4'>
                <h3 style='color:white; font-size:22px'>Panturrilha: ".$row['panturrilha']." cm</h3>
            </div>
            <hr>
            ";
                        }
                }
            } catch (PDOException $e) {
                print "Erro!: " . $e->getMessage() . "<br>";
            }
            echo "
            
            <div class='col-md-12'>&nbsp;</div>
            <div class='col-md-12' style='text-align:center'><a class='btn btn-primary' href='form_adc_medidas.php?id_cliente=".$cliente->idcliente."'><i class='fa fa-plus' aria-hidden='true'></i>&ensp;Adicionar Medidas</a></div>
            <div class='col-md-12'>&nbsp;</div>
            <div class='col-md-12'><hr></div>
                <h1 style='color: white'>Ficha de exercícios</h1>
            <hr>
            <div class='row animate-box'>
		<div class='col-md-12 text-center'>
                    <ul class='schedule'>
			<li><a href='#' class='active' data-sched='segunda' style='color: white'>Segunda</a></li>
			<li><a href='#' data-sched='terca' style='color: white'>Terça</a></li>
			<li><a href='#' data-sched='quarta' style='color: white'>Quarta</a></li>
			<li><a href='#' data-sched='quinta' style='color: white'>Quinta</a></li>
			<li><a href='#' data-sched='sexta' style='color: white'>Sexta</a></li>
			<li><a href='#' data-sched='sabado' style='color: white'>Sábado</a></li>
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
			<div class='schedule-content' data-day='sabado'>
                            <div class='col-md-3'></div>
                            <div class='col-md-6 col-sm-12'>
                                <div class='program program-schedule'>
                                    <img src='images/fit-dumbell.svg' alt='Cycling'>
                                    <h3>$ficha->sabado</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-12'>&nbsp;</div>
            <div class='col-md-12' style='text-align:center'><a class='btn btn-primary' href='form_altera_ficha.php?id_ficha=".$cliente->ficha_id."&id_cliente=".$cliente->idcliente."'><i class='fa fa-cog'></i>&ensp;Alterar Ficha</a></div>
            <div class='col-md-12'>&nbsp;</div>
            <div class='col-md-12'><hr></div>
        <div class='col-md-2'></div>
        <div class='col-md-12'></div>
    </div>";?>
    
<?php include './footer.php'; ?>
                
                
            
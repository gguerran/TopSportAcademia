<?php require_once '../DAO/Conexao.php'; ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TopSport &mdash; Academia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />
    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Superfish -->
    <link rel="stylesheet" href="css/superfish.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        .modal-header, h4, .close {
            background-color: #5cb85c;
            color:white !important;
            text-align: center;
            font-size: 30px;
        }
        .modal-footer {
            background-color: #f9f9f9;
        }
    </style>
    <script type="text/javascript">
        jQuery(function () {
            jQuery(window).scroll(function () {
                if (jQuery(this).scrollTop() > 300) {
                    $("#fh5co-header-section").css('background-color', 'rgba(67, 80, 104, 1)');
                } else if (jQuery(this).scrollTop() > 200) {
                    $("#fh5co-header-section").css('background-color', 'rgba(67, 80, 104, 0.8)');
                } else if (jQuery(this).scrollTop() > 100) {
                    $("#fh5co-header-section").css('background-color', 'rgba(67, 80, 104, 0.4)');
                } else {
                    $("#fh5co-header-section").css('background-color', 'rgba(67, 80, 104,0)');
                }
            });
        });
    </script>
</head>
<body>

    <?php
    session_start();
    if (isset($_SESSION["idusuario"])) {
        $idusuario = $_SESSION["idusuario"];
        $nome = $_SESSION["nome"];
        $nivel = $_SESSION["nivel"];
    }
    if (!isset($_SESSION["nome"])) {
        echo "
        <div id='fh5co-wrapper'>
            <div id='fh5co-page'>
                <div id='fh5co-header'>
                    <header id='fh5co-header-section' style='position: fixed;  text-align: center;'>
                        <div class='container'>
                            <div class='nav-header'>
                                <a href='#' class='js-fh5co-nav-toggle fh5co-nav-toggle'><i></i></a>
                                <h1 id='fh5co-logo'><a href='../index.php'>Top<span>Sport</span></a></h1>
                            </div>
                        </div>
                    </header>		
                </div>
            </div>
            
        <!-- end:fh5co-header -->";
    } else if ($_SESSION["nivel"] == 1) {
        echo "<div id='fh5co-wrapper'>
            <div id='fh5co-page'>
                <div id='fh5co-header'>
                    <header id='fh5co-header-section' style='position: fixed;'>
                        <div class='container'>
                            <div class='nav-header'>
                                <a href='#' class='js-fh5co-nav-toggle fh5co-nav-toggle'><i></i></a>
                                <h1 id='fh5co-logo'><a href='index_user.php'>Top<span>Sport</span></a></h1>
                                <!-- START #fh5co-menu-wrap -->
                                <nav id='fh5co-menu-wrap' role='navigation'>
                                    <ul class='sf-menu' id='fh5co-primary-menu'>
                                        <li>
                                            <a href='index_user.php'>Início</a>
                                        </li>
                                        <li>
                                            <a class='fh5co-sub-ddown'>Clientes</a>
                                            <ul class='fh5co-sub-menu'>
                                                <li><a href='form_cadastra_clientes.php'>Cadastrar Novo Cliente</a></li>
                                                <li><a href='lista_clientes.php'>Listar Clientes</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class='fh5co-sub-ddown'>Relatórios</a>
                                            <ul class='fh5co-sub-menu'>
                                                <li><a href='lista_saida.php'>Saída</a></li>
                                                <li><a href='lista_avulso.php'>Avulsos</a></li>
                                                <li><a href='lista_pagamento.php'>Pagamentos</a></li>
                                                <li><a href='lista_financeira.php'>Total</a></li>
                                            </ul>
                                            <li>
                                            <a class='fh5co-sub-ddown'>Usuários</a>
                                            <ul class='fh5co-sub-menu'>
                                                <li><a href='form_cadastra_usuario.php'>Cadastrar Novo Usuário</a></li>
                                                <li><a href='lista_usuarios.php'>Listar Usuários</a></li>
                                            </ul>
                                        
                                            <li>
                                            <a href='../controler/Logout.php'>Sair</a>
                                            </li>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </header>		
                </div>
                <!-- end:fh5co-header -->";
    } else {
        echo "<div id='fh5co-wrapper'>
            <div id='fh5co-page'>
                <div id='fh5co-header'>
                    <header id='fh5co-header-section' style='position: fixed;'>
                        <div class='container'>
                            <div class='nav-header'>
                                <a href='#' class='js-fh5co-nav-toggle fh5co-nav-toggle'><i></i></a>
                                <h1 id='fh5co-logo'><a href='index_user.php'>Top<span>Sport</span></a></h1>
                                <!-- START #fh5co-menu-wrap -->
                                <nav id='fh5co-menu-wrap' role='navigation'>
                                    <ul class='sf-menu' id='fh5co-primary-menu'>
                                        <li class='active'>
                                            <a href='views/index_user.php'>Início</a>
                                        </li>
                                        <li>
                                            <a class='fh5co-sub-ddown'>Clientes</a>
                                            <ul class='fh5co-sub-menu'>
                                                <li><a href='form_cadastra_clientes.php'>Cadastrar Novo Cliente</a></li>
                                                <li><a href='lista_clientes.php'>Listar Clientes</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href='../controler/Logout.php'>Sair</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </header>		
                </div>
                <!-- end:fh5co-header -->";
    }
